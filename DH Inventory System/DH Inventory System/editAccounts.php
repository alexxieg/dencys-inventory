<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Accounts</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		
		<script src="accounts.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<?php include('dbcon.php'); ?>	
		<?php 
			session_start();
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) && $role!="admin") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>	
	</head>
  
  <body>
  
  <nav class="navbar navbar-inverse navbar-static-top" >
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1>Dency's Hardware and General Merchandise</h1>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right" id="categories">
							<li><a href="inventory.php">Inventory</a></li>
							<li><a href="incoming.php">Incoming</a></li>
							<li><a href="outgoing.php">Outgoing</a></li>
							<li><a href="returns.php">Returns</a></li>
							<li><a href="admin.html">Admin</a></li>
						</ul>
				</div>
			</div>
		</nav>

	<div class="addInv">
	
	
		<h1 id="headers">Edit Account</h1>
		<div id="contents">
			<form action="" method="POST">
				<h3>Username</h3>
				<input type="text" class="form-control" id ="addEntry" placeholder="Name" name="userName"> <br>
				
				<h3>Password</h3>
				<input type="password" class="form-control" id ="addEntry" placeholder="User Password" name="psw"> <br>
				
				<div class="form-group">
					 <h3>User Role</h3>
					  <select class="form-control" id="addEntry" name="user_role">
						<option>admin</option>
						<option>user</option>
					  </select>
				</div>
				
				<br>
			<input type="submit" value="Update" class="btn btn-success" name="addAccnt" onclick="alert('New Account Successfully Added');">
			<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
			</form> 
		</div>
	</div>
	   
	<?php
		$useThisID= $_GET['useID'];
		$useName=(isset($_REQUEST['userName']) ? $_REQUEST['userName'] : null);
		$passW=(isset($_REQUEST['psw']) ? $_REQUEST['psw'] : null);
		$urole=(isset($_REQUEST['user_role']) ? $_REQUEST['user_role'] : null);
    if (isset($_POST["addAccnt"])){
    
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
		$sql = "UPDATE users SET userName = '$useName', password = '$passW' WHERE userID = '$useThisID'";
    
		$conn->exec($sql);
	}    

	?>
  </body>
</html>