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
    <title>Products</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	<link rel="shortcut icon" href="logo.jpg">

  </head>
  
  <body>
	<div class="productHolder">
		<nav class="navbar navbar-inverse navbar-static-top">
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
	
	<div class="product">
	<h1 id="headers">Returns</h1>	
		<form>
			<input type="search" name="searchbox" placeholder="Search" id="search">
		</form>
		<br>
		<select style="width: 200px">
		  <option value="" disabled selected hidden>Search By</option>
		  <option value="searchby">Sample 1</option>
		  <option value="searchby">Sample 2</option>
		  <option value="searchby">Sample 3</option>
		</select>
		
		<select id="prodSort" style="width: 200px">
		  <option value="" disabled selected hidden>Sort By</option>
		  <option value="searchby">Sample 1</option>
		  <option value="searchby">Sample 2</option>
		  <option value="searchby">Sample 3</option>
		</select>
		
		<div class="prodTable">
			<table border="1" id="table">
				<tr>
				<th style="text-align:center">Item</th>
				<th style="text-align:center">Brand</th>
				<th style="text-align:center">Quantity</th>
				<th style="text-align:center">Remarks</th>
				<th></th>
				<th></th>
				<th></th>
				</tr>
				<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><button type="button">Edit</button></td>
				<td><button type="button">Remove</button></td>
				</tr>
				<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><button type="button">Edit</button></td>
				<td><button type="button">Remove</button></td>
				</tr>
				<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><button type="button">Edit</button></td>
				<td><button type="button">Remove</button></td>
				</tr>
				<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><button type="button">Edit</button></td>
				<td><button type="button">Remove</button></td>
				</tr>
			</table>
		</div>	
		<form action="addReturn.html" target="_blank">
			<input id="myBtn" type="submit" value="Add Returns">
		</form>
	</div>
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
				<li><a href="login.html">Logout</a></li>
			</ul>
		</div>
		</div>
	</nav>
  </body>
</html>