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
		<?php
			$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
			if (!empty($sort)) { 
				$query = $conn->prepare("SELECT product.prodID, product.prodName,inventory.qty, product.price 
				FROM product INNER JOIN inventory ON product.prodID = inventory.prodID ORDER BY $sort ASC;");
			} else { 
				$query = $conn->prepare("SELECT product.prodID, product.prodName,inventory.qty, product.price 
								FROM product INNER JOIN inventory ON product.prodID = inventory.prodID
								ORDER BY prodID ASC;");
			}	
			$query->execute();
			$result = $query->fetchAll();
		?>
	
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
							<li><a href="incoming.php">Incoming</a></li>
							<li><a href="outgoing.php">Outgoing</a></li>
							<li><a href="returns.php">Returns</a></li>
							<li><a href="admin.html">Admin</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div class="pages">
			<div id="tableHeader">
				<table class="table table-striped table-bordered">		
						<tr>
						<h1 id="headers">Inventory</h1>
						</tr>
						
					<tr>
						<td>
						<select class="form-control" id="dropdown" name="sortBy" onchange="location = this.value;">
							<option value="" disabled selected hidden>--SELECTA--</option>
							<option value="?orderBy=prodID">Item Code</option>
							<option value="?orderBy=prodName">Item</option>
							<option value="?orderBy=qty">Quantity</option>
							<option value="?orderBy=price">Item Price</option>
						</select>
						</td>

						<td>
						<select class="form-control" id="dropdown" name="sortby">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						</tD>

						<td>
						<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
						</td>
					</tr>
				</table>
			</div>
			<div class="prodTable">
				<br>
				
				<table class="table table-striped table-bordered">
					<tr>
						<th><a href="?orderBy=prodID">Item Code</a></th>
						<th><a href="?orderBy=prodName">Item</a></th>	
						<th><a href="?orderBy=qty">Quantity</a></th>
						<th><a href="?orderBy=price">Item Price</a></th>
					</tr>
					
					<?php
						foreach ($result as $item):
					?>

					<tr>
						<td><?php echo $item["prodID"]; ?></td>
						<td><?php echo $item["prodName"]; ?></td>
						<td><?php echo $item["qty"]; ?></td>
						<td><?php echo $item["price"]; ?></td>
								
					</tr>
					
					<?php
						endforeach;
					?>
				</table>
		
			</div>	
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
						<li><a href="logout.php">Logout</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-left" id="report">
						<li><a href="report.html">Print Report</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</body>
</html>