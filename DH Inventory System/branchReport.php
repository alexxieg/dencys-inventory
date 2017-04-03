<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Branch Reports</title>
		
		<!-- CSS Files -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
		
		<!-- Custom styles for this template -->
		<link href="css/test.css" rel="stylesheet">
		
		<!--Javascript Files -->
		<script src="returns.js"></script>
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
		<?php 
			/* For Camdas Query */
			$query = $conn->prepare("SELECT prodName, outQty FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Camdas';");
			$query->execute();
			$result = $query->fetchAll();
			
			/* For Hilltop Query */
			$query2 = $conn->prepare("SELECT prodName, outQty FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Hilltop';");
			$query2->execute();
			$result2 = $query2->fetchAll();
			
			/* For KM 4 Query */
			$query3 = $conn->prepare("SELECT prodName, outQty FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 4';");
			$query3->execute();
			$result3 = $query3->fetchAll();
			
			/* For KM 5 Query */
			$query4 = $conn->prepare("SELECT prodName, outQty FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 5';");
			$query4->execute();
			$result4 = $query4->fetchAll();
			
			/* For San Fernando Query */
			$query5 = $conn->prepare("SELECT prodName, outQty FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='San Fernando';");
			$query5->execute();
			$result5 = $query5->fetchAll();
			
			/* For Branch Overall Query */
			$query6 = $conn->prepare("SELECT SUM(outQty) AS 'TOTAL_QUANTITY', location 
										FROM outgoing JOIN branch ON outgoing.branchID = branch.branchID 
										GROUP BY location ORDER BY TOTAL_QUANTITY DESC;");
			$query6->execute();
			$result6 = $query6->fetchAll();
		?>
		<!-- PHP code for fetching the data-->
		<?php include('functionalities/fetchInventory.php'); ?>
	
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
						<li class="active"><a href="#" data-toggle="collapse" data-target="#report">Reports<span class="sr-only">(current)</span></a>
							<ul class="list collapse" id="report">
								<li><a href="branchReport.php">Branch Reports</a></li>
							</ul>
						</li>
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
							<ul>
						</li>
					</ul>
				</div>	
		 			
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">	
					<div id="contents">
						<div class="pages no-more-tables">							
							<div class="container">	
								<h2 style="margin-right:10%;">OUTGOING PRODUCTS PER BRANCH</h2>
								<ul class="nav nav-pills nav-justified">
									<li>
										<a href="mainOutSummary" data-toggle="tab" style="color:white;">
											<span>Outgoing</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryCamdas" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1" style="color:white;">
											<span>Camdas</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryHilltop" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2"style="color:white;">
											<span>Hilltop</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryKM4" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1"style="color:white;">
											<span>KM 4</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryKM5" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1"style="color:white;">
											<span>KM 5</span>
										</a>
									</li>
									<li>
										<a href="#outSummarySF" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1"style="color:white;">
											<span>San Fernando</span>
										</a>
									</li>
								</ul>

								<div class="tab-content clearfix">
									<!-- For Outgoing Query -->
									<div class="tab-pane active" id="mainOutSummary">
										<h3>Overall Outgoing Products Summary for the Month</h3>
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="80%" role="grid" aria-describedby="myTable_info" style="width: 80%; margin-left: 5%">
											<thead>
												<tr>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Location</th>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result6 as $item6):
												?>
												<tr>
													<td><?php echo $item6["location"]; ?></td>
													<td><?php echo $item6["TOTAL_QUANTITY"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
								
									<!-- For Camdas Query -->
									<div class="tab-pane" id="outSummaryCamdas">
										<h3>Outgoing Products in Camdas</h3>
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 80%; margin-left: 5%">
											<thead>
												<tr>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result as $item):
												?>
												<tr>
													<td><?php echo $item["prodName"]; ?></td>
													<td><?php echo $item["outQty"]; ?></td>
												</tr>
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
									
									<!-- For Hilltop Query -->
									 <div class="tab-pane" id="outSummaryHilltop">
										<h3>Outgoing Products in Hilltop</h3>
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 80%; margin-left: 5%">
											<thead>
												<tr>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result2 as $item2):
												?>
												<tr>
													<td><?php echo $item2["prodName"]; ?></td>
													<td><?php echo $item2["outQty"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									 </div>
									 
									 <!-- For KM 4 Query -->
									<div class="tab-pane" id="outSummaryKM4">
										<h3>Outgoing Products in KM4</h3>
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 80%; margin-left: 5%">
											<thead>
												<tr>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result3 as $item3):
												?>
												<tr>
													<td><?php echo $item3["prodName"]; ?></td>
													<td><?php echo $item3["outQty"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
									
									<!-- For KM 5 Query -->
									<div class="tab-pane" id="outSummaryKM5">
									<h3>Outgoing Products in KM5</h3>
									  <table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 80%; margin-left: 5%">
											<thead>
												<tr>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result4 as $item4):
												?>
												<tr>
													<td><?php echo $item4["prodName"]; ?></td>
													<td><?php echo $item4["outQty"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
									
									<!-- For San Fernando Query -->
									<div class="tab-pane" id="outSummarySF">
									<h3>Outgoing Products in San Fernando, La Union</h3>
									  <table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 80%; margin-left: 5%">
											<thead>
												<tr>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>

												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result5 as $item5):
												?>
												<tr>
													<td><?php echo $item5["prodName"]; ?></td>
													<td><?php echo $item5["outQty"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
					
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
									
	</body>
</html>
