<?php
	$updateIN = $conn->prepare("UPDATE inventory
								SET inventory.inQty = (SELECT SUM(incoming.inQty) 
								FROM incoming WHERE inventory.prodID = incoming.prodID 
								GROUP BY incoming.prodID)");
	$updateIN->execute();
?>


<?php
	$updateInRet = $conn->prepare("UPDATE inventory
								SET inventory.inRetQty = (SELECT SUM(returns.returnQty) 
									FROM returns WHERE inventory.prodID = returns.prodID AND returns.returnType = 'Warehouse Return'
									GROUP BY returns.prodID)");
	$updateInRet->execute();
?>


<?php
	$updateTotalIn = $conn->prepare("UPDATE inventory
									SET inventory.totalIn = (SELECT SUM(IFNULL(inventory.inQty,0) + IFNULL(inventory.inRetQty,0))
									GROUP BY inventory.prodID)");
	$updateTotalIn->execute();
?>



<?php
	$updateOut = $conn->prepare("UPDATE inventory
								SET inventory.outQty = (SELECT SUM(outgoing.outQty) 
								FROM outgoing WHERE inventory.prodID = outgoing.prodID 
								GROUP BY outgoing.prodID)");
	$updateOut->execute();
?>

<<<<<<< HEAD
<?php
	$updateOutRet = $conn->prepare("UPDATE inventory
									SET inventory.outRetQty = (SELECT SUM(returns.returnQty)
									FROM returns WHERE inventory.prodID = returns.prodID AND returns.returnType = 'Supplier Return'
									GROUP BY returns.prodID)");
	$updateOutRet->execute();

?>


<?php
	$updateTotalOut = $conn->prepare("UPDATE inventory
									SET inventory.totalOut = (SELECT SUM(IFNULL(inventory.outQty,0) + IFNULL(inventory.outRetQty,0))
									GROUP BY inventory.prodID)");
	$updateTotalOut->execute();
?>

=======
>>>>>>> 1bd290d3779ee9e0dac02a097360557b4126026c
<?php 
	$updateQty = $conn->prepare("UPDATE inventory
								SET inventory.qty = (SELECT SUM((inventory.beginningQty + IFNULL(inventory.inQty,0) + IFNULL(inventory.inRetQty,0)) - SUM(IFNULL(inventory.outQty,0) + IFNULL(inventory.outRetQty,0))) 
								GROUP BY inventory.prodID)");
	$updateQty->execute();
?>
	
<?php
	$updateInvDate = $conn->prepare("UPDATE inventory
									SET inventory.invDate = CURDATE()
									GROUP BY inventory.prodID");
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
	
<<<<<<< HEAD
	if (!empty($sortByBrand)) {
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.unitType, product.reorderLevel, inventory.totalIn, inventory.totalOut, inventory.beginningQty, inventory.physicalQty, inventory.qty, inventory.inQty, inventory.outQty
									FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
									WHERE product.status = 'Active' AND product.brandID = '$sortByBrand'
									GROUP BY prodID, inventory.beginningQty, qty, inventory.totalOut, inventory.totalIn, inventory.physicalQty");	
		$query->execute();
		$result = $query->fetchAll();
	} else if (!empty($sortByCategory)) {
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.unitType, product.reorderLevel, inventory.totalIn, inventory.totalOut, inventory.beginningQty, inventory.physicalQty, inventory.qty, inventory.inQty, inventory.outQty
									FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
									WHERE product.status = 'Active' AND product.categoryID = '$sortByCategory'
									GROUP BY prodID, inventory.beginningQty, qty, inventory.totalOut, inventory.totalIn, inventory.physicalQty");	
		$query->execute();
		$result = $query->fetchAll();
	} else if (!empty($sortByCategory)&&!empty($sortByBrand)){
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.unitType, product.reorderLevel, inventory.totalIn, inventory.totalOut, inventory.beginningQty, inventory.physicalQty, inventory.qty, inventory.inQty, inventory.outQty
									FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
									WHERE product.status = 'Active' AND product.brandID = '$sortByBrand' AND product.categoryID = '$sortByCategory'
									GROUP BY prodID, inventory.beginningQty, qty,  inventory.totalOut, inventory.totalIn, inventory.physicalQty");	
=======
	if (!empty($sortByCategory) && !empty($sortByBrand)){
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.unitType, product.reorderLevel, inventory.beginningQty, inventory.physicalQty, inventory.qty, inventory.inQty, inventory.outQty
									FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
									WHERE product.status = 'Active' AND product.brandID = '$sortByBrand' AND product.categoryID = '$sortByCategory'
									GROUP BY prodID, inventory.beginningQty, qty, inventory.inQty, inventory.outQty, inventory.physicalQty");	
		$query->execute();
		$result = $query->fetchAll();
	} else if (!empty($sortByBrand)) {
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.unitType, product.reorderLevel, inventory.beginningQty, inventory.physicalQty, inventory.qty, inventory.inQty, inventory.outQty
									FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
									WHERE product.status = 'Active' AND product.brandID = '$sortByBrand'
									GROUP BY prodID, inventory.beginningQty, qty, inventory.inQty, inventory.outQty, inventory.physicalQty");	
		$query->execute();
		$result = $query->fetchAll();
	} else if (!empty($sortByCategory)) {
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.unitType, product.reorderLevel, inventory.beginningQty, inventory.physicalQty, inventory.qty, inventory.inQty, inventory.outQty
									FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
									WHERE product.status = 'Active' AND product.categoryID = '$sortByCategory'
									GROUP BY prodID, inventory.beginningQty, qty, inventory.inQty, inventory.outQty, inventory.physicalQty");	
>>>>>>> 1bd290d3779ee9e0dac02a097360557b4126026c
		$query->execute();
		$result = $query->fetchAll();
	
	} else {
<<<<<<< HEAD
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.unitType, product.reorderLevel, inventory.totalIn, inventory.totalOut, inventory.beginningQty, inventory.physicalQty, inventory.qty, inventory.inQty, inventory.outQty
									FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
									WHERE product.status = 'Active' 
									GROUP BY prodID, inventory.beginningQty, qty, inventory.totalOut, inventory.totalIn, inventory.physicalQty");	
=======
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.unitType, product.reorderLevel, inventory.beginningQty, inventory.physicalQty, inventory.qty, inventory.inQty, inventory.outQty
									FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
									WHERE product.status = 'Active' 
									GROUP BY prodID, inventory.beginningQty, qty, inventory.inQty, inventory.outQty, inventory.physicalQty");	
>>>>>>> 1bd290d3779ee9e0dac02a097360557b4126026c
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