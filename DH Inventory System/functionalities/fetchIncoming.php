<?php
	$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, incoming.inID, incoming.inQty, incoming.inDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, incoming.receiptNo, incoming.inRemarks 
								FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
								WHERE incoming.status = 'Active'
								ORDER BY inID ASC;");
	$query->execute();
	$result = $query->fetchAll();
?>