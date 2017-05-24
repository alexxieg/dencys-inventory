<?php /*
	$tmp = 0;
	if (isset($_POST['submit'])) {
		if(!empty($_POST["inRemarks"])) {
			foreach($_POST["inRemarks"] as $inRemarks) if ($tmp++ < 2) {
				
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$inQty = $_POST['incQty'];
				foreach ($inQty as $incQty) {
					$prod = $_POST['prodItem'];	
					foreach($prod as $prodItem) {
						$emp = $_POST['emp'];
						$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empName = '$emp'");
						$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
						$emp3 = $emp2['empA'];
								
						$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
						$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
						$prod3 = $prod2['prodA'];
												
						$sql = "INSERT INTO incoming (inQty, inDate, receiptNo, inRemarks, empID, prodID)
								VALUES ('$incQty',CURDATE(),'".$_POST['rcno']."','$inRemarks','$emp3','$prod3')";
						$result = $conn->query($sql); 
						echo "<meta http-equiv='refresh' content='0'>";
					}
				}
			}
		}
	}		
		  
		   		
/*		$emp1 = $conn->prepare("SELECT empID AS emp FROM employee WHERE empName = '$emp'");
		$emp1->execute();
						
		$prod1 = $conn->prepare("SELECT prodID AS prod FROM product WHERE prodName = '$prod'");
		$prod1->execute();
		
		$sup1 = $conn->prepare("SELECT supID AS sup from suppliers WHERE supplier_name = '$sup'");
		$sup1 = $conn->prepare("SELECT supID AS sup from suppliers WHERE supplier_name = '$sup'");
		$sup1->execute();
				
		$sql = "INSERT INTO incoming (inQty, inDate, receiptNo, inRemarks, empID, prodID, supID)
		VALUES ('".$_POST['incQty']."',CURDATE(),'".$_POST['inRecN']."','".$_POST['inRemarks']."',$emp1,$prod1,$sup1)";
		$conn->exec($sql);
*/  	
	  		  
?>
	
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
			
            $prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
            $prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
            $prod3 = $prod2['prodA'];
            $sql = "INSERT INTO incoming (inQty, inDate, receiptNo, receiptDate, supID, status, inType, inRemarks, empID, prodID, userID, poNumber)
            VALUES ('$inQty',CURDATE(),'$rcno','".$_POST['rcdate']."','$sup3','$inStat','$inType','$inRemarks','$emp3','$prod3','$userID','$poNum')";
            $result = $conn->query($sql); 

            echo "<meta http-equiv='refresh' content='0'>";
	    }
        }

    }
	

	}
	

?>	