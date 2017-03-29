<?php
	$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
	$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
	if (!empty($sort)) {
		$query = $conn->prepare("SELECT product.prodID, product.unitType, product.model, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark 
								FROM returns INNER JOIN product ON returns.prodID = product.prodID 
								ORDER BY $sort");
	} else if (!empty($searching)) {
		$query = $conn->prepare("SELECT product.prodID, product.unitType, product.model, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark 
								FROM returns INNER JOIN product ON returns.prodID = product.prodID 
								WHERE prodName LIKE '%".$searching."%' OR product.prodID LIKE '%".$searching."%' OR model LIKE '%".$searching."%'");
	} else {
		$query = $conn->prepare("SELECT product.prodID, product.unitType, product.model, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark 
								FROM returns INNER JOIN product ON returns.prodID = product.prodID 
								WHERE returns.status = 'Active'
								ORDER BY returnID ASC;");	
	}
	$query->execute();
	$result = $query->fetchAll();
?>