<?php
	$updateIN = $conn->prepare("UPDATE inventory
								SET inventory.inQty = (SELECT SUM(incoming.inQty) 
								FROM incoming WHERE inventory.prodID = incoming.prodID GROUP BY incoming.prodID)");
	$updateIN->execute();
?>

<?php
	$updateOut = $conn->prepare("UPDATE inventory
								SET inventory.outQty = (SELECT SUM(outgoing.outQty) 
								FROM outgoing WHERE inventory.prodID = outgoing.prodID GROUP BY outgoing.prodID)");
	$updateOut->execute();
?>
		
<?php
	$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
	$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
	if (!empty($sort)) { 
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.model, product.unitType, product.reorderLevel, inventory.initialQty, SUM(incoming.inQty + inventory.initialQty) AS qty, inventory.inQty, inventory.outQty
								FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
								GROUP BY prodID, initialQty, qty, inventory.inQty, inventory.outQty
								ORDER BY $sort");
	} else if (!empty($searching)) {
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.unitType, product.model, product.unitType, product.reorderLevel, SUM(incoming.inQty + inventory.initialQty) AS qty, sum(incoming.inQty) AS inQty, inventory.outQty, inventory.initialQty, product.reorderLevel
								FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
								WHERE prodName LIKE '%".$searching."%' OR model LIKE '%".$searching."%' OR unitType LIKE '%".$searching."%' OR product.prodID LIKE '%".$searching."%'
								GROUP BY prodID, initialQty, qty, inventory.inQty, inventory.outQty");
	} else { 
		$query = $conn->prepare("SELECT product.prodID, product.prodName, product.model, product.unitType, product.reorderLevel, inventory.initialQty, SUM(incoming.inQty + inventory.initialQty) AS qty, inventory.inQty, inventory.outQty
								FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
								GROUP BY prodID, initialQty, qty, inventory.inQty, inventory.outQty");
	}	
	$query->execute();
	$result = $query->fetchAll();
?>	