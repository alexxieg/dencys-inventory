<?php
	$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
    if (isset($_POST['submit'])) {

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$numretrieve = $conn->prepare("SELECT poNumber FROM purchaseorders");
		$numretrieve->execute();
		$nums = $numretrieve->fetchAll();
		$numBase = 00001;
		$prod = 'PO-' . str_pad((string)$numBase,5,0,STR_PAD_LEFT);
		foreach ($nums AS $list):
			if ($prod == $list["poNumber"]){
				$numBase = $numBase + 1;
				$prod = 'PO-' . str_pad((string)$numBase,5,0,STR_PAD_LEFT);
			}
		endforeach; 
		   for ($index = 0; $index < count($prodTem); $index++) {

				$prodItem = $_POST['prodItem'][$index];
				$qty = $_POST['qty'][$index];
				$userID = $_POST['userID'];				

				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];
				$sql = "INSERT INTO purchaseorders (qtyOrder, poDate, poNumber, supplier, prodID, userID)
				VALUES ('$qty',CURDATE(),'$prod','".$_POST['supplier']."','$prod3','$userID')";
				$result = $conn->query($sql); 

				echo "<meta http-equiv='refresh' content='0'>";
			}
		}	
?>	