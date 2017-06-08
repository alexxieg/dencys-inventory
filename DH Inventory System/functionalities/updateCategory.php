<!-- Update Function -->
		<?php
			$cateID=(isset($_REQUEST['catID']) ? $_REQUEST['catID'] : null);
			$cateName=(isset($_REQUEST['catName']) ? $_REQUEST['catName'] : null);
			if (isset($_POST["editCat"])){
				
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$categoryID = $_POST['catID'];
				$categoryName = $_POST['catName'];
				$query = $conn->prepare("Select * FROM category WHERE categoryID = '$categoryID'");
				$count = $query->execute();
				$row = $query->fetch();

				if ($query->rowCount() > 0){
					echo '<script language="javascript">';
					echo 'swal(
						  "Error!",
						  "Category ID Already Exists, Category Has Not been Updated",
						  "error");';
					echo '$("#myModal").modal("show");';
					echo 'document.getElementById("addCategoryID").style.borderColor = "red";';
					echo '</script>';
					return false;
				} 
				
				$categoryID = $_POST['catID'];
				$categoryName = $_POST['catName'];
				$query = $conn->prepare("Select * FROM category WHERE categoryName = '$categoryName'");
				$count = $query->execute();
				$row = $query->fetch();

				if ($query->rowCount() > 0){
					echo '<script language="javascript">';
					echo 'swal(
						  "Error!",
						  "Category Name Already Exists, Category Has Not been Updated",
						  "error");';
					echo '$("#myModal").modal("show");';
					echo 'document.getElementById("addCategoryName").style.borderColor = "red";';
					echo '</script>';
				} else {
			 
				$sql = "UPDATE category SET categoryID = '$cateID', categoryName = '$cateName' WHERE categoryID = '$categEditID'";	
				$conn->exec($sql);
				
				$url='../category.php';
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
				}
			}    
		?>