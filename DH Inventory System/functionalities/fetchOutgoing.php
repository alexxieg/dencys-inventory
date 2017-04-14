<?php
	$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
	$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
	
	if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
		$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, outgoing.receiptNo, outgoing.outID, outgoing.outQty, outgoing.outQty, outgoing.outDate, MONTHNAME(outgoing.outDate) AS nowMonthDate, YEAR(outDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, branch.location, outgoing.outRemarks, outgoing.userID  
									FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
									HAVING nowMonthDate = '$sortByMonthDate' AND nowYearDate = $sortByYearDate
									ORDER BY outID DESC;");
		$query->execute();
		$result = $query->fetchAll();
	} else {
		$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, outgoing.receiptNo, outgoing.outID, outgoing.outQty, outgoing.outQty, outgoing.outDate, MONTHNAME(outgoing.outDate) AS nowMonthDate, YEAR(outDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, branch.location, outgoing.outRemarks, outgoing.userID   
									FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
									WHERE MONTH(outDate) = MONTH(CURRENT_DATE())
									ORDER BY outID DESC;");
		$query->execute();
		$result = $query->fetchAll();
	}
	
	$query2 = $conn->prepare("SELECT DISTINCT MONTHNAME(outDate) AS nowMonthDate, (SELECT DISTINCT YEAR(outDate) FROM outgoing) AS nowYearDate, MONTH(curdate()) AS currentMonthDate 
								FROM outgoing;");
	$query2->execute();
	$result2 = $query2->fetchAll();
	
	$query3 = $conn->prepare("SELECT DISTINCT YEAR(outDate) AS nowYearDate FROM outgoing");
	$query3->execute();
	$result3 = $query3->fetchAll();

	
?>