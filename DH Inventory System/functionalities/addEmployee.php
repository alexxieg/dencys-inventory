		
		<?php
			if (isset($_POST["addEmp"])){
			
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
				 
				$sql = "INSERT INTO employee (empFirstName, empLastName, empMidName, empExtensionName)
				VALUES ('$empFName','$empLName','$empMName','".$_POST['empEName']."')";
				$conn->exec($sql);
			echo "<meta http-equiv='refresh' content='0'>";
			}
			}			
		?>