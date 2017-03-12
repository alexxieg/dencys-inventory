<?php
	if (isset($_POST["addAccnt"])){
			
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
		$sql = "INSERT INTO users (userName, password, user_role)
				VALUES ('".$_POST['userName']."','".$_POST['psw']."','".$_POST['user_role']."')";
				
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}    

?>