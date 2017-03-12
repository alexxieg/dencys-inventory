<?php
	if (isset($_POST["addProd"])){
			
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
		$prod = $_POST['prodCode'];
		 
		$sql = "INSERT INTO product (prodID, prodName, model, categoryID, brandID, price, reorderLevel, unitType)
				VALUES ('$prod','".$_POST['prodItem']."','".$_POST['prodModel']."','".$_POST['prodCateg']."','".$_POST['prodBrand']."','".$_POST['prodPrice']."','".$_POST['prodRO']."','".$_POST['prodUnit']."')";
		$conn->exec($sql);
		
		$sql1 = "INSERT INTO inventory (initialQty, qty, phyCount, prodID)
				VALUES (NULL,'".$_POST['prodQty']."',NULL,'$prod')";
		$conn->exec($sql1);	
	}    
?>