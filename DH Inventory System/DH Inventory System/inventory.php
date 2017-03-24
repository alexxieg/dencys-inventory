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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			
		<?php include('dbcon.php'); ?>
		
		<?php 
			session_start();
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) || $role!="admin") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>
	</head>
    
  	<body>
		<!-- PHP code for fetching the data-->
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
						</button>
					</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right" id="categories">
						<li class="active" id="navi"><a href="inventory.php">Inventory</a></li>
						<li><a href="incoming.php">Incoming</a></li>
						<li><a href="outgoing.php">Outgoing</a></li>
						<li><a href="returns.php">Returns</a></li>
						<li><a href="admin.php">Admin</a></li>
					</ul>
				</div>
			</div>
		</nav>
				
		
		<div id="contents">
			<div class="pages no-more-tables">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">	
						<h1 id="headers">INVENTORY</h1>	
						<form action="?" method="post">
							<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
						</form>	
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">
							Products for Reorder
						</button>					
					</table>
				</div>
				<br>
				
				<!-- Table for Inventory Data-->
				<table class="table table-striped table-bordered">
					<tr>
						<td colspan="13" style="font-size: 35px;">
							<?php
							$month = $conn->prepare("SELECT concat( MONTHNAME(curdate()), ' ', YEAR(curdate())) as 'month';");
							$month->execute();
							$monthres = $month->fetchAll();
							foreach ($monthres as $monthshow)
							echo $monthshow["month"];
							?>	
						</td>
					</tr>
					<tr>
						<th>
							<div id="tabHead">Product ID</div>
							<button type="button" class="btn btn-default sortRes" value="?orderBy=prodID DESC" onclick="location = this.value;" id="OutsortBtnDown1">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default sortRes" value="?orderBy=prodID ASC" onclick="location = this.value;" id="OutsortBtnUp1">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>
						
						<th>
							<div id="tabHead">Product Description</div>
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
						
						<th>
							Stock Card
						</th>
					</tr>
					
					<?php
						foreach ($result as $item):
							$currQty = $item["initialQty"] + $item["inQty"] - $item["outQty"];
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
						<td>
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#ledger" id="edBtn1">
									<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
							</button>	
						</td>	
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
						<td>
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#ledger" id="edBtn1">
									<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
							</button>	
						</td>	
					</tr>
					<?php
						}	
					?>
						
					<?php
						endforeach;
					?>
				</table>
			</div>	
					
			<!-- Modal for Reorder Products Summary -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Summary of products to be reordered</h4>
						</div>
						<div class="modal-body">			
							<?php
								$query = $conn->prepare("SELECT * FROM inventory LEFT JOIN product ON inventory.prodID = product.prodID
														WHERE inventory.qty <= product.reorderLevel");
								$query->execute();
								$result = $query->fetchAll();
							?>	
							
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
										Current Quantity
									</th>
									<th>
										Reorder Level
									</th>
									<th>
										Unit
									</th>	
								</tr>
									
								<?php
									foreach ($result as $item):
								?>

								<tr>
									<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
									<td data-title="Description"><?php echo $item["prodName"]; ?></td>
									<td data-title="Model"><?php echo $item["model"]; ?> </td>
									<td data-title="Current Quantity"><?php echo $item["qty"]; ?></td>
									<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
									<td data-title="Unit"><?php echo $item["unitType"];?></td>
									</td>		
								</tr>	
								<?php
									endforeach;
								?>
							</table>																
						</div>
								
						<div class="modal-footer">	
						</div>
					</div>
				</div>
			</div>
			
			<!-- Modal for the Product Stock Card/Ledger -->
			<div class="modal fade" id="ledger" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Stock Card</h4>
						</div>
						<div class="modal-body">
						<h5>Product Name: </h5>
							<table class="table table-bordered" id="tables">
								<tr>
									<th>
										Date
									</th>
									<th>
										In
									</th>
									<th>
										Out
									</th>
									<th>
										Balance
									</th>
								</tr>
								
								<tr>
									<td>
									</td>
									<td>
									</td>
									<td>
									</td>									
									<td>
									</td>
								</tr>
							</table>
						</div>
						
						<div class="modal-footer">	
						</div>
					</div>
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
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right" id="logout">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
		
	</body>
</html>
