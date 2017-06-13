<!-- PHP Code - Update Brand -->
		<?php
			$braID=(isset($_REQUEST['branID']) ? $_REQUEST['branID'] : null);
			$braName=(isset($_REQUEST['branName']) ? $_REQUEST['branName'] : null);
			if (isset($_POST["editBrand"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$brandID = $_POST['branID'];
				$brandName = $_POST['branName'];
				$query = $conn->prepare("Select * FROM brand WHERE brandID = '$brandID' AND brandID != '$brandEditID'");
				$count = $query->execute();
				$row = $query->fetch();

				if ($query->rowCount() > 0){
					echo '<script language="javascript">';
					echo 'swal(
						  "Error!",
						  "Brand ID Already Exists, Brand Has Not been Updated",
						  "error");';
					echo '$("#myModal").modal("show");';
					echo 'document.getElementById("addBrandID").style.borderColor = "red";';
					echo '</script>';
					return false;
				}
				
				$brandID = $_POST['branID'];
				$brandName = $_POST['branName'];
				$query = $conn->prepare("Select * FROM brand WHERE brandName = '$brandName' AND brandID != '$brandEditID'");
				$count = $query->execute();
				$row = $query->fetch();

				if ($query->rowCount() > 0){
					echo '<script language="javascript">';
					echo 'swal(
						  "Error!",
						  "Brand Name Already Exists, Brand Has Not been Updated",
						  "error");';
					echo '$("#myModal").modal("show");';
					echo 'document.getElementById("addBrandName").style.borderColor = "red";';
					echo '</script>';
					
				} else {
			 
				$sql = "UPDATE brand SET brandID = '$braID', brandName = '$braName' WHERE brandID = '$brandEditID'";
			
				$conn->exec($sql);

				$url='../brands.php';
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
				}
			}    
		?>