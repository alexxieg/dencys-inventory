<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Welcome</title>
		
		<!-- Database Connection -->
		<?php require('dbcon.php'); ?>
		
		<link rel="shortcut icon" href="logo.jpg">

		<!-- CSS Files -->
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<script src="sweetalert2/dist/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
		
	</head>
  
	<body class="inBack">
		<div class="loginLogo">
			<center><img src="logo.png" alt="loginLogo" id="loginLogo" style="width:10%; margin-bottom:-100px;"/></center>
		</div>

		<div class="newcompany">
			<form class="form-horizontal" method= "POST" action="Login.php">
				<?php include ('Login.php'); ?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="username">Username:</label>
					<div class="col-sm-8">
					  <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd">Password:</label>
					<div class="col-sm-8">
						<input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" required>
					</div>
				</div>
				
				<div>
					<div class="col-sm-offset-2 col-sm-12">
						<button type="submit" class="btn btn-default loginbtn btn-md">Login</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>