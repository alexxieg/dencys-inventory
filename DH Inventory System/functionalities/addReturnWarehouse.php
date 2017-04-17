<?php
	if (isset($_POST["addRet"])){
				
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$recRetrieve = $conn->prepare("SELECT receiptNo FROM returns");
		$recRetrieve->execute();
		$recs = $recRetrieve->fetchAll();
		$recBase = 00001;
		$recNo = 'RET-WHS-' . str_pad((string)$recBase,5,0,STR_PAD_LEFT);
		foreach ($recs AS $list):
			if ($recNo == $list["receiptNo"]){
				$numBase = $recBase + 1;
				$recNo = 'RET-WHS-' . str_pad((string)$recBase,5,0,STR_PAD_LEFT);
			}
		endforeach;
		
		$prod = $_POST['prodItem'];
		$branch = $_POST['branchRet'];
		$userID = $_POST['userID'];
							
		$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
		$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
		$prod3 = $prod2['prodA'];
		
		$branch1 = $conn->query("SELECT branchID AS branchA FROM branch WHERE location = '$branch'");
		$branch2 = $branch1->fetch(PDO::FETCH_ASSOC);
		$branch3 = $branch2['branchA'];
					
		$sql = "INSERT INTO returns (returnDate, returnQty, returnType, returnRemark, prodID, receiptNo ,branchID, userID)
				VALUES (CURDATE(),'".$_POST['retQty']."','Warehouse Return','".$_POST['retRemarks']."','$prod3','$recNo','$branch3','$userID')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}   
?>