<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Branches</title>
		
		<!-- CSS Files -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<!-- Javascript Files -->
<<<<<<< HEAD
=======
		<script src="branches.js"></script>
>>>>>>> b46924cb4bac82cf4f21e17c91f23463576cc20e
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">
		
		<!-- Database Connection -->
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
  
<<<<<<< HEAD
<body class="fixed-sn mdb-skin bg-skin-lp">
		<!-- PHP code for fetching the data-->
		<?php include('functionalities/fetchInventory.php'); ?>
	
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
                    <li><a class="collapsible-header waves-effect" href="inventory.php">
                    		<i class="fa fa-list"></i> Inventory
	                	</a>
                    </li>
                    <li><a class="collapsible-header waves-effect" href="incoming.php">
	                    	<i class="fa fa-truck" aria-hidden="true"></i> Incoming
	                    </a>
                    </li>
                    <li><a class="collapsible-header waves-effect" href="outgoing.php">
	                    	<i class="fa fa-external-link" aria-hidden="true"></i> Outgoing
	                    </a>
                    </li>
                    <li><a class="collapsible-header waves-effect" href="returns.php">
                    		<i class="fa fa-undo" aria-hidden="true"></i> Returns
                    	</a>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r">
	                    	<i class="fa fa-pencil"></i>
	                    	 Manage
	                    	<i class="fa fa-angle-down rotate-icon"></i>
	                    </a>
                     <div class="collapsible-body">
                            <ul style="text-align:left">
                                <li><a href="accounts.php" class="waves-effect"><i class="fa fa-address-card-o"></i> Accounts</a>
                                </li>
                                <li><a href="employees.php" class="waves-effect"><i class="fa fa-users"></i> Employees</a>
                                </li>
                                <li><a href="product.php" class="waves-effect"><i class="fa fa-cubes"></i>Products</a>
                                </li>
                                <li><a href="brands.php" class="waves-effect"><i class="fa fa-sort-amount-asc"></i> Product Brands</a>
                                </li>
                                <li><a href="category.php" class="waves-effect"><i class="fa fa-book"></i> Product Categories</a>
                                </li>
                                <li><a href="branches.php" class="waves-effect active"><i class="fa fa-random"></i> Branches</a>
                                </li>
                            </ul>
                     </div>
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
                    	<i class="fa fa-user-circle"></i> <span class="hidden-sm-down">Admin</span></a>
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
		<!-- Retrieve Branch Data -->
		<?php
			$query = $conn->prepare("SELECT branchID, branchName, location FROM branch WHERE status = 'Active' ");
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
>>>>>>> b46924cb4bac82cf4f21e17c91f23463576cc20e
		 
		<?php
			foreach ($result as $item):
			$useThisID = $item["branchID"];
		?>
					
		<?php
			endforeach;
		?>			
		 
		<div id="contents">
			<div class="pages">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">		
						<h1 id="headers">BRANCHES</h1>
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
						<tr>
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
						<tr>
							<td><?php echo $item["branchID"]; ?></td>
							<td><?php echo $item["branchName"]; ?></td>
							<td><?php echo $item["location"]; ?></td>
							<td>	
								<a>
									<button type="button" class="btn btn-default">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</button>
								</a>							
								<a> 
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
				
								
				<!-- Modal for New Branch Form -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add New Branch</h4>
							</div>
							<div class="modal-body">
								<form action="" method="POST" onsubmit="return validateForm()">		
									<h3>Branch ID</h3>
									<input type="text" class="form-control" id="addBranchID" placeholder="Branch ID" name="branchID"> <br>
									<h3>Branch Name</h3>
									<input type="text" class="form-control" id ="addBranch" placeholder="Branch" name="branch"> <br>
									<br>
									<h3>Branch Location</h3>
									<input type="text" class="form-control" id="addLocation" placeholder="Location" name="location"> <br>
									
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
				
			</div>
		</div>
		
		<!-- Add New Branch -->
		<?php include('functionalities/addBranch.php'); ?>
		
		<!-- SCRIPTS -->
    <script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/compiled.min.js"></script>

    <script>
    $(".button-collapse").sideNav();
        
    var el = document.querySelector('.custom-scrollbar');
    Ps.initialize(el);
    </script>
		
	</body>
</html>

