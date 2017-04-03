<?php
	$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, outgoing.receiptNo, outgoing.outID, outgoing.outQty, outgoing.outDate, employee.empFirstName AS empName, branch.location, outgoing.outRemarks 
								FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
								WHERE outgoing.status = 'Active'
								ORDER BY outID ASC;");
	$query->execute();
	$result = $query->fetchAll();
?>