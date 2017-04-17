<?php
/* Legacy code, to be used as reference for changing functionality
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
		$prod = $_POST['prodCode'];
		 
		$sql = "INSERT INTO product (prodID, prodName, model, categoryID, brandID, price, reorderLevel, unitType)
				VALUES ('$prod','".$_POST['prodItem']."','".$_POST['prodModel']."','".$_POST['prodCateg']."','".$_POST['prodBrand']."','".$_POST['prodPrice']."','".$_POST['prodRO']."','".$_POST['prodUnit']."')";
		$conn->exec($sql);
		
		$sql1 = "INSERT INTO inventory (initialQty, qty, phyCount, prodID)
				VALUES (NULL,'".$_POST['prodQty']."',NULL,'$prod')";
		$conn->exec($sql1);	
	}    */
	if (isset($_POST["addProd"])){
		
		$prodItem = $_POST['prodItem'];
		$query = $conn->prepare("Select * FROM product WHERE prodName = '$prodItem'");
		$count = $query->execute();
		$row = $query->fetch();

		if ($query->rowCount() > 0){
			echo '<script language="javascript">';
			echo 'swal(
				  "Error!",
				  "Product Already Exists, New Product Has Not been Added",
				  "error");';
			echo '$("#myModal").modal("show");';
			echo 'document.getElementById("addProdName").style.borderColor = "red";';
			echo '</script>';
		} else {
		
		$brandretrieve = $conn->prepare("SELECT brandID FROM brand WHERE brandName ='".$_POST['prodBrand']."'");
		$brandretrieve->execute();
		$brands = $brandretrieve->fetchAll();
		foreach ($brands AS $brandlist):
			$finbrand = $brandlist["brandID"];
		endforeach;
		$categretrieve = $conn->prepare("SELECT categoryID FROM category WHERE categoryName ='".$_POST['prodCateg']."'");
		$categretrieve->execute();
		$categs = $categretrieve->fetchAll();
		foreach ($categs AS $categlist):
			$fincateg = $categlist["categoryID"];
		endforeach;
		$idretrieve = $conn->prepare("SELECT prodID FROM product");
		$idretrieve->execute();
		$ids = $idretrieve->fetchAll();
		$idNum = 001;
		$prod = $finbrand . '-' . $fincateg . '-' . str_pad((string)$idNum,4,0,STR_PAD_LEFT);
		foreach ($ids AS $list):
			if ($prod == $list["prodID"]){
				$idNum = $idNum + 1;
				$prod = $finbrand . '-' . $fincateg . '-' . str_pad((string)$idNum,4,0,STR_PAD_LEFT);
			}
		endforeach; 
		$defect = $prod . 'D';
		$prodName = $_POST['prodItem'];
		$defectName = $prodName . ' (Defective)';
		$unitType = $_POST['prodUnit'];
		
		$sql = "INSERT INTO product (prodID, prodName, categoryID, brandID, price, reorderLevel, unitType)
				VALUES ('$prod','$prodName','$fincateg','$finbrand','".$_POST['prodPrice']."','".$_POST['prodRO']."','$unitType')";
		$conn->exec($sql);
		
		$qty = $_POST['prodQty'];
		
		$sql1 = "INSERT INTO inventory (initialQty, date, qty, inQty, outQty, phyCount, endingQty, prodID)
				 VALUES ('$qty',CURDATE(),'$qty',NULL,NULL,NULL,NULL,'$prod')";
		$conn->exec($sql1);
		
		$sql2 = "INSERT INTO defectives (defectProdID, prodName, categoryID, brandID, unitType, status, prodID)
				 VALUES ('$defect', '$defectName', '$fincateg', '$finbrand', '$unitType','Inactive', '$prod')";
		$conn->exec($sql2);
		
		$sql3 = "INSERT INTO inventory (initialQty, date, qty, inQty, outQty, phyCount, endingQty, prodID)
				 VALUES ('$qty', CURDATE(), '$qty', NULL, NULL, NULL, NULL, '$defect')";
		$conn->exec($sql3);
		
		echo "<meta http-equiv='refresh' content='0'>";
		}
	}
?>
