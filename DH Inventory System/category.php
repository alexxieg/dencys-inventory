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
		<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<!-- Javascript Files -->
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<!-- Database Connection -->
		<link rel="stylesheet" type ="text/css" href="css/bootstrap.css">
		<link href="datatables/css/jquery.dataTables.min.css" rel="stylesheet">		
		<script src="category.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="datatables/js/jquery.dataTables.min.js"></script>
		<script src="maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
		<script src="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"></script>
		
			<script>
				$(document).ready(function(){
					$('#myTable').dataTable();
				});
			</script>
		
		<?php include('dbcon.php'); ?>
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
                                <li><a href="category.php" class="waves-effect active"><i class="fa fa-book"></i> Product Categories</a>
                                </li>
                                <li><a href="branches.php" class="waves-effect"><i class="fa fa-random"></i> Branches</a>
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
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#archive" id="modbutt">View Archive</button>
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">Add New Category</button>						
					</table>
				</div>
					
				<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"></div>		
				<div id="myTable_length" class="dataTables_length"></div>		
				<div id="myTable_filter" class="dataTables_filter"></div>
				
				<!-- Table Display for Categories -->
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
									<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to remove this category?');">
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
				
				<!-- Modal - New Category Form -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add New Category</h4>
							</div>
							<div class="modal-body">
								<form action="" method="POST" onsubmit="return validateForm()">		
									<h3>Category ID</h3>
									<input type="text" class="form-control" id="addRcpt" placeholder="Category ID" name="categoryID"> <br>
									<h3>Category</h3>
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
				
				<!-- Modal - Archived Categories -->
				<div class="modal fade" id="archive" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Archived Categories</h4>
							</div>
							<div class="modal-body">
								<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								
									<!-- Retrieve Category Data -->
									<?php
										$query = $conn->prepare("SELECT categoryID, categoryName FROM category WHERE status = 'Inactive'");
										$query->execute();
										$result1 = $query->fetchAll();
									?>
									
									<thead>
										<tr>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Category ID</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Category</th>
											<th></th>
										</tr>
									</thead>
									
									<tbody>							
										<?php
											foreach ($result1 as $item):
											$useThisID = $item["categoryID"];
										?>
										<tr>
											<td><?php echo $item["categoryID"]; ?></td>
											<td><?php echo $item["categoryName"]; ?></td>
											<td>
												<a href="functionalities/restoreCategory.php?useId=<?php echo $useThisID; ?>"> 
													<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to restore this entry?');">
														Restore
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
		
		<!-- SCRIPTS -->
    <script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/compiled.min.js"></script>

    <script>
    $(".button-collapse").sideNav();
        
    var el = document.querySelector('.custom-scrollbar');
    Ps.initialize(el);
    </script>
		
		<?php include('functionalities/addCategory.php'); ?>
	</body>
</html>