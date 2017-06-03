<?php
	if (isset($_POST["addBranch"])){
			
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$branchName = $_POST['branchName'];
	    $location = $_POST['location'];
		$query = $conn->prepare("Select * FROM branch WHERE branchName = '$branchName' AND location = '$location'");
		$count = $query->execute();
		$row = $query->fetch();

		if ($query->rowCount() > 0){
			echo '<script language="javascript">';
			echo 'swal(
				  "Error!",
				  "Branch Already Exists, New Branch Has Not been Added",
				  "error");';
			echo '$("#myModal").modal("show");';
			echo 'document.getElementById("addBranchName").style.borderColor = "red";';
			echo '</script>';
		} else {
			 
		$sql = "INSERT INTO branch (location, branchName, status)
				VALUES ('".$_POST['location']."','".$_POST['branchName']."','Active')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
		}
	}    
?>