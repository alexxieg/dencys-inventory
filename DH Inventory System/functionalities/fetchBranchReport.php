<?php 
	$firstSortByMonthDate = (isset($_REQUEST['firstDateMonthName']) ? $_REQUEST['firstDateMonthName'] : null);
	if (!empty($firstSortByMonthDate)) { 
		$firstSelectedMonth = $firstSortByMonthDate;
	} else {
		$firstSelectedMonth = "none";
	}
	
	$firstSortByDayDate = (isset($_REQUEST['firstDateDayName']) ? $_REQUEST['firstDateDayName'] : null);
	if (!empty($firstSortByDayDate)) { 
		$firstSelectedDay = $firstSortByDayDate;
	} else {
		$firstSelectedDay = "none";
	}
	
	$firstSortByYearDate = (isset($_REQUEST['firstDateYearName']) ? $_REQUEST['firstDateYearName'] : null);
	if (!empty($firstSortByYearDate)) { 
		$firstSelectedYear = $firstSortByYearDate;
	} else {
		$firstSelectedYear = "none";
	}
	
	$secondSortByMonthDate = (isset($_REQUEST['secondDateMonthName']) ? $_REQUEST['secondDateMonthName'] : null);
	if (!empty($secondSortByMonthDate)) { 
		$secondSelectedMonth = $secondSortByMonthDate;
	} else {
		$secondSelectedMonth = "none";
	}
	
	$secondSortByDayDate = (isset($_REQUEST['secondDateDayName']) ? $_REQUEST['secondDateDayName'] : null);
	if (!empty($secondSortByDayDate)) { 
		$secondSelectedDay = $secondSortByDayDate;
	} else {
		$secondSelectedDay = "none";
	}
	
	$secondSortByYearDate = (isset($_REQUEST['secondDateYearName']) ? $_REQUEST['secondDateYearName'] : null);
	if (!empty($secondSortByYearDate)) { 
		$secondSelectedYear = $secondSortByYearDate;
	} else {
		$secondSelectedYear = "none";
	}
	
	/* For Camdas Query */
	if (!empty($firstSortByMonthDate) AND !empty($firstSortByYearDate)) { 
		$query = $conn->prepare("SELECT prodName, outQty, outDate
								FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
								JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Camdas'
								AND (outDate BETWEEN STR_TO_DATE(CONCAT($firstSelectedYear,'-','$firstSelectedMonth','-',$firstSelectedDay),'%Y-%M-%d') 
								AND STR_TO_DATE(CONCAT($secondSelectedYear,'-','$secondSelectedMonth','-',$secondSelectedDay),'%Y-%M-%d'));
								ORDER BY prodName");
		$query->execute();
		$result1 = $query->fetchAll();
	} else {
		$query = $conn->prepare("SELECT prodName, outQty, outDate 
								FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
								JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Camdas' 
								AND MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE())
								ORDER BY prodName;");
		$query->execute();
		$result1 = $query->fetchAll();
	}
	
	/* For Hilltop Query */
	if (!empty($firstSortByMonthDate) AND !empty($firstSortByYearDate)) {
		$query2 = $conn->prepare("SELECT prodName, outQty, outDate 
								FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
								JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Hilltop'
								AND (outDate BETWEEN STR_TO_DATE(CONCAT($firstSelectedYear,'-','$firstSelectedMonth','-',$firstSelectedDay),'%Y-%M-%d') 
								AND STR_TO_DATE(CONCAT($secondSelectedYear,'-','$secondSelectedMonth','-',$secondSelectedDay),'%Y-%M-%d'))
								ORDER BY prodName;");
		$query2->execute();
		$result2 = $query2->fetchAll();
	} else {
		$query2 = $conn->prepare("SELECT prodName, outQty, outDate 
								FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
								JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Hilltop'
								AND MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE())
								ORDER BY prodName;");
		$query2->execute();
		$result2 = $query2->fetchAll();
	}
	
	/* For KM 4 Query */
	if (!empty($firstSortByMonthDate) AND !empty($firstSortByYearDate)) {
		$query3 = $conn->prepare("SELECT prodName, outQty, outDate 
								FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
								JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 4'
								AND (outDate BETWEEN STR_TO_DATE(CONCAT($firstSelectedYear,'-','$firstSelectedMonth','-',$firstSelectedDay),'%Y-%M-%d') 
								AND STR_TO_DATE(CONCAT($secondSelectedYear,'-','$secondSelectedMonth','-',$secondSelectedDay),'%Y-%M-%d'))
								ORDER BY prodName;");
		$query3->execute();
		$result3 = $query3->fetchAll();
	} else {
		$query3 = $conn->prepare("SELECT prodName, outQty, outDate 
								FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
								JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 4'
								AND MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE())
								ORDER BY prodName;");
		$query3->execute();
		$result3 = $query3->fetchAll();
	}
	
	/* For KM 5 Query */
	if (!empty($firstSortByMonthDate) AND !empty($firstSortByYearDate)) {
		$query4 = $conn->prepare("SELECT prodName, outQty, outDate 
								FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
								JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 5'
								AND (outDate BETWEEN STR_TO_DATE(CONCAT($firstSelectedYear,'-','$firstSelectedMonth','-',$firstSelectedDay),'%Y-%M-%d') 
								AND STR_TO_DATE(CONCAT($secondSelectedYear,'-','$secondSelectedMonth','-',$secondSelectedDay),'%Y-%M-%d'))
								ORDER BY prodName;");
		$query4->execute();
		$result4 = $query4->fetchAll();
	} else {
		$query4 = $conn->prepare("SELECT prodName, outQty, outDate 
								FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
								JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 5'
								AND MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE())
								ORDER BY prodName;");
		$query4->execute();
		$result4 = $query4->fetchAll();
	}
	
	/* For San Fernando Query */
	if (!empty($firstSortByMonthDate) AND !empty($firstSortByYearDate)) {
		$query5 = $conn->prepare("SELECT prodName, outQty, outDate 
								FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
								JOIN branch ON branch.branchID = outgoing.branchID WHERE location='San Fernando'
								AND (outDate BETWEEN STR_TO_DATE(CONCAT($firstSelectedYear,'-','$firstSelectedMonth','-',$firstSelectedDay),'%Y-%M-%d') 
								AND STR_TO_DATE(CONCAT($secondSelectedYear,'-','$secondSelectedMonth','-',$secondSelectedDay),'%Y-%M-%d'))
								ORDER BY prodName;");
		$query5->execute();
		$result5 = $query5->fetchAll();
	} else {
		$query5 = $conn->prepare("SELECT prodName, outQty, outDate 
								FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
								JOIN branch ON branch.branchID = outgoing.branchID WHERE location='San Fernando'
								AND MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE())
								ORDER BY prodName;");
		$query5->execute();
		$result5 = $query5->fetchAll();
	}
	
	/* For Branch Overall Query */
	if (!empty($firstSortByMonthDate) AND !empty($firstSortByYearDate)) {
		$query6 = $conn->prepare("SELECT SUM(outQty) AS 'TOTAL_QUANTITY', location 
									FROM outgoing JOIN branch ON outgoing.branchID = branch.branchID 
									WHERE (outDate BETWEEN STR_TO_DATE(CONCAT($firstSelectedYear,'-','$firstSelectedMonth','-',$firstSelectedDay),'%Y-%M-%d') 
									AND STR_TO_DATE(CONCAT($secondSelectedYear,'-','$secondSelectedMonth','-',$secondSelectedDay),'%Y-%M-%d')) 
									GROUP BY location
									ORDER BY TOTAL_QUANTITY DESC;");
		$query6->execute();
		$result6 = $query6->fetchAll();
	} else {
		$query6 = $conn->prepare("SELECT SUM(outQty) AS 'TOTAL_QUANTITY', location 
									FROM outgoing JOIN branch ON outgoing.branchID = branch.branchID 
									WHERE MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE())
									GROUP BY location ORDER BY TOTAL_QUANTITY DESC;");
		$query6->execute();
		$result6 = $query6->fetchAll();
	}
	
	/* For Date */
	$queryMonth = $conn->prepare("SELECT DISTINCT MONTHNAME(outDate) AS nowMonthDate, (SELECT DISTINCT YEAR(outDate) FROM outgoing) AS nowYearDate, MONTH(curdate()) AS currentMonthDate 
						FROM outgoing;");
	$queryMonth->execute();
	$resultMonth = $queryMonth->fetchAll();
	
	$queryDay = $conn->prepare("SELECT DISTINCT DAY(outDate) AS nowDayDate FROM outgoing ORDER BY nowDayDate ASC");
	$queryDay->execute();
	$resultDay = $queryDay->fetchAll();
	
	$queryYear = $conn->prepare("SELECT DISTINCT YEAR(outDate) AS nowYearDate FROM outgoing");
	$queryYear->execute();
	$resultYear = $queryYear->fetchAll();
?>