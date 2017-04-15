<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Inventory</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">
			
		<script src="datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="datatables/media/js/dataTables.bootstrap.min.js"></script>
		<link href="datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">	
		<link href="..datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
		
		<!-- Datatables -->
		<script>
			$(document).ready(function(){
				$('#myTable').dataTable();
			});
		</script>
			
		<!-- Database connection -->
		<?php include('dbcon.php'); ?>
		
		<!-- Login Session-->
		<?php 
			session_start();
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) || $role!="user") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>
	</head>
    
  	<body>
		<!-- PHP code for fetching the data-->
		<?php
			$query = $conn->prepare("SELECT product.prodID, product.prodName, product.unitType, product.reorderLevel, archive.beginningQty, archive.endingQty, archive.physicalQty, archive.qty, archive.totalIn, archive.totalOut, archive.remarks
										FROM product LEFT JOIN archive ON product.prodID = archive.prodID LEFT JOIN incoming ON product.prodID = incoming.prodID LEFT JOIN outgoing ON product.prodID = outgoing.prodID
										WHERE product.status = 'Active' 
										GROUP BY prodID, archive.beginningQty, qty, archive.totalIn, archive.totalOut, archive.physicalQty, archive.endingQty, archive.remarks");	
			$query->execute();
			$result = $query->fetchAll();
		?>	
		
		<!-- Top Main Header -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Dency's Hardware and General Merchandise</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					<li id="adminhead"><h3>User |</h3></li>
					<li id="loghead"><a href="Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End of Top Main Header -->

		<div class="container-fluid">
			<div class="row">
				<!-- Sidebar -->
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="logo.png" alt=""/></div>
						<li class="active">	<a href="userinventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory<span class="sr-only">(current)</span></a></li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="userincoming.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Deliveries</a></li>
								<li><a href="userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="useroutgoing.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="userReturnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="userreturnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="userbranchreport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="useronthlyincoming.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="usermonthlyoutgoing.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li><a href="userproduct.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->
				
				<?php
					foreach ($result as $item):
						$currQty = $item["qty"];
						$incID = $item["prodID"];
						if ($currQty <= $item["reorderLevel"]){
				?> 
							
				<?php	
					}else if ($currQty > $item["reorderLevel"]){
				?>
							
				<?php
					}	
				?>
								
				<?php
					endforeach;
				?>

				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">					
					<div id="contents">
						<div class="pages">
							<div id="tableHeader">
								<table class="table table-striped table-bordered">	
									<h1 id="headers">PREVIOUS INVENTORY</h1>	
									<select>
										<option>March 2017</option>
									</select>
								</table>
							</div>
							
							<hr>
							
							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
							
							<!-- Table for Inventory Data-->
							<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								<thead>	
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
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											<div id="tabHead">Product ID</div>
										</th>
										
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											<div id="tabHead">Product Description</div>
										</th>	
										
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											Beginning Quantity
										</th>
										
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											Ending Quantity
										</th>
										
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											IN
										</th>
										
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											OUT
										</th>
										
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											Current Quantity
											
										</th>
										
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											Physical Count
										</th>
										
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											Reorder Level
										</th>
										
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											Unit
										</th>
						
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											Remarks
										</th>
										
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											Stock Card
										</th>
									</tr>
							</thead>
							<tbody>	
									
									<?php
										foreach ($result as $item):
									
											$incID = $item["prodID"];
											if ($item['qty'] <= $item["reorderLevel"]){
									?> 
									<tr id="centerData">
										<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
										<td data-title="Description"><?php echo $item["prodName"]; ?></td>
										<td data-title="Beg. Quantity"><?php echo $item["beginningQty"]; ?></td>
										<td data-title="End. Quantity"><?php echo $item["endingQty"]; ?></td>
										<td data-title="IN"><?php echo $item["totalIn"]; ?></td>
										<td data-title="OUT"><?php echo $item["totalOut"]; ?></td>
										<td data-title="Current Quantity"><?php echo $item["qty"] ?></td>
										<td data-title="Physical Count"><?php echo $item["physicalQty"]; ?></td>
										<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
										<td data-title="Unit"><?php echo $item["unitType"];?></td>
										<td data-title="Remarks"><?php echo $item["remarks"];?></td>
										<td>
											<a href="ledger.php?incId=<?php echo $incID; ?>" target="_blank"> 
												<button type="button" class="btn btn-default" id="edBtn">
													<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
												</button>
											</a>
										</td>
									</tr>
									
									<?php	
										}else if ($item['qty'] > $item["reorderLevel"]){
									?>
									<tr id="centerData">
										<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
										<td data-title="Description"><?php echo $item["prodName"]; ?></td>
										<td data-title="Beg. Quantity"><?php echo $item["beginningQty"]; ?></td>
										<td data-title="End. Quantity"><?php echo $item["endingQty"]; ?></td>
										<td data-title="IN"><?php echo $item["totalIn"]; ?></td>
										<td data-title="OUT"><?php echo $item["totalOut"]; ?></td>
										<td data-title="Current Quantity"><?php echo $item["qty"] ?></td>
										<td data-title="Physical Count"><?php echo $item["physicalQty"]; ?></td>
										<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
										<td data-title="Unit"><?php echo $item["unitType"];?></td>
										<td data-title="Remarks"><?php echo $item["remarks"];?></td>
										<td>
											<a href="ledger.php?incId=<?php echo $incID; ?>" target="_self"> 
												<button type="button" class="btn btn-default" id="edBtn">
													<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
												</button>
											</a>	
										</td>	
									</tr>
									<?php
										}	
									?>
										
									<?php
										endforeach;
									?>
							</tbody>	
						</table>
					</div>	
				</div>
			</div>
		</div> 
	</body>
</html>