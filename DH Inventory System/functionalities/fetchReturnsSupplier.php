<?php
	$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
	$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
	
	if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
		$query = $conn->prepare("SELECT returns.receiptNo, returns.returnDate, MONTHNAME(returns.returnDate) AS nowMonthDate, YEAR(returnDate) AS nowYearDate, returns.returnType, suppliers.supplier_name, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, returns.userID
								FROM returns INNER JOIN suppliers ON returns.supID = suppliers.supID INNER JOIN employee ON returns.empID = employee.empID
						        WHERE returns.returnType = 'Supplier Return'  AND MONTHNAME(returns.returnDate) = '$sortByMonthDate' AND YEAR(returnDate) = $sortByYearDate 
                                GROUP BY returns.returnType, returns.returnDate, returns.receiptNo, suppliers.supplier_name, empName returns.userID
								ORDER BY returns.returnDate DESC;");	
		$query->execute();
		$result = $query->fetchAll();
	}else{
		$query = $conn->prepare("SELECT returns.receiptNo, returns.returnDate, MONTHNAME(returns.returnDate) AS nowMonthDate, YEAR(returnDate) AS nowYearDate, returns.returnType, suppliers.supplier_name, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, returns.userID
								FROM returns INNER JOIN suppliers ON returns.supID = suppliers.supID INNER JOIN employee ON returns.empID = employee.empID
						        WHERE returns.returnType = 'Supplier Return' 								
								GROUP BY returns.returnType, returns.returnDate, returns.receiptNo, suppliers.supplier_name, empName, returns.userID
								ORDER BY returns.returnDate DESC;");	
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