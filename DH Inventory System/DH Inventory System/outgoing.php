<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Outgoing</title>
		
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
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
  
	<body>
		<?php
			$query = $conn->prepare("SELECT product.prodName, outgoing.outQty, outgoing.outDate, employee.empName, branch.location, outgoing.outRemarks FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID ORDER BY outID DESC;");
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
			<h1 id="headers">Outgoing</h1>
			<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
				
			<select class="form-control" id="dropdown" name="searchby">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
				
			<select class="form-control" id="dropdown" name="sortby">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
				
			<table class="table table-striped table-bordered">
				<tr>
					<th style="text-align:center">The following have been deducted from the Inventory:</th>
				</tr>
				<tr>
					<th>Item</th>
					<th>Quantity</th>
					<th>Date</th>
					<th>Employee</th>
					<th>Branch</th>	
					<th>Remarks</th>				
					<th></th>

				</tr>
				
				<?php
					foreach ($result as $item):
				?>

				<tr>
					<td><?php echo $item["prodName"]; ?></td>
					<td><?php echo $item["outQty"]; ?></td>
					<td><?php echo $item["outDate"]; ?></td>
					<td><?php echo $item["empName"]; ?></td>
					<td><?php echo $item["location"]; ?></td>
					<td><?php echo $item["outRemarks"]; ?></td>
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
				
			<form action="addOutgoing.php" target="_blank">
				<input id="myBtn" type="submit" value="Add Outgoing Product" class="btn btn-default btnAlign">
			</form>
			
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

