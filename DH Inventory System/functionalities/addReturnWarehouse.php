<?php
	$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
	if (isset($_POST["addRet"])){
				
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$recRetrieve = $conn->prepare("SELECT receiptNo FROM returns 
									   WHERE returnType = 'Warehouse Return' 
									   GROUP BY 1");
		$recRetrieve->execute();
		$recs = $recRetrieve->fetchAll();
		$recBase = 1;
		$recNo = 'RET-WHS-' . str_pad((string)$recBase,5,0,STR_PAD_LEFT);
		foreach ($recs AS $list):
			if ($recNo == $list["receiptNo"]){
				$recBase = $recBase + 1;
				$recNo = 'RET-WHS-' . str_pad((string)$recBase,5,0,STR_PAD_LEFT);
			}
		endforeach;
		
		for ($index = 0; $index < count($prodTem); $index++) {
		
			$prod = $_POST['prodItem'][$index];
			$retQty = $_POST['retQty'][$index];
			$retRem = $_POST['retRemarks'][$index];
			$branch = $_POST['branchRet'];
			$userID = $_POST['userID'];
			$emp = $_POST['emp'];
								
			$productID = current($conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'")->fetch());
			
			$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
			$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
			$emp3 = $emp2['empA'];
			
			$branch1 = $conn->query("SELECT branchID AS branchA FROM branch WHERE location = '$branch'");
			$branch2 = $branch1->fetch(PDO::FETCH_ASSOC);
			$branch3 = $branch2['branchA'];
						
			$sql = "INSERT INTO returns (returnDate, returnQty, returnType, returnRemark, prodID, receiptNo ,branchID, empID, userID)
					VALUES (CURDATE(),$retQty,'Warehouse Return','$retRem','$productID','$recNo',$branch3,$emp3,'$userID')";
			$conn->exec($sql);
		}
			
		$role = $_SESSION['sess_role'];
		if($role == 'admin'){
			$url='returnsWarehouse.php';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}else{
			$url='userReturnsWarehouse.php';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}
	}		
?>