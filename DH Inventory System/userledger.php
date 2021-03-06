<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Product Stock Card</title>

		<!-- Database Connection -->
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
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">

		<!-- Custom styles for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">

		<!-- Javascript Files -->
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-3.2.0.min.js"></script>	
		<script src="js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">

	</head>
	  
	<body>
		<!-- Top Main Header -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="userinventory.php">DENCY'S HARDWARE AND GENERAL MERCHANDISE</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li id="adminhead"><a href="#">User |</a></li>
						<li><a href="Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End of Top Main Header -->

		<div class="container-fluid">
			<div class="row">
				<!-- Sidebar -->
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="logo.png" alt=""/></div>
						<li class="active"><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory<span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="userDefectives.php"><i class="glyphicon glyphicon-list"></i> Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="userPurchaseOrders.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="userProdIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="userReturnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="userreturnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="userbranchreport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="usermonthlyin.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="usermonthlyout.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li><a href="usersuppliers.php"><i class="glyphicon glyphicon-user"></i> Suppliers</a></li>
						<li><a href="userproduct.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->

				<!-- Retrieve Ledger Data -->
				<?php include('functionalities/fetchLedger.php'); ?>

				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">		
					<div id="contents">
						<div class="pages no-more-tables">
							<div id="tableHeader">
							<h1 id="headers">Stock Card</h1>
							<table class="table">	
									<tr>
										<?php 
											$location =  $_SERVER['REQUEST_URI']; 
										?>
										<td style="float:left;">
											<form action="<?php echo $location; ?>" method="POST">
												<label>View by Date</label>
												<select name="startDate">
													<option value="" SELECTED></option>
													<?php foreach ($result4 as $row): ?>
														<option value="<?=$row["startDate"]?>"><?=$row["startDate"]?></option>
													<?php endforeach ?>
												</select>
												<select name="endDate">
													<option value="" SELECTED></option>
													<?php foreach ($result5 as $row): ?>
														<option value="<?=$row["endDate"]?>"><?=$row["endDate"]?></option>
													<?php endforeach ?>
												</select>
												<input type="submit" value="View" class="btn btn-success" id="viewButton" name="submit">
											</form>
										</td>
										<td>
											<span>
												<a href="userinventory.php">
												<input type="button" class="btn btn-danger" value="Back" id="backButton" data-dismiss="modal" onclick="this.form.reset()">
												</a>
											</span>
										</td>
									</tr>
								</table>
									
								<hr>
								
								<!-- Stockcard Information -->
								<table class="table table-striped table-bordered">
									<tr>
										<td>
											Product ID:
											<?php echo $incID;?>
										</td>
										<td>
											Product Name: 
											<?php foreach ($result3 as $row): ?>
												<?php echo $row["prodName"]; break;?>
											<?php endforeach ?>
										</td>
										
										<td>
											Beginning Quantity: 
											<?php echo $request ?>
										</td>
										<td> 
											Physical Count:
											<?php echo $req ?>
										</td>
									</tr>									
								</table>
								<br>
								
								<!-- Stockcard Data -->
								<table class="table table-striped table-bordered">			
									<tr rowspan="2">
										<th>
											Receipt No.
										</th>
										
										<th>
											Date
										</th>									
										
										<th colspan="3">
											IN
										</th>
										
										<th colspan="2">
											OUT
										</th>

										<th>
											Balance
										</th>
									</tr>
									
									<tr>
										<th>
										</th>
										
										<th>	
										</th>									
										
										<th>
											Deliveries
										</th>
						
										<th>
											Freebies
										</th>
									
										<th>
											Warehouse Returns
										</th>
																		
										<th>
											Issuance
										</th>
										
										<th>
											Supplier Returns
										</th>
										
										<th>
										</th>
									</tr>
									
									<?php
										foreach ($res as $item):
										
										if ($request == $base && $loop == True){
											$currQty = $request + ($item["plus"] + $item["plus2"] + $item["plus3"]) - ($item["minus"] + $item["minus2"]);
											$loop = False;
										}
										else {
											$currQty = $currQty + ($item["plus"] + $item["plus2"] + $item["plus3"]) - ($item["minus"] + $item["minus2"]);
										}
									?>
									
									<tr>	
										<td data-title="Receipt"><?php echo $item["receiptNos"]; ?></td>
										<td data-title="Date"><?php echo $item["dates"]; ?></td>	
										<td data-title="IN"><?php echo $item["plus"];?></td>
										<td data-title=""><?php echo $item["plus3"];?></td>
										<td data-title="IN"><?php echo $item["plus2"];?></td>
										<td data-title="OUT"><?php echo $item["minus"]; ?></td>
										<td data-title="OUT"><?php echo $item["minus2"]; ?></td>
										<td data-title="BALANCE"><?php echo $currQty ?></td>
									</tr>
									<?php
										endforeach;
									?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
