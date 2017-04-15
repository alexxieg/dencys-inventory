<?php
	if (isset($_POST["addBranch"])){
			
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
		$sql = "INSERT INTO branch (branchID, location, branchName, status)
				VALUES ('".$_POST['branchID']."','".$_POST['location']."','".$_POST['branchName']."','Active')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}    
?>