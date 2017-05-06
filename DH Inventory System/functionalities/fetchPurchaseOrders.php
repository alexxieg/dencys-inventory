<?php
	$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
	$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
	
	if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
			$query = $conn->prepare("SELECT purchaseorders.poNumber, purchaseorders.poDate, purchaseorders.userID, suppliers.supplier_name
									FROM purchaseorders INNER join product ON purchaseorders.prodID = product.prodID INNER JOIN suppliers ON purchaseorders.supID = suppliers.supID
									HAVING nowMonthDate = '$sortByMonthDate' AND nowYearDate = $sortByYearDate
									GROUP BY purchaseorders.poNumber, purchaseorders.poDate, purchaseorders.userID, suppliers.supplier_name");
			$query->execute();
			$result = $query->fetchAll();
	} else {
			$query = $conn->prepare("SELECT purchaseorders.poNumber, purchaseorders.poDate, purchaseorders.userID, suppliers.supplier_name
									FROM purchaseorders INNER join product ON purchaseorders.prodID = product.prodID INNER JOIN suppliers ON purchaseorders.supID = suppliers.supID
									GROUP BY purchaseorders.poNumber, purchaseorders.poDate, purchaseorders.userID, suppliers.supplier_name");
			$query->execute();
			$result = $query->fetchAll();
	}
	
	$query2 = $conn->prepare("SELECT DISTINCT MONTHNAME(poDate) AS nowMonthDate, (SELECT DISTINCT YEAR(poDate) FROM purchaseorders) AS nowYearDate, MONTH(curdate()) AS currentMonthDate
								FROM purchaseorders;");
	$query2->execute();
	$result2 = $query2->fetchAll();
	
	$query3 = $conn->prepare("SELECT DISTINCT YEAR(poDate) AS nowYearDate FROM purchaseorders");
	$query3->execute();
	$result3 = $query3->fetchAll();
?>