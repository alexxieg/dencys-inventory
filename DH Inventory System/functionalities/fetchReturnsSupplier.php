<?php
	$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
	$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
	
	if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
		$query = $conn->prepare("SELECT returns.receiptNo, returns.returnDate, MONTHNAME(returns.returnDate) AS nowMonthDate, YEAR(returnDate) AS nowYearDate, returns.returnType, suppliers.supplier_name, returns.userID
								FROM returns INNER JOIN suppliers ON returns.supID = suppliers.supID
						        WHERE returns.returnType = 'Supplier Return'  AND nowMonthDate = '$sortByMonthDate' AND nowYearDate = $sortByYearDate 
                                GROUP BY returns.returnType, returns.returnDate, returns.receiptNo, suppliers.supplier_name, returns.userID;");	
		$query->execute();
		$result = $query->fetchAll();
	}else{
		$query = $conn->prepare("SELECT returns.receiptNo, returns.returnDate, MONTHNAME(returns.returnDate) AS nowMonthDate, YEAR(returnDate) AS nowYearDate, returns.returnType, suppliers.supplier_name, returns.userID
								FROM returns INNER JOIN suppliers ON returns.supID = suppliers.supID
						        WHERE returns.returnType = 'Supplier Return' 								
								GROUP BY returns.returnType, returns.returnDate, returns.receiptNo, suppliers.supplier_name, returns.userID;");	
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