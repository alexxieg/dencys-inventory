<?php
	$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
    if (isset($_POST['submit'])) {

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
				$supName = $_POST['supplier'];			

				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName sounds like '$prodItem'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];
				
				$sup1 = $conn->query("SELECT supID as supA FROM suppliers WHERE supplier_name = '$supName'");
				$sup2 = $sup1->fetch(PDO::FETCH_ASSOC);
				$sup3 = $sup2['supA'];
				
				$sql = "UPDATE inventory SET reorderStatus = 'True' WHERE prodID = '$prod3'";
				$conn->exec($sql);

				$sql = "INSERT INTO purchaseorders (qtyOrder, poDate, poNumber, supID, prodID, userID, status)
				VALUES ($qty,CURDATE(),'$prod','$sup3','$prod3','$userID', 'Incomplete')";
				$result = $conn->query($sql); 
				
			}
		
		$role = $_SESSION['sess_role'];
		if($role == 'admin'){
			$url='../purchaseOrder.php';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}else{
			$url='../userPurchaseOrders.php';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
		}
	}	
?>	