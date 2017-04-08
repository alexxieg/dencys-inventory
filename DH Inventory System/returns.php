<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Return to Warehouse</title>
	
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link href="css/test.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		
		<!--Javascript Files -->
		<script src="returns.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">
		
		<script src="datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="datatables/media/js/dataTables.bootstrap.min.js"></script>
		<link href="datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">	
		<link href="..datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
		
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
		<!-- PHP code for fetching the data-->
		<?php include('functionalities/fetchReturns.php'); ?>
		
		<!-- Topbar Navigation / Main Header -->
		<!--Top Navigation Bar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div id="font"><h2>DENCY'S HARDWARE AND GENERAL MERCHANDISE</h2></div>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="Logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
    </nav>

    <div class="container-fluid">
		<div class="row">
			<div id="navbar" class="col-sm-3 col-md-2 sidebar collapse">
				<ul class="nav nav-sidebar">
					<div id="sidebarLogo"><img src="logo.png" alt="" width="100px" height="100px"/></div>
					<li>
						<a href="inventory.php">
							<i class="glyphicon glyphicon-list-alt"></i> Inventory
						</a>
					</li>
					<li><a href="incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
					<li><a href="outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
					<li class="active"><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-sort"></i> Returns<span class="sr-only">(current)</span> <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
						<ul class="list-unstyled collapse" id="returns">
							<li><a href="returns.php"><i class="glyphicon glyphicon-sort"></i>Warehouse Returns</a></li>
							<li><a href="returnSupplier.php"><i class="glyphicon glyphicon-sort"></i>Supplier Returns</a></li>
						</ul>
					</li>
					<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
						<ul class="list-unstyled collapse" id="reports">
							<li><a href="branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
						</ul>
					</li>
					<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
						<ul class="list-unstyled collapse" id="manage">
							<li><a href="accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
							<li><a href="branches.php"><i class="glyphicon glyphicon-home"></i> Branches</a></li>
							<li><a href="employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
							<li><a href="product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
							<li><a href="brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
							<li><a href="category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
						</ul>
					</li>
				</ul>
			</div>

	<!-- End of Sidebar -->

		 
				<?php
					foreach ($result as $item):
					$retID = $item["returnID"];
				?>
							
				<?php
					endforeach;
				?>
							
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div class="pages no-more-tables">
							<div id="tableHeader">
								<table class="table table-striped table-bordered">	
									<tr>
										<td colspan="2"><h1 id="headers">RETURN TO WAREHOUSE</h1>	
										</td>
									</tr>
									<tr>
										<td>
											<br>
											<button type="button" class="btn btn-info btn-lg btnclr pull-left" data-toggle="modal" data-target="#archive" id="modbutt">View Archive</button>
											<button type="button" class="btn btn-info btn-lg btnclr pull-left" data-toggle="modal" data-target="#myModal" id="modbutt">Add Product</button>
										</td>
										<td>
											<div class="col-sm-7 pull-right">
												<label>Filter By Date</label>
												<form class="form-inline" action="" method="post">
													<div class="form-group">
														<select name="dateMonthName" class="form-control">
															<?php foreach ($result2 as $row): ?>
																<option value="<?=$row["nowMonthDate"]?>"><?=$row["nowMonthDate"]?></option>
															<?php endforeach ?>
														</select>
													</div>
													<div class="form-group">
														<select name="dateYearName" class="form-control">
															<?php foreach ($result3 as $row): ?>
																<option value="<?=$row["nowYearDate"]?>"><?=$row["nowYearDate"]?></option>
															<?php endforeach ?>
														</select>
													</div>	
													<div class="form-group">
														<input type="submit" value="Filter By Date" class="btn btn-success" name="submit">
													</div>
												</form>	
											</div>
										</td>
									<tr>												
								</table>
							</div>
							
							<!-- Table for Returns -->
							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
							
							<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								<thead>
									<tr>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product ID </th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Quantity</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Unit</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Returned From</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Remarks</th>
										<th></th>
									</tr>
								</thead>
								
								<tbody>				
									<?php
										foreach ($result as $item):
										$retID = $item["returnID"];
									?>
									
									<tr id="centerData">
										<td data-title="Date"><?php echo $item["returnDate"]; ?></td>
										<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
										<td data-title="Description"><?php echo $item["prodName"]; ?></td>
										<td data-title="Quantity"><?php echo $item["returnQty"]; ?></td>
										<td data-title="Unit"><?php echo $item["unitType"];?></td>
										<td data-title="Returned From"><?php echo $item["location"];?></td>
										<td data-title="Remarks"><?php echo $item["returnRemark"]; ?></td>
											
										<td>
											<a href="functionalities/editRet.php?retId=<?php echo $retID; ?>" target="_blank">
												<button type="button" class="btn btn-default">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
												</button>
											</a>
											<a href="functionalities/removeReturn.php?retId=<?php echo $retID; ?>">
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
								
							<!-- Modal for Returned Product Entry Form -->
							<div class="modal fade" id="myModal" role="dialog">
								 <div class="modal-dialog modal-lg">
									 <div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Add Returned Product</h4>
										</div>
										<div class="modal-body">
											<form action="" method="POST" onsubmit="return validateForm()">
												<h3>Item</h3>
												<?php
													$query = $conn->prepare("SELECT prodName FROM product ");
													$query->execute();
													$res = $query->fetchAll();
												?>
													
												<select class="form-control" id="addEntry" name="prodItem">
													<?php foreach ($res as $row): ?>
													<option><?=$row["prodName"]?></option>
													<?php endforeach ?>
												</select> 
												<br>
														
												<h3>Quantity</h3>
												<input type="number" min = "1" class="form-control" id ="addQty" placeholder="Item Quantity" name="retQty"> <br>
												
												<h3>Branch</h3>
												<?php
													$query = $conn->prepare("SELECT location FROM branch ");
													$query->execute();
													$res = $query->fetchAll();
												?>
													
												<select class="form-control" id="addEntry" name="branchRet">
													<?php foreach ($res as $row): ?>
													<option><?=$row["location"]?></option>
													<?php endforeach ?>
												</select> 
												<br>
												
												<h3>Remarks</h3>
												<textarea class="form-control" id="addEntry" rows="3" name="retRemarks"></textarea> <br>
												<br>
												<div class="modFoot">
												<span>
													<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn"> Cancel</button>
												</span>
												<span>
													<input type="submit" value="Submit" class="btn btn-success" name="addRet" id="sucBtn">
												</span>
											</div>
											</form> 	

											<div class="modal-footer">
											</div>								
										</div>
									</div>
								</div>
							</div>
							
							<!-- Modal - Returns Archive -->
							<div class="modal fade" id="archive" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Archived Returns</h4>
										</div>
										<div class="modal-body">
											<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
											
												<!-- Retrieve Return Data -->
												<?php
													$query = $conn->prepare("SELECT product.prodID, product.unitType, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark 
																			FROM returns INNER JOIN product ON returns.prodID = product.prodID 
																			WHERE returns.status = 'Inactive' AND returns.returnType = 'Warehouse Return'
																			ORDER BY returnID DESC;");
													$query->execute();
													$result = $query->fetchAll();
												?>
												
												<thead>
													<tr>
														<th>
															<div id="tabHead">Date</div>
														</th>
														<th>
															<div id="tabHead">Product ID</div> 
														</th>
														<th>
															<div id="tabHead">Product Description</div>
														</th>
														<th>
															<div id="tabHead">Quantity</div>
														</th>
														<th>
															<div id="tabHead">Unit</div>
														</th>
														<th>
															<div id="tabHead">Remarks</div>
														</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>				
													
													<tr id="centerData">
														<td data-title="Date"><?php echo $item["returnDate"]; ?></td>
														<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
														<td data-title="Description"><?php echo $item["prodName"]; ?></td>
														<td data-title="Quantity"><?php echo $item["returnQty"]; ?></td>
														<td data-title="Unit"><?php echo $item["unitType"];?></td>
														<td data-title="Remarks"><?php echo $item["returnRemark"]; ?></td>
															
														<td>
															<a href="functionalities/restoreReturn.php?retId=<?php echo $retID; ?>">
																<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to remove this entry?');">
																	Restore
																</button>
															</a>
														</td>
													</tr>
													<?php
														foreach ($result as $item):
														$retID = $item["returnID"];
													?>
													
													<tr id="centerData">
														<td data-title="Date"><?php echo $item["returnDate"]; ?></td>
														<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
														<td data-title="Description"><?php echo $item["prodName"]; ?></td>
														<td data-title="Quantity"><?php echo $item["returnQty"]; ?></td>
														<td data-title="Unit"><?php echo $item["unitType"];?></td>
														<td data-title="Remarks"><?php echo $item["returnRemark"]; ?></td>
															
														<td>
															<a href="functionalities/restoreReturn.php?retId=<?php echo $retID; ?>">
																<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to remove this entry?');">
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
				</div>
			</div>
		</div>

		<!-- Functionality for Adding Returns -->
		<?php include('functionalities/addReturnWarehouse.php'); ?>
	</body>
</html>
