<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Reorder</title>
				
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<?php include('dbcon.php'); ?>
		<?php 
			session_start();
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) && $role!="admin") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>
	</head>
  
	<body>
		<?php
	
				$query = $conn->prepare("SELECT * FROM inventory LEFT JOIN product ON inventory.prodID = product.prodID
WHERE inventory.qty < product.reorderLevel");
		
			$query->execute();
			$result = $query->fetchAll();
		?>	

		<div class="productHolder">
			<nav class="navbar navbar-inverse navbar-fixed-top" >
					<center><img src="logo.png" alt="logo" id="logo"/></center>
					<div class="navName">
						<h1 class="compName">Dency's Hardware and<br>General Merchandise</h1>
					</div>
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
							<ul class="nav navbar-nav navbar-right" id="categories">
								<li><a href="inventory.php">Inventory</a></li>
								<li><a href="incoming.php">Incoming</a></li>
								<li><a href="outgoing.php">Outgoing</a></li>
								<li><a href="returns.php">Returns</a></li>
								<li><a href="admin.php">Admin</a></li>
							</ul>
						</div>
					</div>
				</nav>
		</div>	

		<div id="contents">
			<div class="pages">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">		
						<h1 id="headers">INVENTORY: Products for Reordering</h1>
							<form action="" method="post">
								<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
							</form>	
					</table>
				</div>
					
				<div class="prodTable">
					<table class="table table-bordered" id="tables">
						<tr>
							<th>
								Product ID
							</th>
								
							<th>
								Product Description
							</th>
							
							<th>
								Model
							</th>
							
							<th>
								Beginning Quantity
							</th>
							
							<th>
								Ending Quantity
							</th>
							
							<th>
								IN
							</th>
							
							<th>
								OUT
							</th>
							
							<th>
								Current Quantity
								
							</th>
							
							<th>
								Physical Count
							</th>
							
							<th>
								Reorder Level
							</th>
							
							<th>
								Unit
							</th>
			
							<th>
								Remarks
							</th>
								
						</tr>
	
							
						<?php
							foreach ($result as $item):
						?>

						<tr>
							<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
							<td data-title="Description"><?php echo $item["prodName"]; ?></td>
							<td data-title="Model"><?php echo $item["model"]; ?> </td>
							<td data-title="Beg. Quantity"><?php echo $item["initialQty"]; ?></td>
							<td data-title="End. Quantity"></td>
							<td data-title="IN"><?php echo $item["inQty"]; ?></td>
							<td data-title="OUT"><?php echo $item["outQty"]; ?></td>
							<td data-title="Current Quantity"><?php echo $item["qty"]; ?></td>
							<td data-title="Physical Count"></td>
							<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
							<td data-title="Unit"><?php echo $item["unitType"];?></td>
							</td>		
						</tr>
							
						<?php
							endforeach;
						?>
					</table>
				
				</div>
			</div>
		</div>

		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="container">
				<ul class="nav navbar-nav navbar-left" id="report">
					<li>
						<button class="btn btn-success btn-lg" onclick="myFunction()" id="printBtn">
							<span class="glyphicon glyphicon-print"></span>
						    Print
						</button> 
					</ul>
				<ul class="nav navbar-nav navbar-right" id="logout">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>		
	</body>
</html>

