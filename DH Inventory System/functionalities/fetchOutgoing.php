<?php
	$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
	$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
	
	if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
		$query = $conn->prepare("SELECT outgoing.receiptNo, outgoing.outDate, MONTHNAME(outgoing.outDate) AS nowMonthDate, YEAR(outDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, branch.location, outgoing.userID   
									FROM outgoing INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID 
									WHERE MONTHNAME(outgoing.outDate) = '$sortByMonthDate' AND YEAR(outDate) = $sortByYearDate
									GROUP BY outgoing.receiptNo, outgoing.outDate, empName, branch.location, outgoing.userID
									ORDER BY outgoing.outDate DESC;");
		$query->execute();
		$result = $query->fetchAll();
	} else {
		$query = $conn->prepare("SELECT outgoing.receiptNo, outgoing.outDate, MONTHNAME(outgoing.outDate) AS nowMonthDate, YEAR(outDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, branch.location, outgoing.userID   
									FROM outgoing INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID
									GROUP BY outgoing.receiptNo, outgoing.outDate, empName, branch.location, outgoing.userID
									ORDER BY outgoing.outDate DESC;");
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