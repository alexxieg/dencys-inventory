<!-- Update Function -->
		<?php
			$loc=(isset($_REQUEST['location']) ? $_REQUEST['location'] : null);
			$braName=(isset($_REQUEST['branName']) ? $_REQUEST['branName'] : null);
			if (isset($_POST["editBranch"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$branchName = $_POST['branName'];
				$location = $_POST['location'];
				$query = $conn->prepare("Select * FROM branch WHERE branchName = '$branchName' AND branchID != '$branchThisID'");
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
					return false;
				}

				$branchName = $_POST['branName'];
				$location = $_POST['location'];
				$query = $conn->prepare("Select * FROM branch WHERE location = '$location' AND branchID != '$branchThisID'");
				$count = $query->execute();
				$row = $query->fetch();

				if ($query->rowCount() > 0){
					echo '<script language="javascript">';
					echo 'swal(
						  "Error!",
						  "Branch Already Exists, New Branch Has Not been Added",
						  "error");';
					echo '$("#myModal").modal("show");';
					echo 'document.getElementById("addBranchLoc").style.borderColor = "red";';
					echo '</script>';
				} else {
			 
				$sql = "UPDATE branch SET branchName = '$braName', location = '$loc' WHERE branchID = '$branchThisID'";
				$conn->exec($sql);
				
				$url='../branches.php';
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
				}
			}    		
		?>