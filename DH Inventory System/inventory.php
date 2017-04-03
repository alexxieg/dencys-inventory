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
		<link href="css/test.css" rel="stylesheet">
			
		<!-- Javascript Files -->
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">
			
		<script src="datatables/media/js/jquery.dataTables.min.js"></script>
		<link href="datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
		<script src="maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
		<script src="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"></script>
		
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
	<?php include('functionalities/fetchInventory.php'); ?>
	
	
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
					<li><a href="Logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
    </nav>

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li class="active"><a href="inventory.php">Inventory<span class="sr-only">(current)</span></a></li>
					<li><a href="incoming.php">Incoming</a></li>
					<li><a href="outgoing.php">Outgoing</a></li>
					<li><a href="#" data-toggle="collapse" data-target="#returns">Returns</a>
						<ul class="list collapse" id="returns">
							<li><a href="returns.php">Return to Warehouse</a></li>
							<li><a href="returnSupplier.php">Return to Supplier</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav nav-sidebar">
					<li><a href="">Reports</a></li>
					<li><a href="branchReport.php">Branch Report</a></li>
				</ul>
				<ul class="nav nav-sidebar">
					<li><a href="#" data-toggle="collapse" data-target="#manage">Manage</a>
						<ul class="list collapse" id="manage">
							<li><a href="accounts.php">Accounts</a></li>
							<li><a href="branches.php">Branches</a></li>
							<li><a href="employees.php">Employees</a></li>
							<li><a href="product.php">Products</a></li>
							<li><a href="brands.php">Product Brands</a></li>
							<li><a href="category.php">Product Categories</a></li>
						</ul>
					</li>
				</ul>
			</div>
		

			<?php
				foreach ($result as $item):
					$currQty = $item["beginningQty"] + $item["inQty"] - $item["outQty"];
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
								<h1 id="headers">INVENTORY</h1>	
								<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modButt">
									Products for Reorder
								</button>
								<a href="history.php"><button type="button" class="btn btn-info btn-lg btnclr" id="modbutt">View Previous Inventory</button></a>
							</table>
						</div>
						
						<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<div id="myTable_length" class="dataTables_length">
								<div id="myTable_filter" class="dataTables_filter">
								</div>
							</div>
						</div>
						
						<!-- Table for Inventory Data-->
						<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
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
									<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product ID</div>
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
								<tr style='background-color: #ff9999' id="centerData">
									<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
									<td data-title="Description"><?php echo $item["prodName"]; ?></td>
									<td data-title="Beg. Quantity"><?php echo $item["beginningQty"]; ?></td>
									<td data-title="End. Quantity"></td>
									<td data-title="IN"><?php echo $item["inQty"]; ?></td>
									<td data-title="OUT"><?php echo $item["outQty"]; ?></td>
									<td data-title="Current Quantity"><?php echo $item["qty"] ?></td>
									<td data-title="Physical Count"><?php echo $item["physicalQty"]; ?></td>
									<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
									<td data-title="Unit"><?php echo $item["unitType"];?></td>
									<td data-title="Remarks"></td>
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
									<td data-title="End. Quantity"></td>
									<td data-title="IN"><?php echo $item["inQty"]; ?></td>
									<td data-title="OUT"><?php echo $item["outQty"]; ?></td>
									<td data-title="Current Quantity"><?php echo $item["qty"] ?></td>
									<td data-title="Physical Count"><?php echo $item["physicalQty"]; ?></td>
									<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
									<td data-title="Unit"><?php echo $item["unitType"];?></td>
									<td data-title="Remarks"></td>
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
											<th>Product ID</th>
											<th>Product Description</th>						
											<th>Current Quantity</th>
											<th>Reorder Level</th>
											<th>Unit</th>	
										</tr>
											
										<?php
											foreach ($result as $item):
										?>
											<tr>
											<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
											<td data-title="Description"><?php echo $item["prodName"]; ?></td>
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
											<th>Date</th>
											<th>In</th>
											<th>Out</th>
											<th>Balance</th>
										</tr>
										
										<tr>
											<td></td>
											<td></td>
											<td></td>									
											<td></td>
										</tr>
									</table>
								</div>
									
								<div class="modal-footer">	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
