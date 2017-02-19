<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory</title>
		<?php include('dbcon.php'); ?>
<?php 
session_start();
if (isset($_SESSION['id'])){
header('Location: inventory.php');
$session_id = $_SESSION['id'];
$session_query = $conn->query("select * from users where userName = '$session_id'");
$user_row = $session_query->fetch();
 if (!isset($_SESSION['id']) || $_SESSION['id'] == false) {
		session_destroy();
		header('Location: index.php');
 }
}
?>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="logo.jpg">
    <link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	<?php require('dbcon.php'); ?>
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
						<li><a href="inventory.php">Inventory</a></li>
						<li><a href="product.html">Products</a></li>
						<li><a href="incoming.html">Incoming</a></li>
						<li><a href="outgoing.html">Outgoing</a></li>
						<li><a href="returns.html">Returns</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
		<div class="product">
			<h1 id="headers">Inventory</h1>
		
			<select id="prodSort">
			  <option value="" disabled selected hidden>Sort By</option>
			  <option value="searchby">Sample 1</option>
			  <option value="searchby">Sample 2</option>
			  <option value="searchby">Sample 3</option>
			</select>
			
		<div class="prodTable">
			<br>
			<table border="1" id="table">
				<tr>
				<th style="text-align:center">Item</th>
				<th style="text-align:center">Brand</th>
				<th style="text-align:center">Serial Code</th>
				<th style="text-align:center">Quantity</th>
				<th style="text-align:center">Quantity Threshold</th>

				</tr>
				<tr>
				<td>Item 1</td>
				<td>Brand X</td>
				<td>SE10234</td>
				<td>5</td>
				<td>2</td>
				</tr>
				<tr>
				<td>Item 1</td>
				<td>Brand X</td>
				<td>SE10234</td>
				<td>5</td>
				<td>2</td>
				</tr>
				<tr>
				<td>Item 1</td>
				<td>Brand X</td>
				<td>SE10234</td>
				<td>5</td>
				<td>2</td>
				</tr>
				<tr>
				<td>Item 1</td>
				<td>Brand X</td>
				<td>SE10234</td>
				<td>5</td>
				<td>2</td>
				</tr>
			</table>
		</div>	
		
		<form action="inventory.html" target="_blank">
			<input type="submit" value="Check for Understocked Products" class="btn btn-default btnAlign">
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
				<li><a href="Logout.php">Logout</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-left" id="report">
				<li><a href="report.html">Print Report</a></li>
			</ul>
		</div>
		</div>
	</nav>
  </body>
</html>