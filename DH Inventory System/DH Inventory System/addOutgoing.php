<?php
	if (isset($_POST["addOut"])){
			
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 			
		$prod = $_POST['prodItem'];
		$emp = $_POST['emp'];
		$branch = $_POST['branch'];
								
		$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empName = '$emp'");
		$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
		$emp3 = $emp2['empA'];
					
		$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
		$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
		$prod3 = $prod2['prodA'];
		
		$branch1 = $conn->query("SELECT branchID AS branchA from branch WHERE location = '$branch'");
		$branch2 = $branch1->fetch(PDO::FETCH_ASSOC);
		$branch3 = $branch2['branchA'];
			
		$sql = "INSERT INTO outgoing (outQty, outDate, outRemarks, branchID, empID, prodID)
				VALUES ('".$_POST['outQty']."',CURDATE(),'".$_POST['outRemarks']."','$branch3','$emp3','$prod3')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}    
?>