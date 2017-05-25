		<?php
			$incID= $_GET['incId'];
			$sortByStartDate = (isset($_REQUEST['startDate']) ? $_REQUEST['startDate'] : null);
			$sortByEndDate = (isset($_REQUEST['endDate']) ? $_REQUEST['endDate'] : null);
			if (!empty($sortByStartDate) AND !empty($sortByEndDate)) { 
				$query = $conn->prepare("
										SELECT receiptNos, dates, plus, plus2, plus3, minus, minus2 FROM (
											SELECT incoming.receiptNo AS receiptNos, incoming.inDate AS dates, incoming.inQty AS plus, null AS plus2, null AS plus3,  null  AS minus, null as minus2
											FROM incoming
											WHERE incoming.prodID = '$incID' AND incoming.inDate >= '$sortByStartDate' AND incoming.inDate <= '$sortByEndDate'
											UNION 
											SELECT outgoing.receiptNo AS receiptNos, outgoing.outDate AS dates, null, null, null, outgoing.outQty AS minus, null
											FROM outgoing
											WHERE outgoing.prodID = '$incID' AND outgoing.outDate >= '$sortByStartDate' AND outgoing.outDate <= '$sortByEndDate'
											UNION
											SELECT returns.receiptNo AS receiptNos, returns.returnDate AS dates, null, returns.returnQty AS plus2, null, null, null
											FROM returns
											WHERE returns.prodID = '$incID' AND returns.returnType = 'Warehouse Return' AND returns.returnDate >= '$sortByStartDate' AND returns.returnDate <= '$sortByEndDate'
											UNION
											SELECT returns.receiptNo AS receiptNos, returns.returnDate AS dates, null, null, null, null, returns.returnQty AS minus
											FROM returns
											WHERE returns.prodID = '$incID' AND returns.returnType = 'Supplier Return' AND returns.returnDate >= '$sortByStartDate' AND returns.returnDate <= '$sortByEndDate'
										)
										AS ledger
                                        ORDER by dates ASC									
										");
				$query->execute();
				$res = $query->fetchAll();
			} else {
				$query = $conn->prepare("
										SELECT receiptNos, dates, plus, plus2, plus3, minus, minus2 FROM (
											SELECT incoming.receiptNo AS receiptNos, incoming.inDate AS dates, incoming.inQty AS plus, null AS plus2, null AS plus3,  null  AS minus, null as minus2
											FROM incoming
											WHERE incoming.prodID = '$incID' AND incoming.inType = 'Ordered'
											UNION 
                                            SELECT incoming.receiptNo AS receiptNos, incoming.inDate AS dates, null, null, incoming.inQty AS plus3, null, null
                                            FROM incoming
                                            WHERE incoming.prodID = '$incID' AND incoming.inType = 'Freebie'
                                            UNION
											SELECT outgoing.receiptNo AS receiptNos, outgoing.outDate AS dates, null, null, null, outgoing.outQty AS minus, null
											FROM outgoing
											WHERE outgoing.prodID = '$incID'	
											UNION                                            
											SELECT returns.receiptNo AS receiptNos, returns.returnDate AS dates, null, returns.returnQty AS plus2, null, null, null
											FROM returns
											WHERE returns.prodID = '$incID' AND returns.returnType = 'Warehouse Return'
											UNION
											SELECT returns.receiptNo AS receiptNos, returns.returnDate AS dates, null, null, null, null, returns.returnQty AS minus
											FROM returns
											WHERE returns.prodID = '$incID' AND returns.returnType = 'Supplier Return'
										)
										AS ledger
										ORDER by dates ASC
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
			
			$query4 = $conn->prepare("SELECT DISTINCT archPeriodStart as startDate from archive");
			$query4->execute();
			$result4 = $query4->fetchAll();
			
			$query5 = $conn->prepare("SELECT DISTINCT archiveDate AS endDate from archive");
			$query5->execute();
			$result5 = $query5->fetchAll();
			
			
			/*
			$query4 = $conn->prepare("SELECT DISTINCT MONTHNAME(inDate) AS nowMonthDate, (SELECT DISTINCT YEAR(inDate) FROM incoming) AS nowYearDate, MONTH(curdate()) AS currentMonthDate 
								FROM incoming;");
			$query4->execute();
			$result4 = $query4->fetchAll();
			
			$query5 = $conn->prepare("SELECT DISTINCT YEAR(inDate) AS nowYearDate FROM incoming");
			$query5->execute();
			$result5 = $query5->fetchAll();
			*/
		?>