<?php
	if (isset($_POST["addAccnt"])){
	
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$userName = $_POST['userName'];
	    $psw = $_POST['psw'];
		$query = $conn->prepare("Select * FROM users WHERE userName = '$userName'");
		$count = $query->execute();
		$row = $query->fetch();

		if ($query->rowCount() > 0){
			echo '<script language="javascript">';
			echo 'swal(
				  "Error!",
				  "User Already Exists, New User Has Not been Added",
				  "error");';
			echo '$("#myModal").modal("show");';
			echo 'document.getElementById("adduser").style.borderColor = "red";';
			echo '</script>';
		} else {
			
		
				 
		$sql = "INSERT INTO users (userName, password, user_role)
				VALUES ('$userName','$psw','".$_POST['user_role']."')";
				
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}
	}    

?>