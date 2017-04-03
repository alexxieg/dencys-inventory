<?php
	if (isset($_POST["addRet"])){
				
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								
		$prod = $_POST['prodItem'];
		$branch = $_POST['branchRet'];
							
		$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
		$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
		$prod3 = $prod2['prodA'];
		
		$branch1 = $conn->query("SELECT branchID AS branchA FROM branch WHERE location = '$branch'");
		$branch2 = $branch1->fetch(PDO::FETCH_ASSOC);
		$branch3 = $branch2['branchA'];
					
		$sql = "INSERT INTO returns (returnDate, returnQty, returnType, returnRemark, prodID, branchID)
				VALUES (CURDATE(),'".$_POST['retQty']."','Warehouse Return','".$_POST['retRemarks']."','$prod3','$branch3')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}   
?>