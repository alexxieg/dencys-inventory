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
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) && $role!="user") {
				header('Location: index.php');
			}
				$session_id = $_SESSION['id'];
				$session_query = $conn->query("select * from users where userName = '$session_id'");
				$user_row = $session_query->fetch();
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
			$searching = (isset($_REQUEST['search']) ? $_REQUEST['search'] : null);
			if (!empty($sort)) { 
				$query = $conn->prepare("SELECT product.prodID, product.prodName, sum(incoming.inQty) AS inQty, sum(outgoing.outQty) AS outQty, inventory.qty, product.price 
										FROM product INNER JOIN inventory ON product.prodID = inventory.prodID INNER JOIN incoming ON product.prodID = incoming.prodID INNER JOIN outgoing ON product.prodID = outgoing.prodID
										GROUP BY prodID, qty
										ORDER BY $sort");
			} else { 
				$query = $conn->prepare("SELECT product.prodID, product.prodName, sum(incoming.inQty) AS inQty, sum(outgoing.outQty) AS outQty, inventory.qty, product.price 
										FROM product INNER JOIN inventory ON product.prodID = inventory.prodID INNER JOIN incoming ON product.prodID = incoming.prodID INNER JOIN outgoing ON product.prodID = outgoing.prodID
										GROUP BY prodID, qty");
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
							<li><a href="userinventory.php">Inventory</a></li>
							<li><a href="userincoming.php">Incoming</a></li>
							<li><a href="useroutgoing.php">Outgoing</a></li>
							<li><a href="userreturns.php">Returns</a></li>
							<li><a href="userproduct.php">Product</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div class="pages">
			
			<h1 id="headers">INVENTORY</h1>
					
					
			<form action="?" method="post">
				<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
				<button type="submit" name="submit">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</form>
			<br>
			<br>
		
			
			<div class="prodTable">
				<br>
				
				<table class="table table-striped table-bordered">
					<tr>
						<th>
							<a href="?orderBy=prodID">Product ID</a>
							<button type="button" class="btn btn-default" value="?orderBy=prodID DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=prodID ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
							</button>
						</th>
						
						<th>
							<a href="?orderBy=prodName">Product Description</a>
							<button type="button" class="btn btn-default" value="?orderBy=prodName DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=prodName ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
							</button>
						</th>
						
						<th>
							IN
						</th>
						
						<th>
							OUT
						</th>
						
						<th>
							<a href="?orderBy=qty">Current Quantity</a>
							<button type="button" class="btn btn-default" value="?orderBy=qty DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=qty ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
							</button>
						</th>
						
						<th>
							Physical Count
						</th>
						
						<th>
							Unit Type
						</th>
						
						<th>
							<a href="?orderBy=price">Item Price</a>
							<button type="button" class="btn btn-default" value="?orderBy=price DESC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=price ASC" onclick="location = this.value;">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
							</button>
						</th>
					</tr>
					
					<?php
						foreach ($result as $item):
					?>

					<tr>
						<td><?php echo $item["prodID"]; ?></td>
						<td><?php echo $item["prodName"]; ?></td>
						<td><?php echo $item["inQty"]; ?></td>
						<td><?php echo $item["outQty"]; ?></td>
						<td><?php echo $item["qty"]; ?></td>
						<td></td>
						<td></td>
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