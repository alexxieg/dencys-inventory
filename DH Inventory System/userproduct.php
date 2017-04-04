<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Products</title>
			
		<!-- CSS Files -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		
		<!-- Javascript Files -->
		<script src="product.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">

		<script src="datatables/js/jquery.dataTables.min.js"></script>
		<link href="datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
			if (!isset($_SESSION['id']) || $role!="user") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>
	</head>
 
	<body>
		<!-- Retrieve Product Data -->
		<?php include('functionalities/fetchProduct.php'); ?>

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
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><i class="glyphicon glyphicon-user"></i> User</a></li>
					</ul>
				</div>
			</div>
	    </nav>

	    <div class="container-fluid" >
			<div class="row">
				<div id="navbar" class="col-sm-3 col-md-2 sidebar collapse">
					<ul class="nav nav-sidebar">
							<img src="logo.png" alt="" width="100px" height="100px" id="sidebarLogo"/>
						<li><a href="inventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
						<li class="active"><a href="incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming<span class="sr-only">(current)</span></a></li>
						<li><a href="outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-sort"></i> Returns <i class="glyphicon glyphicon-menu-right"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="returns.php"><i class="glyphicon glyphicon-sort"></i>Warehouse Returns</a></li>
								<li><a href="returnSupplier.php"><i class="glyphicon glyphicon-sort"></i>Supplier Returns</a></li>
							</ul>
						</li>
						<li class="PrintBtn"><a href="print.php"><i class="glyphicon glyphicon-print"></i> Print</a></li>
						<li class="LogBtn"><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End of Sidebar -->
					
		<?php
			foreach ($result as $item):
			$proID = $item["prodID"];
		?>
					
		<?php
			endforeach;
		?>
					
		<div id="contents">
			<div class="pages no-more-tables">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">	
						<h1 id="headers">PRODUCTS</h1>
					</table>
				</div>

			<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
				<div id="myTable_length" class="dataTables_length">
					<div id="myTable_filter" class="dataTables_filter">
					</div>
				</div>
			</div>
			
			<!-- Table Display for Products -->
			<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
				<thead>
					<tr>
						<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
							<div id="tabHead">Product ID</div>
						</th>
						<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
							<div id="tabHead">Product Description</div>							
						</th>
						<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
							Model
						</th>
						<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
							<div id="tabHead">Brand</div>
						</th>
						<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
							<div id="tabHead">Category</div>
						</th>
						<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
							Unit
						</th>
						<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
							<div id="tabHead">Price</div>
						</th>					
					</tr>
				</thead>
				<tbody>

					<?php
						foreach ($result as $item):
						$proID = $item["prodID"];
					?>
					<tr>
						<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
						<td data-title="Description"><?php echo $item["prodName"]; ?></td>
						<td data-title="Model"><?php echo $item["model"];?></td>
						<td data-title="Brand"><?php echo $item["brandName"]; ?></td>
						<td data-title="Category"><?php echo $item["categoryName"]; ?></td>
						<td data-title="Unit"><?php echo $item["unitType"];?></td>
						<td data-title="Price"><?php echo $item["price"]; ?></td>				
					</tr>	
					<?php
						endforeach;
					?>
				</tbody>	
			</table>
										
			</div>
		</div>		
		
		<!-- Add New Product -->
		<?php include('functionalities/addProduct.php'); ?>
	</body>
</html>