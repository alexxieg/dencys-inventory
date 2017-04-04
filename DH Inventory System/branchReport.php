<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Branch Reports</title>
		
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
		<script src="returns.js"></script>
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
				<div id="font"><h2>DENCY'S HARDWARE AND GENERAL MERCHANDISE</h2></div>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><i class="glyphicon glyphicon-user"></i> Admin</a></li>
				</ul>
			</div>
		</div>
    </nav>

    <div class="container-fluid" >
		<div class="row">
			<div id="navbar" class="col-sm-3 col-md-2 sidebar collapse">
				<ul class="nav nav-sidebar">
					<div id="sidebarLogo"><img src="logo.png" alt="" width="100px" height="100px"/></div>
					<li>
						<a href="inventory.php">
							<i class="glyphicon glyphicon-list-alt"></i> Inventory
						</a>
					</li>
					<li><a href="incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
					<li><a href="outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
					<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-sort"></i> Returns <i class="glyphicon glyphicon-menu-right"></i></a>
						<ul class="list-unstyled collapse" id="returns">
							<li><a href="returns.php"><i class="glyphicon glyphicon-sort"></i>Warehouse Returns</a></li>
							<li><a href="returnSupplier.php"><i class="glyphicon glyphicon-sort"></i>Supplier Returns</a></li>
						</ul>
					</li>
					<li class="active"><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports<span class="sr-only">(current)</span> <i class="glyphicon glyphicon-menu-right"></i></a>
						<ul class="list-unstyled collapse" id="reports">
							<li><a href="branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
						</ul>
					</li>
					<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-menu-right"></i></a>
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
		 			
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">	
					<div id="contents">
						<div class="pages no-more-tables">							
							<div class="container">	
								<h2 id="headrep">OUTGOING PRODUCTS PER BRANCH</h2>
								<ul class="nav nav-pills" id="navjust">
									<li>
										<a href="#mainOutSummary" data-toggle="tab">
											<span>Outgoing</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryCamdas" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>Camdas</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryHilltop" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">
											<span>Hilltop</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryKM4" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>KM 4</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryKM5" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>KM 5</span>
										</a>
									</li>
									<li>
										<a href="#outSummarySF" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>San Fernando</span>
										</a>
									</li>
								</ul>

								<div class="tab-content clearfix">
									<!-- For Outgoing Query -->
									<div class="tab-pane active" id="mainOutSummary">
										<h3>Overall Outgoing Products Summary for the Month:</h3>
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="80%" role="grid" aria-describedby="myTable_info">
											<thead>
												<tr id="centerData">
													<th>Location</th>
													<th>Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result6 as $item6):
												?>
												<tr id="centerData">
													<td data-title="Location"><?php echo $item6["location"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item6["TOTAL_QUANTITY"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
								
									<!-- For Camdas Query -->
									<div class="tab-pane" id="outSummaryCamdas">
										<h3>Outgoing Products in Camdas:</h3>
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
											<thead>
												<tr id="centerData">
													<th>Product Description</th>
													<th>Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result as $item):
												?>
												<tr id="centerData">
													<td data-title="Product Description"><?php echo $item["prodName"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item["outQty"]; ?></td>
												</tr>
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
									
									<!-- For Hilltop Query -->
									 <div class="tab-pane" id="outSummaryHilltop">
										<h3>Outgoing Products in Hilltop:</h3>
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
											<thead>
												<tr id="centerData">
													<th>Product Description</th>
													<th>Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result2 as $item2):
												?>
												<tr id="centerData">
													<td data-title="Product Description"><?php echo $item2["prodName"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item2["outQty"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									 </div>
									 
									 <!-- For KM 4 Query -->
									<div class="tab-pane" id="outSummaryKM4">
										<h3>Outgoing Products in KM4:</h3>
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
											<thead>
												<tr id="centerData">
													<th>Product Description</th>
													<th>Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result3 as $item3):
												?>
												<tr id="centerData">
													<td data-title="Product Description"><?php echo $item3["prodName"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item3["outQty"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
									
									<!-- For KM 5 Query -->
									<div class="tab-pane" id="outSummaryKM5">
									<h3>Outgoing Products in KM5:</h3>
									  <table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
											<thead>
												<tr id="centerData">
													<th>Product Description</th>
													<th>Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result4 as $item4):
												?>
												<tr id="centerData">
													<td data-title="Product Description"><?php echo $item4["prodName"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item4["outQty"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
									
									<!-- For San Fernando Query -->
									<div class="tab-pane" id="outSummarySF">
									<h3>Outgoing Products in San Fernando, La Union:</h3>
									  <table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
											<thead>
												<tr id="centerData">
													<th>Product Description</th>
													<th>Total Quantity</th>

												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result5 as $item5):
												?>
												<tr id="centerData">
													<td data-title="Product Description"><?php echo $item5["prodName"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item5["outQty"]; ?></td>
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
