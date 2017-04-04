<?php
	if (isset($_POST["addRet"])){
				
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								
		$prod = $_POST['prodItem'];
							
		$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
		$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
		$prod3 = $prod2['prodA'];
					
		$sql = "INSERT INTO returns (returnDate, returnQty, returnType, returnRemark, prodID)
				VALUES (CURDATE(),'".$_POST['retQty']."','Supplier Return','".$_POST['retRemarks']."','$prod3')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}   
?>