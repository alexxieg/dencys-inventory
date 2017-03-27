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
			if (!isset($_SESSION['id']) || $role!="admin") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>
	</head>
    
  	<body>
		<!-- PHP code for fetching the data-->
		<?php include('functionalities/fetchInventory.php'); ?>
	
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
		 </nav><!-- /Header -->
		
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
	</body>
</html>