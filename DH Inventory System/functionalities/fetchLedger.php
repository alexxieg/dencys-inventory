		<?php
			$incID= $_GET['incId'];
			$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
			$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
			if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
				$query = $conn->prepare("
										SELECT receiptNos, dates, plus, minus FROM (
										SELECT incoming.receiptNo AS receiptNos, incoming.inDate AS dates, incoming.inQty AS plus, null  AS minus
										FROM incoming
										WHERE incoming.prodID = '$incID'
										UNION 
										SELECT outgoing.receiptNo AS receiptNos, outgoing.outDate AS dates, null, outgoing.outQty AS minus
										FROM outgoing
										WHERE outgoing.prodID = '$incID'
										UNION
										SELECT returns.receiptNo AS receiptNos, returns.returnDate AS dates, returns.returnQty AS plus, null
										FROM returns
										WHERE returns.prodID = '$incID' AND returns.returnType = 'Warehouse Return'
										UNION
										SELECT returns.receiptNo AS receiptNos, returns.returnDate AS dates, null, returns.returnQty AS minus
										FROM returns
										WHERE returns.prodID = '$incID' AND returns.returnType = 'Supplier Return'
										)
										AS ledger
										");
				$query->execute();
				$res = $query->fetchAll();
			} else {
				$query = $conn->prepare("
										SELECT receiptNos, dates, plus, minus FROM (
										SELECT incoming.receiptNo AS receiptNos, incoming.inDate AS dates, incoming.inQty AS plus, null  AS minus
										FROM incoming
										WHERE incoming.prodID = '$incID'
										UNION 
										SELECT outgoing.receiptNo AS receiptNos, outgoing.outDate AS dates, null, outgoing.outQty AS minus
										FROM outgoing
										WHERE outgoing.prodID = '$incID'
										UNION
										SELECT returns.receiptNo AS receiptNos, returns.returnDate AS dates, returns.returnQty AS plus, null
										FROM returns
										WHERE returns.prodID = '$incID' AND returns.returnType = 'Warehouse Return'
										UNION
										SELECT returns.receiptNo AS receiptNos, returns.returnDate AS dates, null, returns.returnQty AS minus
										FROM returns
										WHERE returns.prodID = '$incID' AND returns.returnType = 'Supplier Return'
										)
										AS ledger
										");
				$query->execute();
				$res = $query->fetchAll();
			}
			
			$query2 = $conn->prepare("SELECT physicalQty, prodID FROM inventory INNER JOIN product ON inventory.prodID = product.prodID WHERE prodID = '$incID'");										
			$query2->execute();
			$resul = $query2->fetchAll();
		
			$request = current($conn->query("SELECT beginningQty FROM inventory WHERE prodID = '$incID'")->fetch());
			$base = $request;
			$loop = True;
			
			$query3 = $conn->prepare("SELECT prodName FROM product WHERE prodID = '$incID'");										
			$query3->execute();
			$result3 = $query3->fetchAll();
			
			$query4 = $conn->prepare("SELECT DISTINCT MONTHNAME(inDate) AS nowMonthDate, (SELECT DISTINCT YEAR(inDate) FROM incoming) AS nowYearDate, MONTH(curdate()) AS currentMonthDate 
								FROM incoming;");
			$query4->execute();
			$result4 = $query4->fetchAll();
			
			$query5 = $conn->prepare("SELECT DISTINCT YEAR(inDate) AS nowYearDate FROM incoming");
			$query5->execute();
			$result5 = $query5->fetchAll();
		?>