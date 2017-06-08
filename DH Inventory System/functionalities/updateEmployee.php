<!-- Update Function -->
		<?php
			$emploFirstName=(isset($_REQUEST['empFName']) ? $_REQUEST['empFName'] : null);
			$emploMiddleName=(isset($_REQUEST['empMName']) ? $_REQUEST['empMName'] : null);
			$emploLastName=(isset($_REQUEST['empLName']) ? $_REQUEST['empLName'] : null);
			$emploExtenName=(isset($_REQUEST['empEName']) ? $_REQUEST['empEName'] : null);
			
			if (isset($_POST["editEmp"])){
					
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$empFName = $_POST['empFName'];
				$empLName = $_POST['empLName'];
				$empMName = $_POST['empMName'];
				$query = $conn->prepare("Select * FROM employee WHERE empFirstName = '$empFName' AND empLastName = '$empLName' AND empMidName = '$empMName'");
				$count = $query->execute();
				$row = $query->fetch();

				if ($query->rowCount() > 0){
					echo '<script language="javascript">';
					echo 'swal(
						  "Error!",
						  "Employee Already Exists, New Employee Has Not been Added",
						  "error");';
					echo '$("#myModal").modal("show");';
					echo 'document.getElementById("addFName").style.borderColor = "red";';
					echo 'document.getElementById("addLName").style.borderColor = "red";';
					echo 'document.getElementById("addMName").style.borderColor = "red";';
					echo '</script>';
				} else {
								 
				$sql = "UPDATE employee SET empFirstName = '$emploFirstName', empMidName = '$emploMiddleName', empLastName = '$emploLastName', empExtensionName = '$emploExtenName'
						WHERE empID = '$employID'";
				$conn->exec($sql);
				
				$url='../employees.php';
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
				}				
			}
		?>