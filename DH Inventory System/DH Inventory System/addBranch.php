<?php
	if (isset($_POST["addBranch"])){
			
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
		$sql = "INSERT INTO branch (branchID, branch)
				VALUES ('".$_POST['branchID']."','".$_POST['branch']."')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}    
?>