<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Inventory</title>
		
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
		
		<!-- Database connection -->
		<?php include('dbcon.php'); ?>
		
		<!-- Login Session-->
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
                    <li><a class="collapsible-header waves-effect active" href="userinventory.php">
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
                    <li><a class="collapsible-header waves-effect" href="userproduct.php">
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
						<h1 id="headers">INVENTORY</h1>	
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">
							Products for Reorder
						</button>					
					</table>
				</div>
				<br>
				
				<!-- Table for Inventory Data-->
				<table class="table table-striped table-bordered">
					<tr>
						<td colspan="13" style="font-size: 35px;">
							<?php
							$month = $conn->prepare("SELECT concat( MONTHNAME(curdate()), ' ', YEAR(curdate())) as 'month';");
							$month->execute();
							$monthres = $month->fetchAll();
							foreach ($monthres as $monthshow)
							echo $monthshow["month"];
							?>	
						</td>
					</tr>
					<tr>
						<th>
							<div id="tabHead">Product ID</div>
							<button type="button" class="btn btn-default sortRes" value="?orderBy=prodID DESC" onclick="location = this.value;" id="OutsortBtnDown1">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default sortRes" value="?orderBy=prodID ASC" onclick="location = this.value;" id="OutsortBtnUp1">
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
							Beginning Quantity
						</th>
						
						<th>
							Ending Quantity
						</th>
						
						<th>
							IN
						</th>
						
						<th>
							OUT
						</th>
						
						<th>
							Current Quantity
							
						</th>
						
						<th>
							Physical Count
						</th>
						
						<th>
							Reorder Level
						</th>
						
						<th>
							Unit
						</th>
		
						<th>
							Remarks
						</th>
						
						<th>
							Stock Card
						</th>
					</tr>
					
					<?php
						foreach ($result as $item):
							$currQty = $item["initialQty"] + $item["inQty"] - $item["outQty"];
							$incID = $item["prodID"];
							if ($currQty <= $item["reorderLevel"]){
					?> 
					
					<tr style='background-color: #ff9999' id="centerData">
						<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
						<td data-title="Description"><?php echo $item["prodName"]; ?></td>
						<td data-title="Model"><?php echo $item["model"]; ?> </td>
						<td data-title="Beg. Quantity"><?php echo $item["initialQty"]; ?></td>
						<td data-title="End. Quantity"></td>
						<td data-title="IN"><?php echo $item["inQty"]; ?></td>
						<td data-title="OUT"><?php echo $item["outQty"]; ?></td>
						<td data-title="Current Quantity"><?php echo $currQty; ?></td>
						<td data-title="Physical Count"></td>
						<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
						<td data-title="Unit"><?php echo $item["unitType"];?></td>
						<td data-title="Remarks"></td>
						<td>
							<a href="ledger.php?incId=<?php echo $incID; ?>" target="_blank"> 
								<button type="button" class="btn btn-default" id="edBtn">
									<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
								</button>
							</a>
						</td>
					</tr>
					
					<?php	
						}else if ($currQty > $item["reorderLevel"]){
					?>
					<tr id="centerData">
						<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
						<td data-title="Description"><?php echo $item["prodName"]; ?></td>
						<td data-title="Model"><?php echo $item["model"]; ?> </td>
						<td data-title="Beg. Quantity"><?php echo $item["initialQty"]; ?></td>
						<td data-title="End. Quantity"></td>
						<td data-title="IN"><?php echo $item["inQty"]; ?></td>
						<td data-title="OUT"><?php echo $item["outQty"]; ?></td>
						<td data-title="Current Quantity"><?php echo $currQty; ?></td>
						<td data-title="Physical Count"></td>
						<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
						<td data-title="Unit"><?php echo $item["unitType"];?></td>
						<td data-title="Remarks"></td>
						<td>
							<a href="ledger.php?incId=<?php echo $incID; ?>" target="_blank"> 
								<button type="button" class="btn btn-default" id="edBtn">
									<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
								</button>
							</a>	
						</td>	
					</tr>
					<?php
						}	
					?>
						
					<?php
						endforeach;
					?>
				</table>
			</div>	
					
			<!-- Modal for Reorder Products Summary -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Summary of products to be reordered</h4>
						</div>
						<div class="modal-body">			
							<?php
								$query = $conn->prepare("SELECT * FROM inventory LEFT JOIN product ON inventory.prodID = product.prodID
														WHERE inventory.qty <= product.reorderLevel");
								$query->execute();
								$result = $query->fetchAll();
							?>	
							
							<table class="table table-bordered" id="tables">
								<tr>
									<th>
										Product ID
									</th>
									<th>
										Product Description
									</th>
									<th>
										Model
									</th>						
									<th>
										Current Quantity
									</th>
									<th>
										Reorder Level
									</th>
									<th>
										Unit
									</th>	
								</tr>
									
								<?php
									foreach ($result as $item):
								?>

								<tr>
									<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
									<td data-title="Description"><?php echo $item["prodName"]; ?></td>
									<td data-title="Model"><?php echo $item["model"]; ?> </td>
									<td data-title="Current Quantity"><?php echo $item["qty"]; ?></td>
									<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
									<td data-title="Unit"><?php echo $item["unitType"];?></td>
									</td>		
								</tr>	
								<?php
									endforeach;
								?>
							</table>																
						</div>
								
						<div class="modal-footer">	
						</div>
					</div>
				</div>
			</div>
			
			<!-- Modal for the Product Stock Card/Ledger -->
			<div class="modal fade" id="ledger" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Stock Card</h4>
						</div>
						<div class="modal-body">
						<h5>Product Name: </h5>
							<table class="table table-bordered" id="tables">
								<tr>
									<th>
										Date
									</th>
									<th>
										In
									</th>
									<th>
										Out
									</th>
									<th>
										Balance
									</th>
								</tr>
								
								<tr>
									<td>
									</td>
									<td>
									</td>
									<td>
									</td>									
									<td>
									</td>
								</tr>
							</table>
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

	</body>
</html>
