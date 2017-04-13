		<?php
			$incID= $_GET['incId'];
			$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
			$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
			if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
				$query = $conn->prepare("
										SELECT MAX(sameDate) AS 'DATE', SUM(inQuant) AS 'Added', SUM(outQuant) AS 'Subracted', prodName, GROUP_CONCAT(receiptNo SEPARATOR ', ') AS 'Receipt' 
										FROM (SELECT DISTINCT incoming.inDate AS sameDate, incoming.inQty AS inQuant, null AS outQuant, GROUP_CONCAT(incoming.receiptNo) AS receiptNo
										FROM incoming
										WHERE prodID = '$incID'
										GROUP BY inDate, inQty
										UNION
										SELECT DISTINCT outgoing.outDate, null, outgoing.outQty, GROUP_CONCAT(outgoing.receiptNo)
										FROM outgoing
										WHERE prodID = '$incID'
										GROUP BY outDate, outQty
										UNION
										SELECT DISTINCT returns.returnDate, returns.returnQty, null, NULL
										FROM returns
										WHERE prodID = '$incID' AND returnType = 'Warehouse Return'
										GROUP BY returnDate, returnQty
										UNION
										SELECT DISTINCT returns.returnDate, null, returns.returnQty, NULL
										FROM returns
										WHERE prodID = '$incID' AND returnType = 'Supplier Return'
										GROUP BY returnDate, returnQty
										ORDER BY sameDate ) AS ledgerResult JOIN product 
										WHERE product.prodID = '$incID' AND MONTHNAME(sameDate) = '$sortByMonthDate'
										AND YEAR(sameDate) = $sortByYearDate
										GROUP BY sameDate
										");
				$query->execute();
				$res = $query->fetchAll();
			} else {
				$query = $conn->prepare("
										SELECT MAX(sameDate) AS 'DATE', SUM(inQuant) AS 'Added', SUM(outQuant) AS 'Subracted', prodName, GROUP_CONCAT(receiptNo SEPARATOR ', ') AS 'Receipt' 
										FROM (SELECT DISTINCT incoming.inDate AS sameDate, incoming.inQty AS inQuant, null AS outQuant, GROUP_CONCAT(incoming.receiptNo) AS receiptNo
										FROM incoming
										WHERE prodID = '$incID'
										GROUP BY inDate, inQty
										UNION
										SELECT DISTINCT outgoing.outDate, null, outgoing.outQty, GROUP_CONCAT(outgoing.receiptNo)
										FROM outgoing
										WHERE prodID = '$incID'
										GROUP BY outDate, outQty
										UNION
										SELECT DISTINCT returns.returnDate, returns.returnQty, null, NULL
										FROM returns
										WHERE prodID = '$incID' AND returnType = 'Warehouse Return'
										GROUP BY returnDate, returnQty
										UNION
										SELECT DISTINCT returns.returnDate, null, returns.returnQty, NULL
										FROM returns
										WHERE prodID = '$incID' AND returnType = 'Supplier Return'
										GROUP BY returnDate, returnQty
										ORDER BY sameDate ) AS ledgerResult JOIN product 
										WHERE product.prodID = '$incID' AND MONTHNAME(sameDate) = MONTHNAME(CURDATE())
										AND YEAR(sameDate) = YEAR(CURDATE())
										GROUP BY sameDate
										");
				$query->execute();
				$res = $query->fetchAll();
			}
			
			$query2 = $conn->prepare("SELECT physicalQty, prodID FROM inventory WHERE prodID = '$incID'");										
			$query2->execute();
			$resul = $query2->fetchAll();
		
			$request = current($conn->query("SELECT beginningQty FROM inventory WHERE prodID = '$incID'")->fetch());
			$base = $request;
			$loop = True;
			
			$query3 = $conn->prepare("SELECT remarks FROM inventory WHERE prodID = '$incID'");										
			$query3->execute();
			$invRemark = $query3->fetchAll();	
			
			$query4 = $conn->prepare("SELECT DISTINCT MONTHNAME(inDate) AS nowMonthDate, (SELECT DISTINCT YEAR(inDate) FROM incoming) AS nowYearDate, MONTH(curdate()) AS currentMonthDate 
								FROM incoming;");
			$query4->execute();
			$result4 = $query4->fetchAll();
			
			$query5 = $conn->prepare("SELECT DISTINCT YEAR(inDate) AS nowYearDate FROM incoming");
			$query5->execute();
			$result5 = $query5->fetchAll();
		?>