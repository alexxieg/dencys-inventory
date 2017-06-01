<?php
	$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
    if (isset($_POST['submit'])) {

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		for ($index = 0; $index < count($prodTem); $index++) {
		$idretrieve = $conn->prepare("SELECT receiptNo FROM outgoing");
		$idretrieve->execute();
		$ids = $idretrieve->fetchAll();
		$idBase = 00001;
		$prod = 'OUT-' . str_pad((string)$idBase,5,0,STR_PAD_LEFT);
		foreach ($ids AS $list):
			if ($prod == $list["receiptNo"]){
				$idBase = $idBase + 1;
				$prod = 'OUT-' . str_pad((string)$idBase,5,0,STR_PAD_LEFT);
			}
			endforeach;
			$query = $conn->prepare("Select * FROM outgoing WHERE receiptNo = '$prod'");
			$count = $query->execute();
			$row = $query->fetch();

			if ($query->rowCount() > 0){
				echo '<script language="javascript">';
				echo 'swal(
					  "Error!",
					  "Receipt No. Already Exists, Outgoing Product Has Not been Added",
					  "error");';
				echo '$("#myModal").modal("show");';
				echo 'document.getElementById("addRcpt").style.borderColor = "red";';
				echo '</script>';
			} else {
				for ($index = 0; $index < count($prodTem); $index++) {
					$prodItem = $_POST['prodItem'][$index];
					$outQty = $_POST['outQty'][$index];
					$emp = $_POST['emp'];
					$branch = $_POST['branch'];
					$userID = $_POST['userID'];

					$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
					$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
					$emp3 = $emp2['empA'];
					
					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName sounds like '$prodItem'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
					
					$branch1 = $conn->query("SELECT branchID AS branchA from branch WHERE location = '$branch'");
					$branch2 = $branch1->fetch(PDO::FETCH_ASSOC);
					$branch3 = $branch2['branchA'];
					
					$sql = "INSERT INTO outgoing (outQty, outDate, receiptNo, branchID, empID, prodID, userID)
					VALUES ('$outQty',CURDATE(),'$prod','$branch3','$emp3','$prod3','$userID')";
					$result = $conn->query($sql); 
				}
			}
        }

		$role = $_SESSION['sess_role'];
		if($role == 'admin'){
			$url='prodIssuance.php';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}else{
			$url='userProdIssuance.php';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}

    }
?>	