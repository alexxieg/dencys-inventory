<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Supplier Returns</title>
					
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
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		
		<!-- Custom CSS for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="js/returnSupplier.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-3.2.0.min.js"></script>	
		<script src="js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">
		
		<!-- Datatables CSS and JS Files -->
		<script src="datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="datatables/media/js/dataTables.bootstrap.min.js"></script>
		<script src="datatables/Buttons/js/dataTables.buttons.min.js"></script>
		<script src="datatables/Buttons/js/buttons.bootstrap.min.js"></script>
		<script src="datatables/media/js/buttons.html5.min.js"></script>
		<script src="datatables/Buttons/js/buttons.print.min.js"></script>
		<script src="datatables/Buttons/js/buttons.colVis.min.js"></script>

		<link href="datatables/media/css/dataTables.bootstrap.min.css"rel="stylesheet">
		<link href="datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
		<link href="datatables/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet">		

        <link href="datatables/Buttons/css/buttons.dataTables.min.css"rel="stylesheet">
        <script src="datatables/Buttons/js/buttons.print.min.js"></script>
		<script src="datatables/Buttons/js/buttons.colVis.min.js"></script>

		<!-- Datatables Script -->
		<script>
			$(document).ready(function() {
                $('#myTable').DataTable( {
                    dom: 'Bfrtip',
					lengthMenu: [
						[ 10, 25, 50, 100, -1 ],
						[ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
					],
                    buttons: [
                        {
                            title: 'Dencys Hardware and General Merchandise', 
							message: 'Supplier Returns', 
							customize: function ( win ) {
                                $(win.document.body)
                                    .css( 'font-size', '10pt' )
                                    .prepend(
                                        '<img src="http://localhost/dencys/DH%20Inventory%20System/logo.png" style="position:relative; bottom:5%; float: right; height:120px; width:120px;" />'
                                    );

                                $(win.document.body).find( 'table' )
                                    .addClass( 'compact' )
                                    .css( 'font-size', 'inherit' );
                            },
                                extend: 'print',
                                exportOptions: {
                                columns: ':visible'
                                }
                        },
							{extend:'colvis', text: 'Select Column'},'pageLength',

                    ],
                        columnDefs: [{
                            targets: -1,
                            visible: true
                            
                        }]
                } );
            } );		
		</script>

	</head>

	<body>
		<!-- PHP code for fetching the data-->
		<?php include('functionalities/fetchReturnsSupplier.php'); ?>
	
		<!-- Sorting Function -->
		<?php 
			$sortMonth = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
			$sortYear = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
			$location =  $_SERVER['REQUEST_URI']; 
		?>
	
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
			<div class="row navbar-collapse">
				<!-- Sidebar -->
				<div class="col-sm-3 col-md-2 sidebar">
					<!-- Sidebar -->
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory </span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="functionalities/userAddDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="userPurchaseOrders.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="userProdIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
		 
				<?php
					foreach ($result as $item):
					$retID = $item["receiptNo"];
				?>
							
				<?php
					endforeach;
				?>
							
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div class="pages no-more-tables">
							<div id="tableHeader">
								<h1 id="headers">SUPPLIER RETURNS</h1>	
								<table class="table">	
									<tr>
										<td>
											<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#myModal" id="modbutt">Add Product</button>
											<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#activityLog" id="modbutt">Edit Log</button>
										</td>
									<td>		
										<form class="form-inline" action="<?php echo $location; ?>" method="post">
											<label>View Previous Entries</label>
											<div class="form-group">
												<select name="dateMonthName" class="form-control">
													<option value="<?php echo $sortMonth; ?>" SELECTED>MONTH: <?php echo $sortMonth; ?></option>
													<?php foreach ($result2 as $row): ?>
														<option value="<?=$row["nowMonthDate"]?>"><?=$row["nowMonthDate"]?></option>
													<?php endforeach ?>
												</select>
											</div>
											<div class="form-group">
												<select name="dateYearName" class="form-control">
													<option value="<?php echo $sortYear; ?>" SELECTED>YEAR: <?php echo $sortYear; ?></option>
													<?php foreach ($result3 as $row): ?>
														<option value="<?=$row["nowYearDate"]?>"><?=$row["nowYearDate"]?></option>
													<?php endforeach ?>
												</select>
											</div>	
											<div class="form-group">
												<input type="submit" value="View" class="btn btn-success" id="viewButton" name="filter">
											</div>
										</form>		
									</td>
									<tr>												
								</table>
							
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
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Reference No.</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Supplier</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">User</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">View Details</th>
									</tr>
								</thead>
								
								<tbody>				
									<?php
										foreach ($result as $item):
										$retID = $item["receiptNo"];
									?>
									
									<tr id="centerData">
										<td data-title="Date"><?php echo $item["receiptNo"]; ?></td>
										<td data-title="Date"><?php echo $item["returnDate"]; ?></td>
										<td data-title="Supplier"><?php echo $item["supplier_name"]; ?></td>
										<td data-title="User"><?php echo $item["userID"]; ?></td>
											
										<td>
											<a href="functionalities/userViewRetSupplier.php?retId=<?php echo $retID; ?>">
												<button type="button" class="btn btn-default">
													<span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
												</button>
											</a>
										</td>
									</tr>
											
									<?php
										endforeach;
									?>
								</tbody>	
							</table>
							<!-- End of Table -->
							
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
												<h3> User </h3>
												<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
													
												<h3>Supplier</h3>  
												<div class="ui-widget">
													<input id="addSupplier" name="supplier" placeholder="Supplier">
												</div>
													
												<h3>Handled By</h3>
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
												
												<h5 id="prodHeader">Product/s</h5>
												<table class="table table-striped" id="dataTable" name="chk">
													<tbody>
														<tr>
															<td>
															</td>
															<td>
															</td>
															<td>
																Product Name
															</td>
															<td>
																Quantity
															</td>
															<td>
																Remarks
															</td>
														</tr>
														<tr>
															<td><input type="checkbox" name="chk"></TD>
															<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
															<td>	
																<div class="ui-widget">
																	<input class="thisProduct" id="prod" name="prodItem[]">
																</div>
															</td>
																	
															<td>
																<input type="number" min="1" class="form-control" id ="addQty"  placeholder="Quantity" name="retQty[]">
															</td>
															
															<td>
																<input type="text" class="form-control" id="addEntry" placeholder="Remarks" name="retRemarks[]">
															</td>
														</tr>
													</tbody>
												</table>
														
												<div class="modFoot">
													<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
													<span> <button type="button" value="Delete Row" class="btn btn-default" onclick="deleteRow('dataTable')">Remove from List</button></span>
													<br>
													<br>
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
							
							<!-- Modal - Activity Log -->
							<div class="modal fade" id="activityLog" role="dialog">
								<div class="modal-dialog modal-xl">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Edit Log - Previous Content</h4>
										</div>
										<div class="modal-body">
											<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
											
												<!-- Retrieve Category Data -->
												<?php
													$query = $conn->prepare("SELECT editReturn.returnEditDate, editReturn.receiptNo, editReturn.returnDate, editReturn.returnQty, editReturn.returnType, editReturn.returnRemark, product.prodName, editReturn.userID from editreturn INNER JOIN product ON editreturn.prodID = product.prodID");
													$query->execute();
													$result1 = $query->fetchAll();
												?>
												
												<thead>
													<tr id="centerData">
														<th>
															<div id="tabHead">Date Edited</div>
														</th>
														<th>
															<div id="tabHead">Reference No.</div>
														</th>
														<th>
															<div id="tabHead">Product Description</div>
														</th>
														<th>
															<div id="tabHead">Return Quantity</div>
														</th>
														<th>
															<div id="tabHead">Return Type</div>
														</th>
														<th>
															<div id="tabHead">Return Remarks</div>
														</th>
														<th>
															<div id="tabHead">Edited By</div>
														</th>
													</tr>
												</thead>
												
												<tbody>						
														
													<?php
														foreach ($result1 as $item):
														$retID = $item["receiptNo"];
													?>
													<tr id="centerData">	
														<td data-title="Edit Date"><?php echo $item["returnEditDate"]; ?></td>
														<td data-title="Receipt No"><?php echo $item["receiptNo"]; ?></td>
														<td data-title="Product Description"><?php echo $item["prodName"]; ?></td>
														<td data-title="Return Quantity"><?php echo $item["returnQty"]; ?></td>
														<td data-title="Return Type"><?php echo $item["returnType"]; ?></td>
														<td data-title="Return Remarks"><?php echo $item["returnRemark"]; ?></td>
														<td data-title="Edited By"><?php echo $item["userID"]; ?></td>
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
		<?php include('functionalities/addReturnSupplier.php'); ?>
	</body>
</html>
