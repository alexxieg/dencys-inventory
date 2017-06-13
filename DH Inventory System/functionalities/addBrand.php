<?php
	if (isset($_POST["addBrand"])){
			
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$brandID = $_POST['brandID'];
	    $brandName = $_POST['brandName'];
		$query = $conn->prepare("Select * FROM brand WHERE brandID = '$brandID'");
		$count = $query->execute();
		$row = $query->fetch();

		if ($query->rowCount() > 0){
			echo '<script language="javascript">';
			echo 'swal(
				  "Error!",
				  "Brand ID Already Exists, New Brand Has Not been Added",
				  "error");';
			echo '$("#myModal").modal("show");';
			echo 'document.getElementById("addBrandID").style.borderColor = "red";';
			echo '</script>';
			return false;
		}
			
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$brandID = $_POST['brandID'];
	    $brandName = $_POST['brandName'];
		$query = $conn->prepare("Select * FROM brand WHERE brandName = '$brandName'");
		$count = $query->execute();
		$row = $query->fetch();

		if ($query->rowCount() > 0){
			echo '<script language="javascript">';
			echo 'swal(
				  "Error!",
				  "Brand Name Already Exists, New Brand Has Not been Added",
				  "error");';
			echo '$("#myModal").modal("show");';
			echo 'document.getElementById("addBrandName").style.borderColor = "red";';
			echo '</script>';
		} else {
			 
		$sql = "INSERT INTO brand (brandID, brandName)
				VALUES ('".$_POST['brandID']."','".$_POST['brandName']."')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
		}
	}    
?>