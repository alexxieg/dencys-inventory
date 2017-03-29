<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Products</title>
<<<<<<< HEAD
		<?php include('dbcon.php'); ?>
			
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
			
		<!-- CSS Files -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<!-- Javascript Files -->
=======
		
		<!-- CSS Files -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		
		<!-- Javascript Files -->
		<script src="product.js"></script>
>>>>>>> b46924cb4bac82cf4f21e17c91f23463576cc20e
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
<<<<<<< HEAD
	  
<body class="fixed-sn mdb-skin bg-skin-lp">
	
		<?php include('functionalities/fetchProduct.php'); ?>

	<!-- Page Header and Navigation Bar -->
    <header>
        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar">
            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-effect" id="logobox">
                    <a href="#"><img src="logo.png" class="img-fluid flex-center"></a>
                </div>
            </li>
            <!--/. Logo -->
            <!--Search Form-->
            <li>
                <form class="search-form" role="search" action="?" method="post">
                    <div class="form-group waves-effect">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
            </li>
            <!--/.Search Form-->
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><a class="collapsible-header waves-effect" href="userinventory.php">
                    		<i class="fa fa-list"></i> Inventory
	                	</a>
                    </li>
                    <li><a class="collapsible-header waves-effect" href="userincoming.php">
	                    	<i class="fa fa-truck" aria-hidden="true"></i> Incoming
	                    </a>
                    </li>
                    <li><a class="collapsible-header waves-effect" href="useroutgoing.php">
	                    	<i class="fa fa-external-link" aria-hidden="true"></i> Outgoing
	                    </a>
                    </li>
                    <li><a class="collapsible-header waves-effect" href="userreturns.php">
                    		<i class="fa fa-undo" aria-hidden="true"></i> Returns
                    	</a>
                    </li>
                    <li><a class="collapsible-header waves-effect active" href="userproduct.php">
                    		<i class="fa fa-cubes" aria-hidden="true"></i> Products
                    	</a>
                    </li>
                </ul>
            </li>
            <!--/. Side navigation links -->
            <div class="sidenav-bg mask-strong"></div>
        </ul>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-xs-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>Dency's Hardware and General Merchandise</p>
            </div>
            <ul class="nav navbar-nav ml-auto flex-row">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    	<i class="fa fa-user-circle"></i> <span class="hidden-sm-down">User</span></a>
	                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
	                        <a class="dropdown-item" href="logout.php#">
	                        	<i class="fa fa-sign-out"></i> Logout
	                        </a>
	                        <a class="dropdown-item" href="#" onclick="myFunction()"> 
	                        	<i class="glyphicon glyphicon-print"></i> Print
	                        </a>
	                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->

=======
 
	<body>
		<!-- Retrieve Product Returns -->
		<?php include('functionalities/fetchProduct.php'); ?>

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
					<button class="dropbtn"><i class="glyphicon glyphicon-user"></i> User</button>
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
						<li><a href="userinventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
						<li><a href="userincoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
						<li><a href="useroutgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
						<li><a href="userreturns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>
						<li><a href="userproduct.php"><i class="glyphicon glyphicon-sort"></i>Products</a></li>
					</ul>
				</div><!--/span-->	
		   </div>
		<!-- end of side  bar -->
		 </div><!-- /Header -->
					
		<?php
			foreach ($result as $item):
			$proID = $item["prodID"];
		?>
					
		<?php
			endforeach;
		?>
					
>>>>>>> b46924cb4bac82cf4f21e17c91f23463576cc20e
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
<<<<<<< HEAD

		<!-- SCRIPTS -->
    <script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/compiled.min.js"></script>

    <script>
    $(".button-collapse").sideNav();
        
    var el = document.querySelector('.custom-scrollbar');
    Ps.initialize(el);
    </script>
		
  </body>
</html>

=======
		
		<!-- Add Product Functionality -->
		<?php include('functionalities/addProduct.php'); ?>
	</body>
</html>
>>>>>>> b46924cb4bac82cf4f21e17c91f23463576cc20e
