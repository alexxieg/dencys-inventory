<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Returns</title>
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
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		<script src="js/bootstrap.js"></script>
		<link rel="shortcut icon" href="logo.jpg">
	</head>
  
	<body>
		<?php
		
			$sort = (isset($_GET['orderBy']) ? $_GET['orderBy'] : null);
			if (!empty($sort)) {
				$query = $conn->prepare("SELECT returns.returnDate, product.prodName, returns.returnQty, returns.status, returns.returnRemark 
				FROM returns INNER JOIN product ON returns.prodID = product.prodID 
				ORDER BY $sort ASC;");
			
			} else {
				$query = $conn->prepare("SELECT returns.returnDate, product.prodName, returns.returnQty, returns.status, returns.returnRemark 
				FROM returns INNER JOIN product ON returns.prodID = product.prodID 
				ORDER BY returnID ASC;");
				
			}
			$query->execute();
			$result = $query->fetchAll();
		?>
		
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
	<div id="tableHeader">
	<table class="table table-striped table-bordered">	
		<div class="pages">
			<tr>
			<h1 id="headers">Returns</h1>	
			</tr>

		<tr>
			<td>			
			<select class="form-control" id="dropdown" name="searchby" onchange="location = this.value;">
			  <option value="" disabled selected hidden>--SELECTA--</option>
			  <option value="?orderBy=returnDate">Date</option>
			  <option value="?orderBy=prodName">Item</option>
			  <option value="?orderBy=returnQty">Quantity</option>
			  <option value="?orderBy=status">Status</option>
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
			</td>

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
						<th>Date</th>
						<th>Item</th>
						<th>Quantity</th>
						<th>Status</th>
						<th>Remarks</th>
						<th></th>

					</tr>
					
					<?php
						foreach ($result as $item):
					?>
					<tr>
						<td><?php echo $item["returnDate"]; ?></td>
						<td><?php echo $item["prodName"]; ?></td>
						<td><?php echo $item["returnQty"]; ?></td>
						<td><?php echo $item["status"]; ?></td>
						<td><?php echo $item["returnRemark"]; ?></td>
						<td>
							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</button>
				
							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</td>
					</tr>
					
					<?php
						endforeach;
					?>
					
				</table>
			</div>	
			<form action="addReturn.php" target="_blank">
				<input id="myBtn" type="submit" value="Add Returns" class="btn btn-default btnAlign">
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
					<ul class="nav navbar-nav navbar-left" id="report">
						<li><a href="report.html">Print Report</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</body>
</html>