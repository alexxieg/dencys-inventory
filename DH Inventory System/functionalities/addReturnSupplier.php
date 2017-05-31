<?php
	$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
	if (isset($_POST["addRet"])){
				
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$recRetrieve = $conn->prepare("SELECT receiptNo FROM returns");
		$recRetrieve->execute();
		$recs = $recRetrieve->fetchAll();
		$recBase = 00001;
		$recNo = 'RET-SUP-' . str_pad((string)$recBase,5,0,STR_PAD_LEFT);
		foreach ($recs AS $list):
			if ($recNo == $list["receiptNo"]){
				$recBase = $recBase + 1;
				$recNo = 'RET-SUP-' . str_pad((string)$recBase,5,0,STR_PAD_LEFT);
			}
		endforeach;
						
		for ($index = 0; $index < count($prodTem); $index++) {			
			$prod = $_REQUEST['prodItem'][$index];
			$retQty = $_POST['retQty'][$index];
			$retRem = $_POST['retRemarks'][$index];
			$userID = $_POST['userID'];
			$emp = $_POST['emp'];
			$supName = $_POST['supplier'];
								
			$productID = current($conn->query("SELECT prodID AS prodA FROM product WHERE prodName sounds like '$prod'")->fetch());
			
			$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
            $emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
            $emp3 = $emp2['empA'];

			$sup1 = $conn->query("SELECT supID as supA FROM suppliers WHERE supplier_name = '$supName'");
			$sup2 = $sup1->fetch(PDO::FETCH_ASSOC);
			$sup3 = $sup2['supA'];
						 
			$sql = "INSERT INTO returns (returnDate, returnQty, returnType, returnRemark, receiptNo, prodID, branchID, supID, empID, userID)
					VALUES (CURDATE(),$retQty,'Supplier Return','$retRem','$recNo','$productID', 0 ,$sup3,$emp3,'$userID')";
			$conn->exec($sql);
		}
		echo "<meta http-equiv='refresh' content='0'>";	
	}	
?>