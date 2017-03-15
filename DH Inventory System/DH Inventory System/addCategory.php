<?php
	if (isset($_POST["addCategory"])){
			
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
		$sql = "INSERT INTO category (categoryID, categoryName)
				VALUES ('".$_POST['categoryID']."','".$_POST['categoryName']."')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}    
?>