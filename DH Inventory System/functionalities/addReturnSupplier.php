<?php
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
								
		$prod = $_POST['prodItem'];
		$userID = $_POST['userID'];
							
		$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
		$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
		$prod3 = $prod2['prodA'];
					 
		$sql = "INSERT INTO returns (returnDate, returnQty, returnType, returnRemark, receiptNo, prodID, branchID, userID)
				VALUES (CURDATE(),'".$_POST['retQty']."','Supplier Return','".$_POST['retRemarks']."','$recNo','$prod3', 0 ,'$userID')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}   
?>