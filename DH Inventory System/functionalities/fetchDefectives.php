<?php
	$updateIN = $conn->prepare("UPDATE inventorydefects
								SET inventorydefects.defectInQty = (SELECT SUM(incoming.inQty) 
								FROM incoming join inventorydefects WHERE incoming.prodID = inventorydefects.defectProdID 
								GROUP BY incoming.prodID)");
	$updateIN->execute();
?>

<?php
	$updateInRet = $conn->prepare("UPDATE inventorydefects
									SET inventorydefects.defectInRetQty = (SELECT SUM(returns.returnQty) 
									FROM returns WHERE inventorydefects.defectProdID = returns.prodID AND returns.returnType = 'Warehouse Return'
									GROUP BY returns.prodID)");
	$updateInRet->execute();
?>

<?php
	$updateTotalIn = $conn->prepare("UPDATE inventorydefects
									SET inventorydefects.defectTotalIn = (SELECT SUM(IFNULL(inventorydefects.defectInQty,0) + IFNULL(inventorydefects.defectInRetQty,0))
									GROUP BY inventorydefects.defectProdID)");
	$updateTotalIn->execute();
?>

<?php
	$updateOut = $conn->prepare("UPDATE inventorydefects
								SET inventorydefects.defectOutQty = (SELECT SUM(outgoing.outQty) 
								FROM outgoing WHERE inventorydefects.defectProdID = outgoing.prodID 
								GROUP BY outgoing.prodID)");
	$updateOut->execute();
?>

<?php
	$updateOutRet = $conn->prepare("UPDATE inventorydefects
									SET inventorydefects.defectOutRetQty = (SELECT SUM(returns.returnQty)
									FROM returns WHERE inventorydefects.defectProdID = returns.prodID AND returns.returnType = 'Supplier Return'
									GROUP BY returns.prodID)");
	$updateOutRet->execute();

?>

<?php
	$updateTotalOut = $conn->prepare("UPDATE inventorydefects
									SET inventorydefects.defectTotalOut = (SELECT SUM(IFNULL(inventorydefects.defectOutQty,0) + IFNULL(inventorydefects.defectOutRetQty,0))
									GROUP BY inventorydefects.defectProdID)");
	$updateTotalOut->execute();
?>

<?php 
	$updateQty = $conn->prepare("UPDATE inventorydefects
								SET inventorydefects.defectQty = (SELECT (inventorydefects.defectBeginQty + IFNULL(inventorydefects.defectTotalIn,0) - IFNULL(inventorydefects.defectTotalOut,0))
								GROUP BY inventorydefects.defectProdID)");
	$updateQty->execute();
?>
	
<?php
	$updateInvDate = $conn->prepare("UPDATE inventorydefects
									SET inventorydefects.invDefectDate = CURDATE()
									GROUP BY inventorydefects.defectProdID");
	$updateInvDate->execute();
?>

<?php
	$query1 = $conn->prepare("SELECT brandID, brandName FROM brand WHERE status = 'Active' ");
	$query1->execute();
	$brandType = $query1->fetchAll();
	
	$query2 = $conn->prepare("SELECT categoryID, categoryName FROM category WHERE status = 'Active' ");
	$query2->execute();
	$categoryType = $query2->fetchAll();
	
	$sortByBrand = (isset($_REQUEST['brand_Name']) ? $_REQUEST['brand_Name'] : null);
	$sortByCategory = (isset($_REQUEST['category_Name']) ? $_REQUEST['category_Name'] : null);
	
	$None = null;
	
	if (!empty($sortByBrand)) {
		$query = $conn->prepare("SELECT defectives.defectProdID, defectives.prodName, defectives.unitType, inventorydefects.defectTotalIn, inventorydefects.defectTotalOut, inventorydefects.defectBeginQty, inventorydefects.defectPhyQty, inventorydefects.defectQty
									FROM defectives LEFT JOIN inventorydefects ON defectives.defectProdID = inventorydefects.defectProdID LEFT JOIN incoming ON defectives.defectProdID = incoming.prodID LEFT JOIN outgoing ON defectives.defectProdID = outgoing.prodID
									WHERE defectives.status = 'Active' AND defectives.brandID = '$sortByBrand'
									GROUP BY defectProdID, inventorydefects.defectBeginQty, inventorydefects.defectQty, inventorydefects.defectTotalOut, inventorydefects.defectTotalIn, inventorydefects.defectPhyQty");	
		$query->execute();
		$result = $query->fetchAll();
	} else if (!empty($sortByCategory)) {
		$query = $conn->prepare("SELECT defectives.defectProdID, defectives.prodName, defectives.unitType, inventorydefects.defectTotalIn, inventorydefects.defectTotalOut, inventorydefects.defectBeginQty, inventorydefects.defectPhyQty, inventorydefects.defectQty
									FROM defectives LEFT JOIN inventorydefects ON defectives.defectProdID = inventorydefects.defectProdID LEFT JOIN incoming ON defectives.defectProdID = incoming.prodID LEFT JOIN outgoing ON defectives.defectProdID = outgoing.prodID
									WHERE defectives.status = 'Active' AND defectives.categoryID = '$sortByCategory'
									GROUP BY defectProdID, inventorydefects.defectBeginQty, inventorydefects.defectQty, inventorydefects.defectTotalOut, inventorydefects.defectTotalIn, inventorydefects.defectPhyQty");	
		$query->execute();
		$result = $query->fetchAll();
	} else if (!empty($sortByCategory)&&!empty($sortByBrand)){
		$query = $conn->prepare("SELECT defectives.defectProdID, defectives.prodName, defectives.unitType, inventorydefects.defectTotalIn, inventorydefects.defectTotalOut, inventorydefects.defectBeginQty, inventorydefects.defectPhyQty, inventorydefects.defectQty
									FROM defectives LEFT JOIN inventorydefects ON defectives.defectProdID = inventorydefects.defectProdID LEFT JOIN incoming ON defectives.defectProdID = incoming.prodID LEFT JOIN outgoing ON defectives.defectProdID = outgoing.prodID
									WHERE defectives.status = 'Active' AND product.brandID = '$sortByBrand' AND product.categoryID = '$sortByCategory'
									GROUP BY defectProdID, inventorydefects.defectBeginQty, inventorydefects.defectQty, inventorydefects.defectTotalOut, inventorydefects.defectTotalIn, inventorydefects.defectPhyQty");	
		$query->execute();
		$result = $query->fetchAll();
	} else {
		$query = $conn->prepare("SELECT defectives.defectProdID, defectives.prodName, defectives.unitType, inventorydefects.defectTotalIn, inventorydefects.defectTotalOut, inventorydefects.defectBeginQty, inventorydefects.defectPhyQty, inventorydefects.defectQty
									FROM defectives LEFT JOIN inventorydefects ON defectives.defectProdID = inventorydefects.defectProdID LEFT JOIN incoming ON defectives.defectProdID = incoming.prodID LEFT JOIN outgoing ON defectives.defectProdID = outgoing.prodID
									WHERE defectives.status = 'Active' 
									GROUP BY defectProdID, inventorydefects.defectBeginQty, inventorydefects.defectQty, inventorydefects.defectTotalOut, inventorydefects.defectTotalIn, inventorydefects.defectPhyQty");	
		$query->execute();
		$result = $query->fetchAll();
	}
	
	$selectedBrand =(isset($_REQUEST['brand_Name']) ? $_REQUEST['brand_Name'] : null);
	if (!empty($selectedBrand)) {
		$filterBrand = current($conn->query("SELECT brandName FROM brand WHERE brandID = '$selectedBrand'")->fetch());
	} else {
		$filterBrand = $None;
	}
	
	$selectedCategory =(isset($_REQUEST['category_Name']) ? $_REQUEST['category_Name'] : null);
	if (!empty($selectedCategory)) {
		$filterCategory = current($conn->query("SELECT categoryName FROM category WHERE categoryID = '$selectedCategory'")->fetch());
	} else {
		$filterCategory = $None;
	}
?>	