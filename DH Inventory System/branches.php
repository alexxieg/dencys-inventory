<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Branches</title>
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/test.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		
		<!--Javascript Files -->
		<script src="branches.js"></script>
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
	</head>
  
	<body>
		<!-- Retrieve Branch Data -->
		<?php
			$query = $conn->prepare("SELECT branchID,branchName, location FROM branch WHERE status = 'Active' ");
			$query->execute();
			$result = $query->fetchAll();
		?>

		<!-- Topbar Navigation / Main Header -->
		<!--Top Navigation Bar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div id="font"><h2>DENCY'S HARDWARE AND GENERAL MERCHANDISE</h2></div>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><i class="glyphicon glyphicon-user"></i> Admin</a></li>
				</ul>
			</div>
		</div>
    </nav>

    <div class="container-fluid">
		<div class="row">
			<div id="navbar" class="col-sm-3 col-md-2 sidebar collapse">
				<ul class="nav nav-sidebar">

					<div id="sidebarLogo"><img src="logo.png" alt="" width="100px" height="100px"/></div>
					<li><a href="inventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
					<li><a href="incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
					<li><a href="outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
					<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-sort"></i> Returns <i class="glyphicon glyphicon-menu-right"></i></a>
						<ul class="list-unstyled collapse" id="returns">
							<li><a href="returns.php"><i class="glyphicon glyphicon-sort"></i>Warehouse Returns</a></li>
							<li><a href="returnSupplier.php"><i class="glyphicon glyphicon-sort"></i>Supplier Returns</a></li>
						</ul>
					</li>
					<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-right"></i></a>
						<ul class="list-unstyled collapse" id="reports">
							<li><a href="branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
						</ul>
					</li>
					<li class="active"><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-menu-right"></i></a><span class="sr-only">(current)</span>
						<ul class="list-unstyled collapse" id="manage">
							<li><a href="accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
							<li><a href="branches.php"><i class="glyphicon glyphicon-random"></i> Branches</a></li>
							<li><a href="employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
							<li><a href="product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
							<li><a href="brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
							<li><a href="category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
						</ul>
					</li>
					<li class="PrintBtn"><a href="print.php"><i class="glyphicon glyphicon-print"></i> Print</a></li>
					<li class="LogBtn"><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- End of Sidebar -->
				<!-- End of sidebar -->
		 
				<?php
					foreach ($result as $item):
					$useThisID = $item["branchID"];
				?>
							
				<?php
					endforeach;
				?>		
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<div id="contents">
						<div class="pages">
							<div id="tableHeader">
								<table class="table table-striped table-bordered">		
									<h1 id="headers">BRANCHES</h1>
									<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#archive" id="modbutt">View Archive</button>
									<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">Add New Branch</button>						
								</table>
							</div>
								
							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
							
							<!-- Table Display for Branches -->
							<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								<thead>
									<tr id="centerData">
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Branch ID</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Branch Name</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Location</th>
										<th></th>
									</tr>
								</thead>	
								
								<tbody>
									<?php
										foreach ($result as $item):
										$useThisID = $item["branchID"];
									?>
									<tr id="centerData">
										<td data-title="Brand ID"><?php echo $item["branchID"]; ?></td>
										<td data-title="Branch Name"><?php echo $item["branchName"]; ?></td>
										<td data-title="Location"><?php echo $item["location"]; ?></td>
										<td>	
											<a href="functionalities/editBranches.php?useID=<?php echo $useThisID; ?>" target="_blank">
												<button type="button" class="btn btn-default">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
												</button>
											</a>
											
											<a> 
												<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to remove this branch?');">
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
							
							<!-- Modal: Add Branch Form -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Add New Brand</h4>
										</div>
										<div class="modal-body">
											<form action="" method="POST" onsubmit="return validateForm()">		
												<h3>Branch ID</h3>
												<input type="text" class="form-control" id="addBranchID" placeholder="Branch ID" name="branchID"> <br>
												<h3>Branch Name</h3>
												<input type="text" class="form-control" id ="addBranch" placeholder="Branch" name="branch"> <br>
												<br>
												
												<div class="modFoot">
													<span>
														<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn"> Cancel</button>
													</span>
													<span>
														<input type="submit" value="Submit" class="btn btn-success" name="addBranch" id="sucBtn">
													</span>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							
							<!-- Modal - Branch Archive -->
							<div class="modal fade" id="archive" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Archived Branches</h4>
										</div>
										<div class="modal-body">
											<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
											
												<!-- Retrieve Branch Data -->
												<?php
													$query = $conn->prepare("SELECT branchID, branchName, location FROM branch WHERE status = 'Inactive' ");
													$query->execute();
													$result1 = $query->fetchAll();
												?>
												
												<thead>
													<tr id="centerData">
														<th>
															<div id="tabHead">Branch ID</div>
														</th>
														<th>
															<div id="tabHead">Branch Name</div>
														</th>
														<th>
															<div id="tabHead">Location</div>
														</th>
														<th></th>
													</tr>
												</thead>	
												
												<tbody>
													
													<tr id="centerData">
														<td data-title="Brand ID"><?php echo $item["branchID"]; ?></td>
														<td data-title="Brand Name"><?php echo $item["branchName"]; ?></td>
														<td data-title="Location"><?php echo $item["location"]; ?></td>
														<td>
															<a href="functionalities/restoreBranch.php?useId=<?php echo $useThisID; ?>"> 
																<button type="button" class="btn btn-default" id="edBtn" onclick="return confirm('Are you sure you want to restore this account?');">
																	Restore
																</button>
															</a>
														</td>	
													</tr>
													<?php
														foreach ($result1 as $item):
														$useThisID = $item["branchID"];
													?>	
													<tr id="centerData">
														<td data-title="Brand ID"><?php echo $item["branchID"]; ?></td>
														<td data-title="Brand Name"><?php echo $item["branchName"]; ?></td>
														<td data-title="Location"><?php echo $item["location"]; ?></td>
														<td>
															<a href="functionalities/restoreBranch.php?useId=<?php echo $useThisID; ?>"> 
																<button type="button" class="btn btn-default" id="edBtn" onclick="return confirm('Are you sure you want to restore this account?');">
																	Restore
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
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Add New Branch -->
		<?php include('functionalities/addBranch.php'); ?>
		
	</body>
</html>

