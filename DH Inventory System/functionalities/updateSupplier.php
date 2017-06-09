<!-- Update Function -->
		<?php
			$suppName=(isset($_REQUEST['supName']) ? $_REQUEST['supName'] : null);
			$conNum=(isset($_REQUEST['contactNo']) ? $_REQUEST['contactNo'] : null);
			$supLocation=(isset($_REQUEST['location']) ? $_REQUEST['location'] : null);
			
			if (isset($_POST["editSup"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$supName = $_POST['supName'];
				$supContact = $_POST['contactNo'];
				$supLoc = $_POST['location'];
				$query = $conn->prepare("Select * FROM suppliers WHERE supplier_name = '$supName' AND supID != '$supID'");
				$count = $query->execute();
				$row = $query->fetch();

				if ($query->rowCount() > 0){
					echo '<script language="javascript">';
					echo 'swal(
						  "Error!",
						  "Supplier Name Already Exists, Supplier Has Not been Updated",
						  "error");';
					echo '$("#myModal").modal("show");';
					echo 'document.getElementById("supName").style.borderColor = "red";';
					echo '</script>';
					return false;
				} 
				
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$supName = $_POST['supName'];
				$supContact = $_POST['contactNo'];
				$supLoc = $_POST['location'];
				$query = $conn->prepare("Select * FROM suppliers WHERE contactNo = '$supContact' AND supID != '$supID'");
				$count = $query->execute();
				$row = $query->fetch();

				if ($query->rowCount() > 0){
					echo '<script language="javascript">';
					echo 'swal(
						  "Error!",
						  "Contact No. Already Exists, Supplier Has Not been Updated",
						  "error");';
					echo '$("#myModal").modal("show");';
					echo 'document.getElementById("supContactNum").style.borderColor = "red";';
					echo '</script>';
					return false;
				}
				
				 else {
		
				$sql = "UPDATE suppliers SET supplier_name = '$suppName', contactNo = '$conNum', location = '$supLocation' 
						WHERE supID = $supID";
				$conn->exec($sql);
				
				$url='../suppliers.php';
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
				}
			}    
			
		?>