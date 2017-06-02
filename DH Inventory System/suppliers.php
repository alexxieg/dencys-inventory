<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Suppliers</title>

		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
		
		<!-- Login Session -->
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
		
		<!-- Datatables Script -->
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
					<a class="navbar-brand" href="inventory.php">DENCY'S HARDWARE AND GENERAL MERCHANDISE</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li id="adminhead"><a href="#">Admin |</a></li>
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
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="inventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="defectives.php"><i class="glyphicon glyphicon-list"></i> Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="prodDeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="prodIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="returnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="returnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="monthlyIncoming.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="monthlyOutgoing.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="manage">
								<li><a href="accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
								<li><a href="branches.php"><i class="glyphicon glyphicon-home"></i> Branches</a></li>
								<li><a href="employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
								<li><a href="suppliers.php"><i class="glyphicon glyphicon-user"></i> Suppliers</a></li>
								<li><a href="product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
								<li><a href="brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
								<li><a href="category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
							</ul>
						</li>
						<li><a href="backup.php"><i class="glyphicon glyphicon-cog"></i> System Settings</a></li>
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
												<br>
												<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#archive" id="modbutt">View Archive</button>
												<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#blacklist" id="modbutt">View Blacklist</button>
												<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#myModal" id="modbutt">Add New Supplier</button>							
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
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											foreach ($result as $item):
											$supID = $item["supID"];
										?>
											
										<tr id="centerData">
											<td data-title="Supplier ID"><?php echo $item["supID"]; ?></td>
											<td data-title="Supplier Name"><?php echo $item["supplier_name"]; ?></td>
											<td data-title="Contact Number"><?php echo $item["contactNo"]; ?></td>
											<td data-title="Contact Number"><?php echo $item["location"]; ?></td>
											<td>
												<a href="functionalities/editSupplier.php?supID=<?php echo $supID; ?>" target="_self">
													<button type="button" class="btn btn-default" id="edBtn">
														<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
													</button>
												</a>	
												
												<a href="functionalities/removeSupplier.php?supID=<?php echo $supID; ?>"> 
													<button type="button" class="btn btn-default" id="edBtn" onclick="return confirm('Are you sure you want to archive this supplier?');">
														<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
													</button>
												</a>
												
												<a href="functionalities/addBlacklist.php?supID=<?php echo $supID; ?>"> 
													<button type="button" class="btn btn-default" id="edBtn" onclick="return confirm('Are you sure you want to blacklist this supplier?');">
														<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
													</button>
												</a>								
											</td>		
										</tr>
												
										<?php
											endforeach;
										?>
									</tbody>	
								</table>
									
								<!-- Modal - Add Supplier Form -->
								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Add New Supplier</h4>
											</div>
											<div class="modal-body">
												<form action="" method="POST" onsubmit="return validateForm()">									
													<h3>Supplier Name</h3>
													<input type="text" class="form-control" id="supName" placeholder="Supplier Name" name="supName">

													<h3>Contact Number</h3>
													<input type="text" class="form-control" id="supContact" placeholder="Contact Number" name="supContact">
													
													<h3>Location</h3>
													<input type="text" class="form-control" id="supLoc" placeholder="Location" name="supLoc">
													
													<div class="modFoot">
														<span>
															<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn"> Cancel</button>
														</span>
														<span>
															<input type="submit" value="Submit" class="btn btn-success" name="addSup" id="sucBtn">
														</span>
													</div>
												</form> 
											</div>
											
											<div class="modal-footer">	
											</div>
										</div>
									</div>
								</div>
								
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
														$query = $conn->prepare("SELECT supID, supplier_name, archiveDate FROM suppliers WHERE status = 'Inactive'");
														$query->execute();
														$result1 = $query->fetchAll();
													?>
													
													<thead>
														<tr id="centerData">
															<th>
																<div id="tabHead">Date Archived</div>
															</th>
															<th>
																<div id="tabHead">Supplier Name</div>
															</th>
															<th>
																<div id="tabHead">Restore Supplier</div>
															</th>
														</tr>
													</thead>
													<tbody>
															
														<?php
															foreach ($result1 as $item):
															$supID = $item["supID"];													
														?>
														
														<tr id="centerData">
															<td data-title="Date Archived"><?php echo $item["archiveDate"]; ?></td>
															<td data-title="First Name"><?php echo $item["supplier_name"]; ?></td>
															<td>										
																<a href="functionalities/restoreSupplier.php?supID=<?php echo $supID; ?>"> 
																	<button type="button" class="btn btn-default" id="edBtn" onclick="return confirm('Are you sure you want to restore this supplier?');">
																		<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
																	</button>
																</a>
															</td>		
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
														$query = $conn->prepare("SELECT supID, supplier_name, archiveDate FROM suppliers WHERE status = 'Blacklisted'");
														$query->execute();
														$result1 = $query->fetchAll();
													?>
													
													<thead>
														<tr id="centerData">
															<th>
																<div id="tabHead">Date Blacklisted</div>
															</th>
															<th>
																<div id="tabHead">Supplier Name</div>
															</th>
															<th>
																<div id="tabHead">Unlist Supplier</div>
															</th>
														</tr>
													</thead>
													<tbody>
															
														<?php
															foreach ($result1 as $item):
															$supID = $item["supID"];													
														?>
														
														<tr id="centerData">
															<td data-title="Date Blacklisted"><?php echo $item["archiveDate"]; ?></td>
															<td data-title="First Name"><?php echo $item["supplier_name"]; ?></td>
															<td>										
																<a href="functionalities/restoreSupplier.php?supID=<?php echo $supID; ?>"> 
																	<button type="button" class="btn btn-default" id="edBtn" onclick="return confirm('Are you sure you want to remove this supplier from the blacklist?');">
																		<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
																	</button>
																</a>
															</td>		
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
		
		<!-- Add New Supplier -->
		<?php include('functionalities/addSupplier.php'); ?>
		
	</body>
</html>

