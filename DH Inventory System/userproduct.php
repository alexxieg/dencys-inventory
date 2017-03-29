<!DOCTYPE html>

<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Products</title>
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
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	  
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

		<div id="contents">
			<div class="pages no-more-tables">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">	
						<h1 id="headers">PRODUCTS</h1>
					</table>
				</div>

				<div class="prodTable">
					<table class="table table-striped table-bordered">
						<tr>
							<th>
								<div id="tabHead">Product ID</div>
								<button type="button" class="btn btn-default" value="?orderBy=prodID DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=prodID ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>
							</th>
							<th>
								<div id="tabHead">Product Description</div>
								<button type="button" class="btn btn-default" value="?orderBy=prodName DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=prodName ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>							
							</th>
							<th>
								Model
							</th>
							<th>
								<div id="tabHead">Brand</div>
								<button type="button" class="btn btn-default" value="?orderBy=brand DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=brand ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>
							</th>
							<th>
								<div id="tabHead">Category</div>
								<button type="button" class="btn btn-default" value="?orderBy=type DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=type ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>
							</th>
							<th>
								Unit
							</th>
							<th>
								<div id="tabHead">Price</div>
								<button type="button" class="btn btn-default" value="?orderBy=price DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=price ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>
							</th>
							<th>
							</th>
						</tr>
						<?php
							foreach ($result as $item):
							$proID = $item["prodID"];
						?>
						<tr id="centerData">
							<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
							<td data-title="Description"><?php echo $item["prodName"]; ?></td>
							<td data-title="Model"><?php echo $item["model"];?></td>
							<td data-title="Brand"><?php echo $item["brandName"]; ?></td>
							<td data-title="Category"><?php echo $item["categoryName"]; ?></td>
							<td data-title="Unit"><?php echo $item["unitType"];?></td>
							<td data-title="Price"><?php echo $item["price"]; ?></td>
							<td>
								<a href="functionalities/editProd.php?proId=<?php echo $proID; ?>" target="_blank">	
									<button type="button" class="btn btn-default" id="edBtn1">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</button>
								</a>	
								<a href="functionalities/deletePro.php?proId=<?php echo $proID; ?>">
									<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this entry?');" id="delBtn1">
										<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
									</button>
								</a>
							</td>	
						</tr>				
						<?php
							endforeach;
						?>
					</table>
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
		
  </body>
</html>

