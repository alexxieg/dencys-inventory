<?php
	$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
	$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
	
	if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
		$query = $conn->prepare("SELECT returns.receiptNo, returns.returnDate, MONTHNAME(returns.returnDate) AS nowMonthDate, YEAR(returnDate) AS nowYearDate, returns.returnType, branch.location, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, returns.userID
								FROM branch INNER JOIN returns ON branch.branchID = returns.branchID INNER JOIN employee ON returns.empID = employee.empID
								WHERE returns.returnType = 'Warehouse Return' AND MONTHNAME(returns.returnDate) = '$sortByMonthDate' AND YEAR(returnDate) = $sortByYearDate 
                                GROUP BY returns.returnType, returns.returnDate, returns.receiptNo, branch.location, empName, returns.userID;");	
		$query->execute();
		$result = $query->fetchAll();
	}else{
		$query = $conn->prepare("SELECT returns.receiptNo, returns.returnDate, MONTHNAME(returns.returnDate) AS nowMonthDate, YEAR(returnDate) AS nowYearDate, returns.returnType, branch.location, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, returns.userID
								FROM branch INNER JOIN returns ON branch.branchID = returns.branchID INNER JOIN employee ON returns.empID = employee.empID
						        WHERE returns.returnType = 'Warehouse Return' 								
								GROUP BY returns.returnType, returns.returnDate, returns.receiptNo, branch.location, empName, returns.userID;");	
		$query->execute();
		$result = $query->fetchAll();
	}
	
	$query2 = $conn->prepare("SELECT DISTINCT MONTHNAME(returnDate) AS nowMonthDate, (SELECT DISTINCT YEAR(returnDate) FROM returns) AS nowYearDate, MONTH(curdate()) AS currentMonthDate 
								FROM returns;");
	$query2->execute();
	$result2 = $query2->fetchAll();
	
	$query3 = $conn->prepare("SELECT DISTINCT YEAR(returnDate) AS nowYearDate FROM returns");
	$query3->execute();
	$result3 = $query3->fetchAll();
?>