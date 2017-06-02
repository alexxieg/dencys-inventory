<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Backup and Restore</title>
		
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
	</head>
  
	<body>
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
						<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
						<li class="active"><a href="backup.php"><i class="glyphicon glyphicon-refresh"></i> System Settings<span class="sr-only">(current)</span></a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->	
					
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<div id="contents">
						<div class="pages">
							<div id="tableHeader">
								<table class="table table-striped table-bordered">		
									<h1 id="headers">SYSTEM SETTINGS</h1>
									<table class="table">	
										<tr>
											<td>
												<a href = "functionalities/createBackup.php"><button class="btn btn-success" id="backUpButton">BACKUP SYSTEM</button></a>
												<button class="btn btn-success" id="backUpButton">RESTORE SYSTEM</button>
												<form action="functionalities/restoreBackup.php" method="post" enctype="multipart/form-data">
												    Select .sql file to restore
												    <input type="file" name="fileToUpload" id="fileToUpload">
												    <input type="submit" value="Select Restore File" name="submit">
												</form>
											</td>	
										</tr>
									</table>
								</table>
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

