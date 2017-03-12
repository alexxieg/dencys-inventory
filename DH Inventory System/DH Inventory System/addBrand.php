<?php
	if (isset($_POST["addBrand"])){
			
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
		$sql = "INSERT INTO brand (brandID, brandName)
				VALUES ('".$_POST['brandID']."','".$_POST['brandName']."')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}    
?>