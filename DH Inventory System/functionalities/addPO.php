<?php
	$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
    if (isset($_POST['submit'])) {

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		   for ($index = 0; $index < count($prodTem); $index++) {

				$prodItem = $_POST['prodItem'][$index];
				$qty = $_POST['qty'][$index];				

				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];
				$sql = "INSERT INTO purchaseorders (qtyOrder, poDate, supplier, prodID)
				VALUES ('$qty',CURDATE(),'".$_POST['supplier']."','$prod3')";
				$result = $conn->query($sql); 

				echo "<meta http-equiv='refresh' content='0'>";
			}
		}	
?>	