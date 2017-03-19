<?php
	$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
	$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
	if (!empty($sort)) {
		$query = $conn->prepare("SELECT product.prodName, product.prodID, product.model, product.unitType,product.model, incoming.inID, incoming.inQty, incoming.inDate, employee.empName, incoming.receiptNo, incoming.inRemarks 
								FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
								ORDER BY $sort");
	} else if (!empty($searching)) {
		$query = $conn->prepare("SELECT product.prodName, product.prodID, product.model, product.unitType, product.model, incoming.inID, incoming.inQty, incoming.inDate, employee.empName, incoming.receiptNo, incoming.inRemarks 
								FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
								WHERE prodName LIKE '%".$searching."%' OR product.prodID LIKE '%".$searching."%' OR model LIKE '%".$searching."%'");
	} else {
		$query = $conn->prepare("SELECT product.prodName, product.prodID, product.model, product.unitType, product.model, incoming.inID, incoming.inQty, incoming.inDate, employee.empName, incoming.receiptNo, incoming.inRemarks 
								FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
								ORDER BY inID ASC;");
	}
	$query->execute();
	$result = $query->fetchAll();
?>