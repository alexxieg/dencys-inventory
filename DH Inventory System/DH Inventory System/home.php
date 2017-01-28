<!DOCTYPE html>

 <?php
	session_start();
	
	if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
		header('Location: Login.php');
	}

?>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="logo.jpg">
    <link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
 
  <body >
	<div class="productHolder" >
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
						<li><a href="home.php">Home</a></li>
						<li><a href="product.php">Products</a></li>
						<li><a href="inventory.php">Inventory</a></li>
						<li><a href="returns.php">Returns</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>	
		<h2>Home</h1>
			<table border="2" id="alertTable">
				<tr>
				<th style="text-align:center">The Following Items Are Nearly Out of Stock</th>
				</tr>
				<tr>
				<th style="text-align:center">Item</th>
				<th style="text-align:center">Quantity Left</th>
				</tr>
				<tr>
				<td>Item 1</td>
				<td>1</td>
				</tr>
				<tr>
				<td>Item 2</td>
				<td>2</td>
				</tr>
				<tr>
				<td>Item 3</td>
				<td>2</td>
				</tr>
			</table>
		
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right" id="logout">
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		</div>
	</nav>
  </body>
</html>

