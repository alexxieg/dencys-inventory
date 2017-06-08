<!-- Update Function -->
		<?php
			$proID = $_GET['proId'];
			$itemName=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			$itemNType=(isset($_REQUEST['prodType']) ? $_REQUEST['prodType'] : null);
			$itemBrand=(isset($_REQUEST['prodBrand']) ? $_REQUEST['prodBrand'] : null);
			$itemPrice=(isset($_REQUEST['prodPrice']) ? $_REQUEST['prodPrice'] : null);
			$itemRL=(isset($_REQUEST['prodRO']) ? $_REQUEST['prodRO'] : null);
			
			if (isset($_POST["addProd"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$prodItem = $_POST['prodItem'];
				$query = $conn->prepare("Select * FROM product WHERE prodName = '$prodItem'");
				$count = $query->execute();
				$row = $query->fetch();

				if ($query->rowCount() > 0){
					echo '<script language="javascript">';
					echo 'swal(
						  "Error!",
						  "Product Already Exists, Product Has Not been Updated",
						  "error");';
					echo '$("#myModal").modal("show");';
					echo 'document.getElementById("addProdName").style.borderColor = "red";';
					echo '</script>';
				} else {

				$sql = "UPDATE product SET prodName = '$itemName', unitType = '$itemNType', price = $itemPrice, reorderLevel = $itemRL WHERE prodID= '$proID'";
				$conn->exec($sql);
				
				$sql = "UPDATE brand JOIN product SET brandName = '$itemBrand' WHERE prodID= '$proID'";
				$conn->exec($sql);
				
				$url='../product.php';
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
				}
			}    

		?>