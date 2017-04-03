<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Employees</title>
				
		<!-- CSS Files -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
		
		<!-- Custom styles for this template -->
		<link href="css/test.css" rel="stylesheet">
		
		<!--Javascript Files -->
		<script src="employees.js"></script>
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
		<!-- Retrieve Employee Data -->
		<?php
			$query = $conn->prepare("SELECT empID, empFirstName, empLastName, empMidName, empExtensionName FROM employee WHERE status = 'Active' ");
			$query->execute();
			$result = $query->fetchAll();
		?>

		<!-- Topbar Navigation / Main Header -->
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
				<!-- Sidebar -->
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<li><a href="inventory.php">Inventory</a></li>
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
						<li><a href="#" data-toggle="collapse" data-target="#report">Reports</a>
							<ul class="list collapse" id="report">
								<li><a href="branchReport.php">Branch Reports</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav nav-sidebar">
						<li class="active"><a href="#" data-toggle="collapse" data-target="#manage">Manage<span class="sr-only">(current)</span></a>
							<ul class="list collapse" id="manage">
								<li><a href="accounts.php">Accounts</a></li>
								<li><a href="branches.php">Branches</a></li>
								<li><a href="employees.php">Employees</a></li>
								<li><a href="product.php">Products</a></li>
								<li><a href="brands.php">Product Brands</a></li>
								<li><a href="category.php">Product Categories</a></li>
							<ul>
						</li>
					</ul>
				</div>
				<!-- End of sidebar -->
		 
				<?php
					foreach ($result as $item):
					$employID = $item["empID"];
				?>
							
				<?php
					endforeach;
				?>

				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<div id="contents">
						<div class="pages">
							<div id="tableHeader">
								<table class="table table-striped table-bordered">		
									<h1 id="headers">EMPLOYEES</h1>
									<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#archive" id="modbutt">View Archive</button>
									<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">Add New Employee</button>							
								</table>
							</div>
							
							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
							
							<!-- Table Display for Employees -->
							<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								<thead>
										<tr>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Employee ID</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">First Name</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Middle Name</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Last Name</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Extension Name</th>
											<th></th>
										</tr>
								</thead>
								<tbody>
										<?php
											foreach ($result as $item):
											$employID = $item["empID"];
											?>
											
										<tr>
											<td><?php echo $item["empID"]; ?></td>
											<td><?php echo $item["empFirstName"]; ?></td>
											<td><?php echo $item["empMidName"]; ?></td>
											<td><?php echo $item["empLastName"]; ?></td>
											<td><?php echo $item["empExtensionName"]; ?></td>
											<td>
												<a href="functionalities/editEmployees.php?emplId=<?php echo $employID; ?>" target="_blank">
												<button type="button" class="btn btn-default">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
												</button>
												</a>	
											
												<a href="functionalities/removeEmployee.php?emplId=<?php echo $employID; ?>"> 
													<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to remove this entry?');">
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
								
							<!-- Modal - Add Employee Form -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Add New Employee</h4>
										</div>
										<div class="modal-body">
											<form action="" method="POST" onsubmit="return validateForm()">									
												<h3>First Name</h3>
												<input type="text" class="form-control" id ="addEmpl" placeholder="Name" name="empFName"> <br>
												<br>
												
												<h3>Middle Name</h3>
												<input type="text" class="form-control" id ="addEmpl" placeholder="Name" name="empMName"> <br>
												<br>
																			
												<h3>Last Name</h3>
												<input type="text" class="form-control" id ="addEmpl" placeholder="Name" name="empLName"> <br>
												<br>
												
												<h3>Extension Name</h3>
												<input type="text" class="form-control" id ="addEmpl" placeholder="Name" name="empEName"> <br>
												<br>
												
												<div class="modFoot">
												<span>
													<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn"> Cancel</button>
												</span>
												<span>
													<input type="submit" value="Submit" class="btn btn-success" name="addEmp" id="sucBtn">
												</span>
											</div>
											</form> 
										</div>
										
										<div class="modal-footer">	
										</div>
									</div>
								</div>
							</div>
							
							<!-- Modal - Employee Archive -->
							<div class="modal fade" id="archive" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Archived Branches</h4>
										</div>
										<div class="modal-body">
											<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
											
												<!-- Retrieve Employee Data -->
												<?php
													$query = $conn->prepare("SELECT empID, empFirstName, empLastName, empMidName, empExtensionName FROM employee WHERE status = 'Inactive' ");
													$query->execute();
													$result1 = $query->fetchAll();
												?>
												
												<thead>
													<tr>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Employee ID</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">First Name</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Middle Name</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Last Name</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Extension Name</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
														
													<tr>
														<td><?php echo $item["empID"]; ?></td>
														<td><?php echo $item["empFirstName"]; ?></td>
														<td><?php echo $item["empMidName"]; ?></td>
														<td><?php echo $item["empLastName"]; ?></td>
														<td><?php echo $item["empExtensionName"]; ?></td>
														<td>										
															<a href="functionalities/restoreEmployee.php?emplId=<?php echo $employID; ?>"> 
																<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to remove this entry?');">
																	<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
																</button>
																</a>
														</td>		
													</tr>
													<?php
														foreach ($result1 as $item):
														$employID = $item["empID"];
														?>
													<tr>
														<td><?php echo $item["empID"]; ?></td>
														<td><?php echo $item["empFirstName"]; ?></td>
														<td><?php echo $item["empMidName"]; ?></td>
														<td><?php echo $item["empLastName"]; ?></td>
														<td><?php echo $item["empExtensionName"]; ?></td>
														<td>										
															<a href="functionalities/restoreEmployee.php?emplId=<?php echo $employID; ?>"> 
																<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to remove this entry?');">
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
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Add New Employee -->
		<?php include('functionalities/addEmployee.php'); ?>
		
	</body>
</html>

