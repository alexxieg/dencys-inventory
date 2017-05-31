<?php
	if (isset($_POST["addSup"])){
	
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		$supName = $_POST['supName'];
		$supContact = $_POST['supContact'];
		$supLoc = $_POST['supLoc'];

		$query = $conn->prepare("Select * FROM suppliers WHERE supplier_name = '$supName'");
		$count = $query->execute();
		$row = $query->fetch();

		if ($query->rowCount() > 0){
			echo '<script language="javascript">';
			echo 'swal(
				  "Error!",
				  "Supplier Already Exists, New Employee Has Not been Added",
				  "error");';
			echo '$("#myModal").modal("show");';
			echo 'document.getElementById("adduser").style.borderColor = "red";';
			echo '</script>';
		} else {
				 
				$sql = "INSERT INTO suppliers (supplier_name, contactNo, location)
				VALUES ('$supName','$supContact','$supLoc')";
				$conn->exec($sql);
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}			
?>