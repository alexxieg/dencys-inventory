<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Incoming Products</title>

			<!-- CSS Files -->
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link rel="shortcut icon" href="logo.jpg">
			<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
			
			<!-- Custom styles for this template -->
			<link href="css/test.css" rel="stylesheet">
			
			<!-- Javascript Files -->
			<script src="incoming.js"></script>
			<script src="js/bootstrap.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="alertboxes/sweetalert2.min.js"></script>
			<link rel="stylesheet" href="../alertboxes/sweetalert2.min.css">
		
			<script src="datatables/media/js/jquery.dataTables.min.js"></script>
			<link href="datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
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
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Dency's Hardware and General Merchandise</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="Logout.php">Logout</a></li>
				  </ul>
				</div>
			</div>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<li><a href="inventory.php">Inventory</a></li>
						<li class="active"><a href="incoming.php">Incoming<span class="sr-only">(current)</span></a></li>
						<li><a href="outgoing.php">Outgoing</a></li>
						<li><a href="returns.php">Returns</a></li>
					</ul>
					<ul class="nav nav-sidebar">
						<li><a href="">Reports</a></li>
						<li><a href="branchReport.php">Branch Report</a></li>
					</ul>
					<ul class="nav nav-sidebar">
						<li><a href="#" data-toggle="collapse" data-target="#manage">Manage</a>
							<ul class="list collapse" id="manage">
								<li><a href="accounts.php">Accounts</a></li>
								<li><a href="branch.php">Branches</a></li>
								<li><a href="employees.php">Employees</a></li>
								<li><a href="product.php">Products</a></li>
								<li><a href="brand.php">Product Brands</a></li>
								<li><a href="category.php">Product Categories</a></li>
							<ul>
						</li>
					</ul>
				</div>
			
				<!-- Retrieve Incoming Data -->
				<?php include('functionalities/fetchIncoming.php'); ?>
				
				<?php
					foreach ($result as $item):
						$incID = $item["inID"];
				?>
							
				<?php
					endforeach;
				?>
					
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div id="contents">
							<div class="pages no-more-tables">
								<div id="tableHeader">
									<table class="table table-striped table-bordered">
										<h1 id="headers">INCOMING PRODUCTS</h1>
										<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#archive" id="modbutt">View Archive</button>
										<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">Add Incoming Product</button>
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
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date</th>
											
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Product ID
											</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												<div id="tabHead">Product Description</div>
											</th>

											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Quantity Ordered
											</th>
								
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Quantity Arrived
											</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Unit
											</th>
											
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												<div id="tabHead">Employee</div>
											</th>
											
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Receipt No.
												
											</th>
											
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Remarks
											</th>
											<th></th>
										</tr>
									</thead>
									
									<tbody>					
										<?php
											foreach ($result as $item):
											$incID = $item["inID"];
										?>
										
										<tr id="centerData">
											<td data-title="Date"><?php echo $item["inDate"]; ?></td>	
											<td data-title="Product ID"><?php echo $item["prodID"];?></td>
											<td data-title="Description"><?php echo $item["prodName"]; ?></td>
											<td data-title="Quantity Ordered"><?php echo $item["qtyOrdered"]; ?></td>
											<td data-title="Quantity Arrived"><?php echo $item["inQty"]; ?></td>
											<td data-title="Unit"><?php echo $item["unitType"]; ?></td>
											<td data-title="Employee"><?php echo $item["empName"]; ?></td>
											<td data-title="Receipt No."><?php echo $item["receiptNo"]; ?></td>
											<td data-title="Remarks"><?php echo $item["inRemarks"]; ?></td>
											<td>
												<a href="functionalities/editIn.php?incId=<?php echo $incID; ?>"> 
												<button type="button" class="btn btn-default" id="edBtn">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
												</button>
												</a>
												<a href="functionalities/removeIncoming.php?incId=<?php echo $incID; ?>"> 
												<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this entry?');" id="delBtn">
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
													
													<h5>Employee</h5>
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
																	<input type="text" class="form-control" id ="addQty" placeholder="Quantity Arrived" name="incQty[]">
																</td>
																
																<td>
																	<input type="text" class="form-control" id ="addQtyOrdered" placeholder="Quantity Ordered" name="qtyOrder[]">
																</td>
																
																<td>
																	<input type="text" class="form-control" id="addRem" placeholder="Remarks" name="inRemarks[]">
																</td>
															</tr>
														</tbody>
													</table>
													
													<br>
													
													<div class="modFoot">
													<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
													<span> <button type="button" value="Delete Row" class="btn btn-default" onclick="deleteRow('dataTable')">Remove from List</button></span>
													<br>
													<br>
													<span>
														<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
													</span>
													<span>
														<input type="submit" name="submit" value="Submit" class="btn btn-success" id="sucBtn">
													</span>
													</div>
												</form> 	
											
												<div class="modal-footer">
												</div>								
											</div>
										</div>
									</div>
								</div> 

								<!-- Modal - Incoming Archive -->
								<div class="modal fade" id="archive" role="dialog">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Archived Incoming Entries</h4>
											</div>
											<div class="modal-body">
												<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
												
													<!-- Retrieve Incoming Data -->
													<?php
														$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, incoming.inID, incoming.inQty, incoming.qtyOrdered, incoming.inDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, incoming.receiptNo, incoming.inRemarks 
																					FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
																					WHERE incoming.status = 'Inactive'
																					ORDER BY inID ASC;");
														$query->execute();
														$result = $query->fetchAll();
													?>
													
													<thead>	
														<tr>
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date</th>
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product ID</th>
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
						
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Quantity Ordered
															</th>

															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Quantity Arrived
															</th>
															
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Unit
															</th>
															
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																<div id="tabHead">Employee</div>
															</th>
															
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Receipt No.
																
															</th>
															
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Remarks
															</th>
															<th></th>
														</tr>
													</thead>
													
													<tbody>					
														
														<tr id="centerData">
															<td data-title="Date"><?php echo $item["inDate"]; ?></td>	
															<td data-title="Product ID"><?php echo $item["prodID"];?></td>
															<td data-title="Description"><?php echo $item["prodName"]; ?></td>
															<td data-title="Quantity Ordered"><?php echo $item["qtyOrdered"]; ?></td>
															<td data-title="Quantity Arrived"><?php echo $item["inQty"]; ?></td>
															<td data-title="Unit"><?php echo $item["unitType"]; ?></td>
															<td data-title="Employee"><?php echo $item["empName"]; ?></td>
															<td data-title="Receipt No."><?php echo $item["receiptNo"]; ?></td>
															<td data-title="Remarks"><?php echo $item["inRemarks"]; ?></td>
															<td>
															<a href="functionalities/restoreIncoming.php?incId=<?php echo $incID; ?>"> 
																<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this entry?');" id="delBtn">
																	Restore
																</button>
																</a>
															</td>	
														</tr>	
														<?php
															foreach ($result as $item):
															$incID = $item["inID"];
														?>
														<tr id="centerData">
															<td data-title="Date"><?php echo $item["inDate"]; ?></td>	
															<td data-title="Product ID"><?php echo $item["prodID"];?></td>
															<td data-title="Description"><?php echo $item["prodName"]; ?></td>
															<td data-title="Quantity Ordered"><?php echo $item["qtyOrdered"]; ?></td>
															<td data-title="Quantity Arrived"><?php echo $item["inQty"]; ?></td>
															<td data-title="Unit"><?php echo $item["unitType"]; ?></td>
															<td data-title="Employee"><?php echo $item["empName"]; ?></td>
															<td data-title="Receipt No."><?php echo $item["receiptNo"]; ?></td>
															<td data-title="Remarks"><?php echo $item["inRemarks"]; ?></td>
															<td>
															<a href="functionalities/restoreIncoming.php?incId=<?php echo $incID; ?>"> 
																<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this entry?');" id="delBtn">
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
		</div>
	
		<!-- Add Incoming Entry Functionality-->
		<?php include('functionalities/addIncoming.php'); ?>
	</body>
</html>
