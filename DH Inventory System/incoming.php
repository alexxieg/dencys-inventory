<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Incoming Products</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link href="css/test.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
			
		<!-- Javascript Files -->
		<script src="incoming.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="../alertboxes/sweetalert2.min.css">
		
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
		<!-- Retrieve Incoming Data -->
		<?php include('functionalities/fetchIncoming.php'); ?>
	
		<!-- Topbar Navigation / Main Header -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle pull-left collapsed" data-toggle="collapse" data-target="#sidebarCol" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

<<<<<<< HEAD
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div id="font"><h2>DENCY'S HARDWARE AND GENERAL MERCHANDISE</h2></div>
			</div>
			<div  id="navbar" class="navbar-collapse">
				<ul class="nav navbar-nav-fixed navbar-right" id="adminDrp">
				    <li class="dropdown" id="font">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        	<i class="glyphicon glyphicon-user"></i> ADMIN
                         </a>
                            <ul class="dropdown-menu list-unstyled">
                                <li>
                                    <a href="logout.php" class="active"><i class="glyphicon glyphicon-log-out"></i> LOGOUT</a>
								</li>
                            </ul>
                     </li>
				</ul>
			</div>
=======
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div id="font"><h2>DENCY'S HARDWARE AND GENERAL MERCHANDISE</h2></div>
				</div>
				<div  id="navbar" class="navbar-collapse">
					<ul class="nav navbar-nav navbar-right" id="adminDrp">
						<li class="dropdown" id="font">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="try">
								<i class="glyphicon glyphicon-user"></i> ADMIN
							 </a>
								<ul class="dropdown-menu list-unstyled">
									<li>
										<a href="logout.php" class="active"><i class="glyphicon glyphicon-log-out"></i> LOGOUT</a>
									</li>
								</ul>
						 </li>
					</ul>
				</div>
			</nav>
>>>>>>> 793821c295db820a9fa9784943b04be92dc13d0a


			<div class="container-fluid">
				<div class="row navbar-collapse">
					<div id="sidebarCol" class="col-sm-3 col-md-2 sidebar">
						<ul class="nav nav-sidebar">
								<img src="logo.png" alt="" width="100px" height="100px" id="sidebarLogo"/>
							<li>
								<a href="inventory.php">
									<i class="glyphicon glyphicon-list-alt"></i> Inventory
								</a>
							</li>
							<li><a href="incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
							<li ><a href="outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing </a></li>
							<li class="active"><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
								<ul class="list-unstyled collapse" id="returns">
									<li><a href="returns.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
									<li><a href="returnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
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
				</div>
				<!-- End of Sidebar -->	

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
						<div id="contents">
							<div class="pages no-more-tables">
								<div id="tableHeader">
									<table class="table table-striped table-bordered">
										<tr>
											<td colspan="2"><h1 id="headers">INCOMING PRODUCTS</h1></td>
										</tr>
						
										<tr>
											<td>
												<br>
												<button type="button" class="btn btn-info btn-lg btnclr pull-left" data-toggle="modal" data-target="#partial" id="modbutt">View Partial Deliveries</button>
												<button type="button" class="btn btn-info btn-lg btnclr pull-left" data-toggle="modal" data-target="#myModal" id="modbutt">Add Incoming Product</button>
											</td>
											<td>
											<div class="col-sm-7 pull-right">
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
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date</th>
											
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Product ID
											</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												<div id="tabHead">Product Description</div>
											</th>
								
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Quantity
											</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Unit
											</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Received By
											</th>
											
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Receipt No.	
											</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Receipt Date	
											</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Supplier
											</th>										
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												Status
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
											$incRecID = $item["receiptNo"];						
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
											<td data-title="Status"><?php echo $item["status"]; ?></td>
											<td data-title="Remarks"><?php echo $item["inRemarks"]; ?></td>
											<td>
												<a href="functionalities/editIn.php?incId=<?php echo $incRecID; ?>"> 
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
															
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Product ID
															</th>
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																<div id="tabHead">Product Description</div>
															</th>
												
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Quantity
															</th>
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Unit
															</th>
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Received By
															</th>
															
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Receipt No.	
															</th>
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Receipt Date	
															</th>
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Supplier
															</th>										
															<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
																Remarks
															</th>
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
		</div>
		
		<!-- Add Incoming Entry Functionality-->
		<?php include('functionalities/addIncoming.php'); ?>
	</body>
</html>