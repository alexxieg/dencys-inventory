<?php
	$updateIN = $conn->prepare("UPDATE inventory
								SET inventory.inQty = (SELECT SUM(incoming.inQty) 
								FROM incoming WHERE inventory.prodID = incoming.prodID AND incoming.status = 'Active'
								GROUP BY incoming.prodID)");
	$updateIN->execute();
?>

<?php
	$updateOut = $conn->prepare("UPDATE inventory
								SET inventory.outQty = (SELECT SUM(outgoing.outQty) 
								FROM outgoing WHERE inventory.prodID = outgoing.prodID AND outgoing.status = 'Active' GROUP BY outgoing.prodID)");
	$updateOut->execute();
?>

<?php 
	$updateQty = $conn->prepare("UPDATE inventory
								SET inventory.qty = (SELECT SUM((inventory.initialQty + IFNULL(inventory.inQty,0)) - IFNULL(inventory.outQty,0)) 
								GROUP BY inventory.prodID)");
	$updateQty->execute();
	$updateInvDate = $conn->prepare("UPDATE inventory
									SET inventory.invdate = (curdate())
									GROUP BY inventory.prodID");
?>
		
<?php
	$query = $conn->prepare("SELECT product.prodID, product.prodName, product.model, product.unitType, product.reorderLevel, inventory.initialQty, inventory.phyCount, inventory.qty, inventory.inQty, inventory.outQty
								FROM product LEFT JOIN inventory ON product.prodID = inventory.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
								WHERE product.status = 'Active'
								GROUP BY prodID, initialQty, qty, inventory.inQty, inventory.outQty, inventory.phyCount");	
	$query->execute();
	$result = $query->fetchAll();
?>	