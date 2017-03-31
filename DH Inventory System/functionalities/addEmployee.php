		
		<?php
			if (isset($_POST["addEmp"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				$sql = "INSERT INTO employee (empFirstName, empLastName, empMidName, empExtensionName)
				VALUES ('".$_POST['empFName']."','".$_POST['empLName']."','".$_POST['empMName']."','".$_POST['empEName']."')";
				$conn->exec($sql);
			echo "<meta http-equiv='refresh' content='0'>";
			}    
		?>