<?php
	$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
	$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
	
	if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
		$query = $conn->prepare("SELECT product.prodID, product.unitType, returns.returnDate, MONTHNAME(returns.returnDate) AS nowMonthDate, YEAR(returnDate) AS nowYearDate, returns.returnID, product.prodName, returns.returnQty, returns.returnType, returns.returnRemark
								FROM returns INNER JOIN product ON returns.prodID = product.prodID
								WHERE returns.returnType = 'Supplier Return' HAVING nowMonthDate = '$sortByMonthDate' AND nowYearDate = $sortByYearDate
								ORDER BY returnID DESC;");	
		$query->execute();
		$result = $query->fetchAll();
	}else{
		$query = $conn->prepare("SELECT product.prodID, product.unitType, returns.returnDate, MONTHNAME(returns.returnDate) AS nowMonthDate, YEAR(returnDate) AS nowYearDate, returns.returnID, product.prodName, returns.returnQty, returns.returnType, returns.returnRemark 
							FROM returns INNER JOIN product ON returns.prodID = product.prodID 
							WHERE AND returns.returnType = 'Supplier Return' AND MONTH(returnDate) = MONTH(CURRENT_DATE())
							ORDER BY returnID DESC;");	
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