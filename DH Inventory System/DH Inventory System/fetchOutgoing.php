<?php
	$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
	$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
	if (!empty($sort)) {
		$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, product.model, outgoing.receiptNo, outgoing.outID, outgoing.outQty, outgoing.outDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, branch.location, outgoing.outRemarks 
								FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
								ORDER BY $sort");
	} else if (!empty($searching)) {
		$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, product.model, outgoing.receiptNo, outgoing.outID, outgoing.outQty, outgoing.outDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, branch.location, outgoing.outRemarks 
								FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
								WHERE prodName LIKE '%".$searching."%' OR product.prodID LIKE '%".$searching."%' OR model LIKE '%".$searching."%'");
	} else {
		$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, product.model, outgoing.receiptNo, outgoing.outID, outgoing.outQty, outgoing.outDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, branch.location, outgoing.outRemarks 
								FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
								ORDER BY outID ASC;");
	}
	$query->execute();
	$result = $query->fetchAll();
?>