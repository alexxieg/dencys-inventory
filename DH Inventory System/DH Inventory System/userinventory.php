<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Inventory</title>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
		
		<script src="js/bootstrap.js"></script>
			
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
		<?php include('fetchInventory.php'); ?>	
		

		<nav class="navbar navbar-inverse navbar-fixed-top" >
			<div class="container">
				<img src="WDF_1857921.jpg" id="headerBG"/>
				<center><img src="dencys.png" alt="logo" id="logo1"/></center>
			</div>

			<div class="splitHeader">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>

					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right" id="categories">
							<li class="active" id="navi"><a href="userinventory.php">Inventory</a></li>
							<li><a href="userincoming.php">Incoming</a></li>
							<li><a href="useroutgoing.php">Outgoing</a></li>
							<li><a href="userreturns.php">Returns</a></li>
							<li><a href="userproduct.php">Products</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		
		<div id="contents">
			<div class="pages no-more-tables">
				<div id="tableHeader">			
					<h1 id="headers">INVENTORY</h1>	
					<form action="?" method="post">
						<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
					</form>
					<br>
					<br>
				</div>
				<br>
				<table class="table table-striped table-bordered">
					<tr>
						<th>
							Product ID
							<button type="button" class="btn btn-default" value="?orderBy=prodID DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=prodID ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>
							
						<th>
							Product Description
							<button type="button" class="btn btn-default" value="?orderBy=prodName DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=prodName ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
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
							$currQty = $item["initialQty"] + $item["inQty"] - $item["outQty"];
							$sql = $conn->prepare("INSERT INTO inventory (inQty) SELECT SUM(incoming.inQty) from incoming LEFT JOIN inventory ON incoming.prodID = inventory.prodID
										GROUP BY incoming.prodID");
							$sql->execute();
							if ($currQty <= $item["reorderLevel"]){
					?> 
					
					<tr style='background-color: #ff9999' id="centerData">
						<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
						<td data-title="Description"><?php echo $item["prodName"]; ?></td>
						<td data-title="Model"><?php echo $item["model"]; ?> </td>
						<td data-title="Beg. Quantity"><?php echo $item["initialQty"]; ?></td>
						<td data-title="End. Quantity"></td>
						<td data-title="IN"><?php echo $item["inQty"]; ?></td>
						<td data-title="OUT"><?php echo $item["outQty"]; ?></td>
						<td data-title="Current Quantity"><?php echo $currQty; ?></td>
						<td data-title="Physical Count"></td>
						<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
						<td data-title="Unit"><?php echo $item["unitType"];?></td>
					
						<td data-title="Remarks"></td>
					</tr>
					
					<?php	
						}else if ($currQty > $item["reorderLevel"]){
					?>
					
					<tr id="centerData">
						<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
						<td data-title="Description"><?php echo $item["prodName"]; ?></td>
						<td data-title="Model"><?php echo $item["model"]; ?> </td>
						<td data-title="Beg. Quantity"><?php echo $item["initialQty"]; ?></td>
						<td data-title="End. Quantity"></td>
						<td data-title="IN"><?php echo $item["inQty"]; ?></td>
						<td data-title="OUT"><?php echo $item["outQty"]; ?></td>
						<td data-title="Current Quantity"><?php echo $currQty; ?></td>
						<td data-title="Physical Count"></td>
						<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
						<td data-title="Unit"><?php echo $item["unitType"];?></td>
					
						<td data-title="Remarks"></td>
					</tr>
					<?php
						}	
					?>
						
					<?php
						endforeach;
					?>
				</table>
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
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right" id="logout">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
	</body>
</html>
