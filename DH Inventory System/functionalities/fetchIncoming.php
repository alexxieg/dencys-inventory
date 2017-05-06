<?php
	$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
	$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
	
	if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
		$query = $conn->prepare("SELECT incoming.inDate, MONTHNAME(incoming.inDate) AS nowMonthDate, YEAR(inDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, incoming.receiptNo, incoming.receiptDate, suppliers.supplier_name, incoming.userID  
									FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID INNER JOIN suppliers ON incoming.supID = suppliers.supID
									HAVING nowMonthDate = '$sortByMonthDate' AND nowYearDate = $sortByYearDate
									GROUP BY incoming.receiptNo, incoming.inDate, empName, suppliers.supplier_name, incoming.receiptDate, incoming.userID");
		$query->execute();
		$result = $query->fetchAll();
	} else {
		$query = $conn->prepare("SELECT incoming.inDate, MONTHNAME(incoming.inDate) AS nowMonthDate, YEAR(inDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, incoming.receiptNo, incoming.receiptDate, suppliers.supplier_name, incoming.userID  
									FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID INNER JOIN suppliers ON incoming.supID = suppliers.supID
									GROUP BY incoming.receiptNo, incoming.inDate, empName, suppliers.supplier_name, incoming.receiptDate, incoming.userID");
		$query->execute();
		$result = $query->fetchAll();
	}
	
	$query2 = $conn->prepare("SELECT DISTINCT MONTHNAME(inDate) AS nowMonthDate, (SELECT DISTINCT YEAR(inDate) FROM incoming) AS nowYearDate, MONTH(curdate()) AS currentMonthDate 
								FROM incoming;");
	$query2->execute();
	$result2 = $query2->fetchAll();
	
	$query3 = $conn->prepare("SELECT DISTINCT YEAR(inDate) AS nowYearDate FROM incoming");
	$query3->execute();
	$result3 = $query3->fetchAll();
?>