<?php
	$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
    if (isset($_POST['submit'])) {

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		for ($index = 0; $index < count($prodTem); $index++) {
			$rcno = $_POST['rcno'];
			$query = $conn->prepare("Select * FROM incoming WHERE receiptNo = '$rcno'");
			$count = $query->execute();
			$row = $query->fetch();

			if ($query->rowCount() > 0){
				echo '<script language="javascript">';
				echo 'swal(
					  "Error!",
					  "Receipt No. Already Exists, Incoming Product Has Not been Added",
					  "error");';
				echo '$("#myModal").modal("show");';
				echo 'document.getElementById("addRcpt").style.borderColor = "red";';
				echo '</script>';
			} else {

				// Do Something If name Doesn't Exist
				
				for ($index = 0; $index < count($prodTem); $index++) {

				
					$inRemarks = $_POST['inRemarks'][$index];
					$prodItem = $_POST['prodItem'][$index];
					$inQty = $_POST['incQty'][$index];
					$inStat = $_POST['inStatus'][$index];
					$inType = $_POST['inType'][$index];
					$emp = $_POST['emp'];
					$userID = $_POST['userID'];
					$supName = $_POST['supplier'];	
					$poNum = $_POST['po'];

					$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
					$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
					$emp3 = $emp2['empA'];

					$sup1 = $conn->query("SELECT supID as supA FROM suppliers WHERE supplier_name = '$supName'");
					$sup2 = $sup1->fetch(PDO::FETCH_ASSOC);
					$sup3 = $sup2['supA'];
					
					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName sounds like '$prodItem'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
					$sql = "INSERT INTO incoming (inQty, inDate, receiptNo, receiptDate, supID, status, inType, inRemarks, empID, prodID, userID, poNumber)
					VALUES ('$inQty',CURDATE(),'$rcno','".$_POST['rcdate']."','$sup3','$inStat','$inType','$inRemarks','$emp3','$prod3','$userID','$poNum')";
					$result = $conn->query($sql); 
		
				}			
			}
			$inState = $_POST['inStatus'];
			$poNum = $_POST['po'];
			if (count(array_unique($inState)) === 1 && end($inState) === 'Complete') {
				$sql = "UPDATE purchaseorders SET status = 'Complete' WHERE poNumber = '$poNum'";
				$result = $conn->query($sql); 
			}
		}
		
		session_start();
		$role = $_SESSION['sess_role'];
		if($role == 'admin'){
			$url='../prodDeliveries.php';

			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}else{
			$url='../userprodDeliveries.php';

			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}
	
	}
	

?>	