<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Branch Reports</title>
		
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
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
	  
	<body>
		<!-- Retrieve Brand Data -->
		<?php
			$locationQuery = (isset($_GET['queBy']) ? $_GET['queBy'] : null); 
			if (!empty($locationQuery)) {
				$query = $conn->prepare("SELECT prodName, outQty, model, location FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID WHERE location='$locationQuery';");
			} else {
				$query = $conn->prepare("SELECT prodName, outQty, model, location FROM outgoing JOIN product ON outgoing.prodID = product.prodID JOIN branch ON branch.branchID = outgoing.branchID order by outQty desc;");
			}
			
			$query->execute();
			$result = $query->fetchAll();
		?>
	  
		<!-- Page Header and Navigation Bar -->
		<nav class="navbar navbar-inverse navbar-fixed-top" >
		<!-- Header -->
		<div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse" id="togBtn">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
		      </button>

		      <img src="logohead.png" id="logohead"/>

				<div class="dropdown">
				  <button class="dropbtn"><i class="glyphicon glyphicon-user"></i> Admin</button>
				  <div class="dropdown-content">
					<a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
					<a href="#"><button class="btn btn-success btn-md" onclick="myFunction()" id="printBtn">
					<i class="glyphicon glyphicon-print"></i> Print</button></a>
					</div>
				</div>

   			</div>
		    
		    <form action="?" method="post">
					<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
			</form>
		  </div><!-- /container -->
		</nav>

		<!-- Side bar -->
		<div class="row row-offcanvas row-offcanvas-left">
			<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="collapse navbar-collapse">
				<ul class="nav nav-pills nav-stacked affix">
		        <li><a href="inventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
		        <li><a href="incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
		        <li><a href="outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
		        <li><a href="returns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>
				<li><a href="reports.php"><i class="glyphicon glyphicon-sort"></i> Reports</a></li>
		   	
		        <li class="nav-header">  	
		        	<a href="#" data-toggle="collapse" data-target="#menu2">
		          		<i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-chevron-right"></i>
		          	</a>
		            <ul class="list-unstyled collapse" id="menu2">
		                <li><a href="accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a>
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
		    	</ul>
		 	 </div><!--/span-->	
		   </div>
		<!-- end of side  bar -->
		 </nav><!-- /Header -->
		 
		 <?php
			foreach ($result as $item):
			$useThisID = $item["prodName"];
		?>

		<?php
			endforeach;
		?>
	
		<div id="contents">
			<div class="pages">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">		
						<h1 id="headers">BRANCH REPORT</h1>
					</table>
				</div>
				
				<!-- Table Display for Brands-->
				<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div id="myTable_length" class="dataTables_length">
						<div id="myTable_filter" class="dataTables_filter">
							<button type="button" class="btn btn-default" value="?queBy=Camdas" onclick="location = this.value;">
								Camdas
							</button>
							<button type="button" class="btn btn-default" value="?queBy=Hilltop" onclick="location = this.value;">
								Hilltop
							</button>
							<button type="button" class="btn btn-default" value="?queBy=San Fernando" onclick="location = this.value;">
								San Fernando
							</button>
							<button type="button" class="btn btn-default" value="?queBy=KM 4" onclick="location = this.value;">
								KM 4
							</button>
							<button type="button" class="btn btn-default" value="?queBy=KM 5" onclick="location = this.value;">
								KM 5
							</button>
						</div>
					</div>
				</div>
			
				<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
					<thead>
						<tr>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">prodName</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">outQty</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">model</th>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">location</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($result as $item):
						?>

						<tr>
							<td><?php echo $item["prodName"]; ?></td>
							<td><?php echo $item["outQty"]; ?></td>
							<td><?php echo $item["model"]; ?></td>
							<td><?php echo $item["location"]; ?></td>
						</tr>
						
						<?php
							endforeach;
						?>
					</tbody>
				</table>	
				</div>
			</div>
		</div>
					
		
	</body>
</html>
