<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Product Categories</title>
		
		<!-- CSS Files -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		
		<!-- Javascript Files -->
		<script src="category.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
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
			if (!isset($_SESSION['id']) || $role!="admin") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>
	</head>
  
	<body>
		<!-- Retrieve Category Data -->
		<?php
			$query = $conn->prepare("SELECT categoryID, categoryName FROM category WHERE status = 'Active' ");
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
		 </div><!-- /Header -->
			
		<?php
			foreach ($result as $item):
			$useThisID = $item["categoryID"];
		?>
				
		<?php
			endforeach;
		?>
			
		<div id="contents">
			<div class="pages">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">		
						<h1 id="headers">PRODUCT CATEGORIES</h1>
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">Add New Category</button>							
					</table>
				</div>
					
				<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div id="myTable_length" class="dataTables_length">
						<div id="myTable_filter" class="dataTables_filter">
						</div>
					</div>
				</div>
			
				<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
					<thead>
							<tr>
								<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Category ID</th>
								<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Category</th>
								<th></th>
							</tr>
					</thead>
					
					<tbody>
						<?php
							foreach ($result as $item):
							$useThisID = $item["categoryID"];
						?>
						<tr>
							<td><?php echo $item["categoryID"]; ?></td>
							<td><?php echo $item["categoryName"]; ?></td>
							<td>	
								<a>
									<button type="button" class="btn btn-default">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</button>
								</a>
								<a href="functionalities/removeCategory.php?useId=<?php echo $useThisID; ?>"> 
									<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this entry?');">
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
			
				<!-- Modal: Add Category Form -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add New Brand</h4>
							</div>
							<div class="modal-body">
									<form action="" method="POST" onsubmit="return validateForm()">		
									<h3>Brand ID</h3>
									<input type="text" class="form-control" id="addRcpt" placeholder="Category ID" name="categoryID"> <br>
									<h3>Brand Name</h3>
									<input type="text" class="form-control" id ="addRcpt" placeholder="Category" name="categoryName"> <br>
									<br>
									
									<div class="modFoot">
									<span>
										<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn">Cancel</button>
									</span>
									<span>
										<input type="submit" value="Submit" class="btn btn-success" name="addCategory" id="sucBtn">
									</span>
								</form> 
							</div>
							</div>
							
							<div class="modal-footer">
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Add New Category -->
		<?php include('functionalities/addCategory.php'); ?>
		
	</body>
</html>
