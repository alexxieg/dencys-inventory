		
		<?php
			if (isset($_POST["addEmp"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 
				$sql = "INSERT INTO employee (empName)
				VALUES ('".$_POST['empName']."')";
				$conn->exec($sql);
			echo "<meta http-equiv='refresh' content='0'>";
			}    
		?>