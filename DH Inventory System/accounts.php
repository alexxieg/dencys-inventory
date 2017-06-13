<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Accounts</title>
		
		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
		
		<!-- Login Session -->
		<?php 
			session_start();
			$role = $_SESSION['sess_role'];
			$user = $_SESSION['id'];
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

		<!--Javascript Files -->
		<script src="js/accounts.js"></script>
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
		<script src="datatables/FixedHeader/js/dataTables.fixedHeader.min.js"></script>
		<link href="datatables/media/css/dataTables.bootstrap.min.css"rel="stylesheet">
		<link href="datatables/media/css/bootstrap.min.css"rel="stylesheet">
		<link href="datatables/FixedHeader/css/fixedHeader.bootstrap.min.css"rel="stylesheet">
		<link href="datatables/FixedHeader/css/fixedHeader.dataTables.min.css"rel="stylesheet">

		<!-- Datatables Script -->
		<script>
			$(document).ready(function() {
               var table = $('#myTable').DataTable( {
					fixedHeader: {
						header: true,
						headerOffset: 50
					},
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
		<!-- Retrieve Account Data -->
		<?php
			$query = $conn->prepare("SELECT userID, userName, password, user_role FROM users WHERE status = 'Active' AND userName != '$user' ");
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
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
						<li  class="active"><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
					$useThisID = $item["userID"];
				?>
													
				<?php
					endforeach;
				?>
					
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<div id="contents">
						<div class="pages">
							<div id="tableHeader">
								<table class="table table-striped table-bordered">		
									<h1 id="headers">ACCOUNTS</h1>
									<table class="table">	
										<tr>
											<td>
												<br>
												<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#archive" id="modbutt">View Archive</button>
												<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#myModal" id="modbutt">Add Account</button>
												<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#activityLog" id="modbutt">Edit Log</button>
											</td>
										</tr>
									</table>
								</table>
							</div>
								
							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
							
							<!-- Table Display for Accounts -->
							<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								<thead>
									<tr id="centerData">
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Username</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Password</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">User Role</th>
										<th>Action</th>
									</tr>
								</thead>
								
								<tbody>						
									<?php
										$counter = 0;
										foreach ($result as $item):
										$useThisID = $item["userID"];
										$useThisPass = substr($item["password"], 0, 6);
										$counter = $counter + 1;
									?>
										
									<tr id="centerData">
										<td data-title="Username"><?php echo $item["userName"]; ?></td>
										<td data-title="Password">
											<input name="viewPass" type="password" value="<?php echo $useThisPass; ?>" disabled/>
										</td>
										<td data-title="User Role"><?php echo $item["user_role"]; ?></td>
										<td>
											<a href="functionalities/editAccounts.php?useID=<?php echo $useThisID; ?>">
												<button type="button" class="btn btn-default">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
												</button>
											</a>
											<a href="functionalities/removeAccount.php?useId=<?php echo $useThisID; ?>"> 
												<button type="button" class="btn btn-default" id="<?php echo "sucBttn$counter"; ?>" name="xdd" onclick="return validateRemove(this.id);">
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
					
							<!-- Modal for New Account Form -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Add Account</h4>
										</div>
										<div class="modal-body">
											<form action="" method="POST" onsubmit="return validateForm()">
												<h3>Username (max. of 25 characters)</h3>
												<input type="text" class="form-control" id ="adduser" placeholder="Name" name="userName" maxlength="25">
												
												<h3>Password</h3>
												<input type="password" class="form-control" id ="addpass" placeholder="User Password" name="psw" maxlength="25">
											
												<h3>Confirm Password</h3>
												<input type="password" class="form-control" id ="addpassconf" placeholder="Confirm Password" name="confpsw" maxlength="25">
												
												<div class="form-group">
													<h3>User Role</h3>
													<select class="form-control" id="addEntry" name="user_role">
														<option>admin</option>
														<option>user</option>
													 </select>
												</div>
												
												<div class="modFoot">
													<span>
														<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn"> Cancel</button>
													</span>
													<span>
														<input type="submit" value="Submit" class="btn btn-success" name="addAccnt" id="sucBtn">
													</span>
												</div>
																						
												<div class="modal-footer">
												</div>	
											</form> 
										</div>
									</div>
								</div>
							</div>
							
							<!-- Modal - Account Archive -->
							<div class="modal fade" id="archive" role="dialog">
								<div class="modal-dialog modal-xl">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Archived Accounts</h4>
										</div>
										<div class="modal-body">
											<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
											
												<!-- Retrieve Category Data -->
												<?php
													$query = $conn->prepare("SELECT userID, userName, password, user_role, status FROM users WHERE status = 'Inactive'");
													$query->execute();
													$result1 = $query->fetchAll();
												?>
												
												<thead>
													<tr id="centerData">
														<th>
															<div id="tabHead">Username</div>
														</th>
														<th>
															<div id="tabHead">User Role</div>
														</th>
														<th>
															<div id="tabHead">Status</div>
														</th>
														<th>
															<div id="tabHead">Restore Option</div>
														</th>
													</tr>
												</thead>
												
												<tbody>						
														
													<?php
														foreach ($result1 as $item):
														$useThisID = $item["userID"];
													?>
													<tr id="centerData">	
														<td data-title="Username"><?php echo $item["userName"]; ?></td>
														<td data-title="User Role"><?php echo $item["user_role"]; ?></td>
														<td data-title="Status"><?php echo $item["status"]; ?></td>
														<td>
															<a href="functionalities/restoreAccount.php?useId=<?php echo $useThisID; ?>"> 
																<button type="button" class="btn btn-default" id="sucBtttn" onclick="return validateRestore();">
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
							
								<!-- Modal - Activity Log -->
							<div class="modal fade" id="activityLog" role="dialog">
								<div class="modal-dialog modal-xl">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Edit Activity Log</h4>
										</div>
										<div class="modal-body">
											<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
											
												<!-- Retrieve Category Data -->
												<?php
													$query = $conn->prepare("SELECT userEditDate, userID, userName, password, user_role, status FROM edituser");
													$query->execute();
													$result1 = $query->fetchAll();
												?>
												
												<thead>
													<tr id="centerData">
														<th>
															<div id="tabHead">Date Edited</div>
														</th>
														<th>
															<div id="tabHead">Username</div>
														</th>
														<th>
															<div id="tabHead">Password</div>
														</th>
														<th>
															<div id="tabHead">User Role</div>
														</th>
														<th>
															<div id="tabHead">Status</div>
														</th>
													</tr>
												</thead>
												
												<tbody>						
														
													<?php
														foreach ($result1 as $item):
														$useThisID = $item["userID"];
													?>
													<tr id="centerData">
														<td data-title="User Edit Date"><?php echo $item["userEditDate"]; ?></td>	
														<td data-title="Username"><?php echo $item["userName"]; ?></td>
														<td data-title="Password"><?php echo str_repeat('*', strlen( $item["password"])); ?></td>
														<td data-title="User Role"><?php echo $item["user_role"]; ?></td>
														<td data-title="Status"><?php echo $item["status"]; ?></td>														
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
							
						</div>
					</div>
				</div>
			</div>
		</div>	
		
		<!-- Add Account Functionality -->
		<?php include('functionalities/addAccount.php'); ?>
	</body>
</html>

