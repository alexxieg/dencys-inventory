<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Branch Reports</title>
		<?php include('dbcon.php'); ?>
				
		<?php 
			session_start();
			if (isset($_SESSION['id'])){
				$session_id = $_SESSION['id'];
				$session_query = $conn->query("select * from users where userName = '$session_id'");
				$user_row = $session_query->fetch();
				if (!isset($_SESSION['id']) || $_SESSION['id'] == false) {
					session_destroy();
					header('Location: index.php');
				}
			}
		?>
		
		<!-- CSS Files -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type ="text/css" href="css/responsive.css">
	</head>
	  
	<body>
		<?php 
			/* For Camdas Query */
			$query = $conn->prepare("SELECT prodName, outQty, model FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Camdas';");
			$query->execute();
			$result = $query->fetchAll();
			
			/* For Hilltop Query */
			$query2 = $conn->prepare("SELECT prodName, outQty, model FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Hilltop';");
			$query2->execute();
			$result2 = $query2->fetchAll();
			
			/* For KM 4 Query */
			$query3 = $conn->prepare("SELECT prodName, outQty, model FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 4';");
			$query3->execute();
			$result3 = $query3->fetchAll();
			
			/* For KM 5 Query */
			$query4 = $conn->prepare("SELECT prodName, outQty, model, FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 5';");
			$query4->execute();
			$result4 = $query4->fetchAll();
			
			/* For San Fernando Query */
			$query5 = $conn->prepare("SELECT prodName, outQty, model, FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='San Fernando';");
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
	
		<!-- Page Header and Navigation Bar -->
		<nav class="navbar navbar-inverse navbar-fixed-top" >
		<!-- Header -->
		  <div class="container-fluid" id="navFix">
		    <div class="navbar-header">
			<div id="dencysname"><h2>Dency's Hardware and General Merchandise</h2></div>
		      <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse" id="togBtn">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
		      </button>
				<div class="dropdown">
				  <button class="dropbtn"><i class="glyphicon glyphicon-user"></i> Admin</button>
				  <div class="dropdown-content">
					<a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
					<a href="#"><button class="btn btn-success btn-md" onclick="myFunction()" id="printBtn">
					<i class="glyphicon glyphicon-print"></i> Print</button></a>
					</div>
				</div>
   			</div>
		  </div><!-- /container -->
		</nav>

		<!-- Side bar -->
		<div class="row row-offcanvas row-offcanvas-left">
			<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="collapse navbar-collapse">	
				<ul class="nav nav-pills nav-stacked affix">
				      <div id="sidelogo"><img src="logo.png" alt=""/></div>
		        <li><a href="inventory.php" ><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
		        <li><a href="incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
		        <li><a href="outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
		        <li><a href="returns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>	
		        <li class="active"><a href="reports.php"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>					
		        <li class="nav-header">
		        	<a href="#" data-toggle="collapse" data-target="#menu2">
		          		<i class="glyphicon glyphicon-pencil"></i>Manage<i class="glyphicon glyphicon-chevron-down"></i>
		          	</a>
		            	<ul class="list-unstyled collapse affix" id="menu2">
		                <li><a href="accounts.php"><i class="glyphicon glyphicon-lock"></i>Accounts</a>
		                </li>
		                <li><a href="employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a>
		                </li>
		                <li><a href="product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a>
		                </li>
		                <li><a href="brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a>
		                </li>
		                <li><a href="category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a>
		                </li>
		                <li><a href="branches.php"><i class="glyphicon glyphicon-random"></i> Branches</a>
		                </li>
		                </ul>
		          </li>                              
		          </ul>
		 	 </div><!--/span-->	
		   </div>
		<!-- end of side  bar -->
	
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
					
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
									
	</body>
</html>
