<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="logo.jpg">
	<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
	<?php require('dbcon.php'); ?>
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
			<form class="form-horizontal" method= "POST" action="Login.php">
			<?php include 'Login.php';	?>
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

			 <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-12">
			      <button type="submit" class="btn btn-default loginbtn btn-md"> Login</button>
			    </div>
 			 </div>
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