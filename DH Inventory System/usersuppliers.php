<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Suppliers</title>
				
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">

		<!-- Custom styles for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="js/supplier.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-3.2.0.min.js"></script>	
		<script src="js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">
		
		<!-- Datatables CSS and JS Files -->
		<script src="datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="datatables/media/js/dataTables.bootstrap.min.js"></script>
		<script src="datatables/Buttons/js/dataTables.buttons.min.js"></script>
		<script src="datatables/Buttons/js/buttons.bootstrap.min.js"></script>
		<script src="datatables/media/js/buttons.html5.min.js"></script>
		<script src="datatables/Buttons/js/buttons.print.min.js"></script>
		<script src="datatables/Buttons/js/buttons.colVis.min.js"></script>

		<link href="datatables/media/css/dataTables.bootstrap.min.css"rel="stylesheet">
		<link href="datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
		<link href="datatables/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet">		

        <link href="datatables/Buttons/css/buttons.dataTables.min.css"rel="stylesheet">
        <script src="datatables/Buttons/js/buttons.print.min.js"></script>
		<script src="datatables/Buttons/js/buttons.colVis.min.js"></script>
		
		<!-- Datatables -->
		<script>
			$(document).ready(function() {
				$('#myTable').DataTable( {
					dom: 'Bfrtip',
					lengthMenu: [
						[ 10, 25, 50, 100, -1 ],
						[ '10 rows', '25 rows', '50 rows', '100 rows','Show all' ]
					],
					buttons: [
						'pageLength'
					]
				} );
			} );		
		</script>
		
		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
		
		<!-- Login Session -->
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
		<!-- Retrieve Employee Data -->
		<?php
			$query = $conn->prepare("SELECT supID, supplier_name, contactNo, location FROM suppliers WHERE status = 'Active'");
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
					<a class="navbar-brand" href="userinventory.php">DENCY'S HARDWARE AND GENERAL MERCHANDISE</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li id="adminhead"><a href="#">User |</a></li>
						<li><a href="Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End of Top Main Header -->

		<div class="container-fluid">
			<div class="row navbar-collapse">
				<div id="sidebarCol" class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory </span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="functionalities/userAddDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="userPurchaseOrders.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="userProdIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="userReturnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="userreturnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="userbranchreport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="usermonthlyin.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="usermonthlyout.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li class="active"><a href="usersuppliers.php"><i class="glyphicon glyphicon-user"></i> Suppliers<span class="sr-only">(current)</span></a></li>
						<li><a href="userproduct.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->
		
				<?php
					foreach ($result as $item):
					$supID = $item["supID"];
				?>
							
				<?php
					endforeach;
				?>

				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<div id="contents">
						<div class="pages">
							<div id="tableHeader">
								<table class="table table-striped table-bordered">		
									<h1 id="headers">SUPPLIERS</h1>
									<table class="table">	
										<tr>
											<td>
												<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#archive" id="modbutt">View Archive</button>
												<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#blacklist" id="modbutt">View Blacklist</button>						
											</td>
										</tr>
									</table>
								</table>
							</div>
							
							<div class="pages no-more-tables">
							<!-- Table Display for Suppliers -->
								<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
									<div id="myTable_length" class="dataTables_length">
										<div id="myTable_filter" class="dataTables_filter">
										</div>
									</div>
								</div>
							
								<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
									<thead>
										<tr>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Supplier ID</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Supplier</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Contact Number</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Location</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach ($result as $item):
											$supID = $item["supID"];
										?>
										
										<tr id="centerData">
											<td data-title="Supplier ID"><?php echo $item["supID"]; ?></td>
											<td data-title="First Name"><?php echo $item["supplier_name"]; ?></td>
											<td data-title="Contact Number"><?php echo $item["contactNo"]; ?></td>
											<td data-title="Contact Number"><?php echo $item["location"]; ?></td>
										</tr>
											
										<?php
											endforeach;
										?>
									</tbody>	
								</table>
														
								<!-- Modal - Supplier Archive -->
								<div class="modal fade" id="archive" role="dialog">
									<div class="modal-dialog modal-xl">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Archived Suppliers</h4>
											</div>
											<div class="modal-body">
												<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
												
													<!-- Retrieve Supplier Data -->
													<?php
														$query = $conn->prepare("SELECT supID, supplier_name FROM suppliers WHERE status = 'Inactive'");
														$query->execute();
														$result1 = $query->fetchAll();
													?>
													
													<thead>
														<tr id="centerData">
															<th>
																<div id="tabHead">Supplier ID</div>
															</th>
															<th>
																<div id="tabHead">Supplier Name</div>
															</th>
														</tr>
													</thead>
													<tbody>
															
														<?php
															foreach ($result1 as $item):
															$supID = $item["supID"];													
														?>
														
														<tr id="centerData">
															<td data-title="Supplier ID"><?php echo $item["supID"]; ?></td>
															<td data-title="Supplier Name"><?php echo $item["supplier_name"]; ?></td>	
														</tr>	
														<?php
															endforeach;
														?>
													</tbody>	
												</table>
											</div>
										</div>
											
										<div class="modal-footer">
										</div>
											
									</div>
								</div>
								<!-- End of Modal -->
							
								<!-- Modal - Blacklist -->
								<div class="modal fade" id="blacklist" role="dialog">
									<div class="modal-dialog modal-xl">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Blacklisted Suppliers</h4>
											</div>
											<div class="modal-body">
												<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
												
													<!-- Retrieve Supplier Data -->
													<?php
														$query = $conn->prepare("SELECT supID, supplier_name FROM suppliers WHERE status = 'Blacklisted'");
														$query->execute();
														$result1 = $query->fetchAll();
													?>
													
													<thead>
														<tr id="centerData">
															<th>
																<div id="tabHead">Supplier ID</div>
															</th>
															<th>
																<div id="tabHead">Supplier Name</div>
															</th>
														</tr>
													</thead>
													<tbody>
															
														<?php
															foreach ($result1 as $item):
															$supID = $item["supID"];													
														?>
														
														<tr id="centerData">
															<td data-title="Supplier ID"><?php echo $item["supID"]; ?></td>
															<td data-title="Supplier Name"><?php echo $item["supplier_name"]; ?></td>		
														</tr>	
														<?php
															endforeach;
														?>
													</tbody>	
												</table>
											</div>
										</div>
											
										<div class="modal-footer">
										</div>
											
									</div>
								</div>
								<!-- End of Modal -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>

