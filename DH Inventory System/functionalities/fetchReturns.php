<?php
	$query = $conn->prepare("SELECT product.prodID, product.unitType, product.model, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark 
							FROM returns INNER JOIN product ON returns.prodID = product.prodID 
							WHERE returns.status = 'Active'
							ORDER BY returnID DESC;");	
	$query->execute();
	$result = $query->fetchAll();
?>