<?php
	if (isset($_POST["addCategory"])){
			
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$categoryID = $_POST['categoryID'];
	    $categoryName = $_POST['categoryName'];
		$query = $conn->prepare("Select * FROM category WHERE categoryID = '$categoryID'");
		$count = $query->execute();
		$row = $query->fetch();

		if ($query->rowCount() > 0){
			echo '<script language="javascript">';
			echo 'swal(
				  "Error!",
				  "Category ID Already Exists, New Category Has Not been Added",
				  "error");';
			echo '$("#myModal").modal("show");';
			echo 'document.getElementById("addCategoryID").style.borderColor = "red";';
			echo '</script>';
			return false;
		} 
		
		$categoryID = $_POST['categoryID'];
	    $categoryName = $_POST['categoryName'];
		$query = $conn->prepare("Select * FROM category WHERE categoryName = '$categoryName'");
		$count = $query->execute();
		$row = $query->fetch();

		if ($query->rowCount() > 0){
			echo '<script language="javascript">';
			echo 'swal(
				  "Error!",
				  "Category Name Already Exists, New Category Has Not been Added",
				  "error");';
			echo '$("#myModal").modal("show");';
			echo 'document.getElementById("addCategoryName").style.borderColor = "red";';
			echo '</script>';
		} else {
			 
		$sql = "INSERT INTO category (categoryID, categoryName)
				VALUES ('".$_POST['categoryID']."','".$_POST['categoryName']."')";
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
		}
	}    
?>