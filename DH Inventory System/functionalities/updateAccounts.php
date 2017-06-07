<!-- Update Function -->
		<?php
			$useThisID= $_GET['useID'];
			$useName=(isset($_REQUEST['userName']) ? $_REQUEST['userName'] : null);
			$passW=(isset($_REQUEST['psw']) ? $_REQUEST['psw'] : null);
			$hashPW=password_hash($passW, PASSWORD_BCRYPT);
			$urole=(isset($_REQUEST['user_role']) ? $_REQUEST['user_role'] : null);
			if (isset($_POST["editAccount"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$userName = $_POST['userName'];
				$psw = $_POST['psw'];
				$query = $conn->prepare("Select * FROM users WHERE userName = '$userName'");
				$count = $query->execute();
				$row = $query->fetch();

				if ($query->rowCount() > 0){
					echo '<script language="javascript">';
					echo 'swal(
						  "Error!",
						  "User Already Exists, User Has Not been Updated",
						  "error");';
					echo '$("#myModal").modal("show");';
					echo 'document.getElementById("addEntry").style.borderColor = "red";';
					echo '</script>';
				} else {
			 
				$sql = "UPDATE users SET userName = '$useName', password = '$hashPW', user_role = '$urole' WHERE userID = '$useThisID'";
				$conn->exec($sql);
				
				$url='../accounts.php';
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
				
				}
			} 	
		?>
		<?php
		require_once 'dbcon.php';
		$usethisid= $_GET['useID'];
		if (isset($_POST["editAccount"])){
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if ($query->rowCount() > 0){
					echo '<script language="javascript">';
					echo 'swal(
						  "Error!",
						  "User Already Exists, User Has Not been Updated",
						  "error");';
					echo '$("#myModal").modal("show");';
					echo 'document.getElementById("addEntry").style.borderColor = "red";';
					echo '</script>';
				} else {
					
		$sql = "INSERT INTO edituser (userName, userEditDate, password, user_role, userID, status)
				SELECT  userName, CURDATE(), password, user_role, userID, status from users WHERE userID = '$useThisID' ORDER BY userID";
		$conn->exec($sql);
				}
		}
		?>	   