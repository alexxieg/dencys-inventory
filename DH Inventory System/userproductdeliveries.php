<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Product Deliveries</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		
		<!-- Custom CSS for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
			
		<!-- Javascript Files -->
		<script src="js/incoming.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-3.2.0.min.js"></script>	
		<script src="js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">
		
		<!-- Datatables CSS and JS Files -->
		<script src="datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="datatables/media/js/dataTables.bootstrap.min.js"></script>
		<link href="datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">	
		<link href="..datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
		
		<!-- Datatables Script -->
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

	<body>
		<!-- Retrieve Incoming Data -->
		<?php include('functionalities/fetchIncoming.php'); ?>
		
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
					<div id="font"><h2>DENCY'S HARDWARE AND GENERAL MERCHANDISE</h2></div>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li id="adminhead"><h3>User |</h3></li>
					<li id="loghead"><a href="Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End of Top Main Header -->

		<div class="container-fluid" >
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
				
				<!-- Sidebar -->
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory </span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="adddefectives.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="userincoming.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="useroutgoing.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
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
								<li><a href="userproduct.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->
				
				<?php
					foreach ($result as $item):
						$incID = $item["inID"];
				?>
							
				<?php
					endforeach;
				?>
					
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div class="pages no-more-tables">
							<div id="tableHeader">
								<h1 id="headers">PRODUCT DELIVERIES</h1>
								  <table class="table">	
									<tr>
									  <td>
									  <br>
										<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#partial" id="modbutt">View Partial Deliveries</button>
										<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#myModal" id="modbutt">Add Incoming Product</button>
										</td>
										<td>
											<div class="col-sm-7 pull-right filter">
												<label>View Previous Entries</label>
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
														<input type="submit" value="View" class="btn btn-success" name="submit">
													</div>
												</form>	
											</div>	
										  </td>
										</tr>
									 </table>
							       </div>
							
							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
							<br> 
							
							<!-- Table Display for Incoming -->
							<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								<thead>	
									<tr>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Receipt No.</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Receipt Date</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product ID</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Quantity</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Received By</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Supplier</th>										
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Status</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Remarks</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">User</th>
										<th></th>
									</tr>
								</thead>
								<tbody>					
									<?php
										foreach ($result as $item):
										$incID = $item["inID"];
										$incRec = $item["receiptNo"];
									?>
									
									<tr id="centerData">
										<td data-title="Receipt No."><?php echo $item["receiptNo"]; ?></td>
										<td data-title="Receipt Date"><?php echo $item["receiptDate"]; ?></td>
										<td data-title="Date"><?php echo $item["inDate"]; ?></td>	
										<td data-title="Product ID"><?php echo $item["prodID"];?></td>
										<td data-title="Description"><?php echo $item["prodName"]; ?></td>
										<td data-title="Quantity"><?php echo $item["inQty"]; ?></td>
										<td data-title="Employee"><?php echo $item["empName"]; ?></td>
										<td data-title="Supplier"><?php echo $item["supplier"]; ?></td>
										<td data-title="Status"><?php echo $item["status"]; ?></td>
										<td data-title="Remarks"><?php echo $item["inRemarks"]; ?></td>
										<td data-title="User"><?php echo $item["userID"]; ?></td>
										<td>
											<a href="functionalities/userEditIn.php?incId=<?php echo $incRec; ?>"> 
											<button type="button" class="btn btn-default" id="edBtn">
												<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
											</button>
											</a>
										</td>	
									</tr>	
									
									<?php
										endforeach;
									?>
								</tbody>	
							</table>

							<!-- Modal for New Incoming Entry Form -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Add Incoming Product</h4>
										</div>
										<div class="modal-body">
											<form action="" method="POST" onsubmit="return validateForm()">
												<h5>Receipt No.</h5> 
												<input type="text" class="form-control" id ="addRcpt" placeholder="Receipt Number" name="rcno"><br>
												
												<h5>Receipt Date</h5> 
												<input type="date" class="form-control" id ="addRcptDate" placeholder="Receipt Date" name="rcdate"><br>
												
												<h5>Supplier</h5> 
												<input type="text" class="form-control" id ="addSupplier" placeholder="Supplier" name="supplier"><br>
																		
												<h5>Received By</h5>
												<?php
													$query = $conn->prepare("SELECT empFirstName FROM employee ");
													$query->execute();
													$res = $query->fetchAll();
												?>
																	
												<select class="form-control" id="addEmpl" name="emp">
													<?php foreach ($res as $row): ?>
														<option><?=$row["empFirstName"]?></option>
													<?php endforeach ?>
												</select> 
												
												<br>
													
												<h5>Product/s</h5>
												<table class="table table-striped" id="dataTable" name="chk">				
													<tbody>
														<tr>
															<td><input type="checkbox" name="chk"></TD>
															<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
															<td>	
																<?php
																	$query = $conn->prepare("SELECT prodName FROM product ");
																	$query->execute();
																	$res = $query->fetchAll();
																?>
														
																<select class="form-control" id="addItem" name="prodItem[]">
																	<?php foreach ($res as $row): ?>
																			<option><?=$row["prodName"]?></option>
																<?php endforeach ?>
																</select> 
															</td>
																	
															<td>
																<input type="text" class="form-control" id ="addQty" placeholder="Quantity" name="incQty[]">
															</td>
															
															<td>
																<select class="form-control" id="addInStatus" name="inStatus[]">
																	<option>Complete</option>
																	<option>Partial</option>
																</select> 
															</td>
																
															<td>
																<input type="text" class="form-control" id="addRem" placeholder="Remarks" name="inRemarks[]">
															</td>
															<td>
																<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
															</td>
														</tr>
													</tbody>
												</table>
												
												<br>
												
												<div class="modFoot">
													<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
													<span><button type="button" value="Delete Row" class="btn btn-default" onclick="deleteRow('dataTable')">Remove from List</button></span>
													<br>
													<br>
													<span><input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()"></span>
													<span><input type="submit" name="submit" value="Submit" class="btn btn-success" id="sucBtn"></span>
												</div>
											</form> 	
										
											<div class="modal-footer">
											</div>								
										</div>
									</div>
								</div>
							</div> 
							<!-- End of Modal -->
							
							<!-- Modal Viewing Partial Deliveries -->
							<div class="modal fade" id="partial" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Partial Deliveries</h4>
										</div>
										<div class="modal-body">
										
											<?php 
												$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, incoming.inID, incoming.inQty, incoming.inDate, MONTHNAME(incoming.inDate) AS nowMonthDate, YEAR(inDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, incoming.receiptNo, incoming.receiptDate, incoming.supplier, incoming.status, incoming.inRemarks 
																		FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
																		WHERE incoming.status = 'Partial' AND MONTH(inDate) = MONTH(CURRENT_DATE())");
												$query->execute();
												$result1 = $query->fetchAll();
											?>
												
											<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
												<thead>	
													<tr>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product ID</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Quantity</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Unit</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Received By</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Receipt No.</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Receipt Date</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Supplier</th>										
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Remarks</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>					
													<?php
														foreach ($result1 as $item):
														$incID = $item["inID"];
													?>
																											
													<tr id="centerData">
														<td data-title="Date"><?php echo $item["inDate"]; ?></td>	
														<td data-title="Product ID"><?php echo $item["prodID"];?></td>
														<td data-title="Description"><?php echo $item["prodName"]; ?></td>
														<td data-title="Quantity"><?php echo $item["inQty"]; ?></td>
														<td data-title="Unit"><?php echo $item["unitType"]; ?></td>
														<td data-title="Employee"><?php echo $item["empName"]; ?></td>
														<td data-title="Receipt No."><?php echo $item["receiptNo"]; ?></td>
														<td data-title="Receipt Date"><?php echo $item["receiptDate"]; ?></td>
														<td data-title="Supplier"><?php echo $item["supplier"]; ?></td>
														<td data-title="Remarks"><?php echo $item["inRemarks"]; ?></td>
														<td>
															<a href="functionalities/editIn.php?incId=<?php echo $incID; ?>"> 
															<button type="button" class="btn btn-default" id="edBtn">
																<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
															</button>
															</a>
														</td>	
													</tr>	
													
													<?php
														endforeach;
													?>
												</tbody>	
											</table>
											
											<div class="modal-footer">
											</div>								
										</div>
									</div>
								</div>
							</div> 
							<!-- End of Modal -->			
								
						</div>
					</div>		  
				</div>
			</div>
		</div>
		
		<!-- Add Incoming Entry Functionality-->
		<?php include('functionalities/addIncoming.php'); ?>
	</body>
</html>