<!DOCTYPE html>

<?php
	session_start();
	
	$username = "root";
	$password = "1234";
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		header("Location: home.php");
	
	} if (isset($_POST['username']) && isset($_POST['password'])) {
		  if ($_POST['username'] == $username && $_POST['password'] == $password) {
	
			$_SESSION['loggedin'] = true;
			header("Location: home.php");
		  }
	}
		else {
			$_SESSION['message'] = "invalid";
		}
		
?>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="logo.jpg">
	<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
	<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<h1>Dency's Hardware and General Merchandise</h1>
				</div>
			</div>
	</nav>
		<center><img src="logo.jpg" alt="logo" id="logo"/></center>
	<div class="company">
		<h3 id="is">Inventory System</h3>
	</div>

	<div class="jumbotron" id="login">
		<div class="container" id="form">
			<form method= "POST" action="login.php">
			Username: <input type="text" name="username" placeholder="Username" required> <br><br>
            Password: <input name="password" type="password" placeholder="Password" required > <br><br>  
			<input type="submit" value="Login" id="input">
			</form> 
		</div>
	</div>

	<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="container">
				<div class="navbar-header">
				</div>
			</div>
	</nav>


  </body>
</html>