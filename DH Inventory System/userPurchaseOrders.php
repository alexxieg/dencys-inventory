<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Purchase Orders</title>

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
		<script src="js/po.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery-3.2.0.min.js"></script>	
		<script src="js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">
		
		<!-- Autocomplete Script -->
		<link rel="stylesheet" href="css/jquery-ui.css">
		<script src="js/jquery-1.9.1.js"></script>
		<script src="js/jquery-ui.js"></script>

		<!-- Datatables CSS and JS Files -->
		<script src="datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="datatables/media/js/dataTables.bootstrap.min.js"></script>
		<script src="datatables/Buttons/js/dataTables.buttons.min.js"></script>
		<script src="datatables/Buttons/js/buttons.bootstrap.min.js"></script>
		<script src="datatables/media/js/buttons.html5.min.js"></script>
		<script src="datatables/Buttons/js/buttons.print.min.js"></script>
		<script src="datatables/Buttons/js/buttons.colVis.min.js"></script>
		<link href="datatables/media/css/dataTables.bootstrap.min.css"rel="stylesheet">
		<link href="datatables/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet">		
        <link href="datatables/Buttons/css/buttons.dataTables.min.css"rel="stylesheet">

		<!-- Datatables Script -->
		<script>
			$(document).ready(function() {
                $('#myTable').DataTable( {
                    dom: 'Bfrtip',
					"order": [[1, "desc"]],
					lengthMenu: [
						[ 10, 25, 50, 100, -1 ],
						[ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
					],
                    buttons: [
                        {
                            title: 'Dencys Hardware and General Merchandise', 
							message: 'Purchase Orders', 
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
                                columns: ':visible',
									modifier: {
											page: 'current'
										}
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

		<script>
		  $(function() {
			$('.prodItem').autocomplete({
				minLength:2,
				source: "search.php"
			});
		  });
		</script>
		
		<script>
		  $(function() {
			$('#addSupplier').autocomplete({
				minLength:2,
				source: "searchSup.php"
			});
		  });

		</script>
			
	</head>

	<body>
		<!-- Retrieve Incoming Data -->
		<?php include('functionalities/fetchPurchaseOrders.php');?>
		
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

		<div class="container-fluid" >
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
				<!-- Sidebar -->
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="userDefectives.php"><i class="glyphicon glyphicon-list"></i> Defectives</a></li>
							</ul>
						</li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries<span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="userPurchaseOrders.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="userProdIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
						$po = $item["poNumber"];
				?>
							
				<?php
					endforeach;
				?>
					
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div class="pages no-more-tables">
							<h1 id="headers">PURCHASE ORDERS</h1>
							<table class="table">	
								<tr>
									<td>
										<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#incPOModal" id="modbutt">Undelivered PO</button>
										<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#myModal" id="modButt">Add Purchase Order</button>
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
								</tr>												
							</table>
						</div>
							
						<div class="pages">
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
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">PO Number</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">PO Date</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Supplier</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Status</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">User</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">View Details</th>
									</tr>
								</thead>
								<tbody>					
									<?php
										foreach ($result as $item):
											$po = $item["poNumber"];
									?>
									
									<tr id="centerData">
										<td data-title="Product ID"><?php echo $item["poNumber"];?></td>
										<td data-title="Date"><?php echo $item["poDate"]; ?></td>	
										<td data-title="Supplier"><?php echo $item["supplier_name"]; ?></td>
										<td data-title="Status"><?php echo $item["status"]; ?></td>
										<td data-title="User"><?php echo $item["userID"]; ?></td>
										<td data-title="User">
											<a href="functionalities/userViewPO.php?incId=<?php echo $po; ?>"> 
											<button type="button" class="btn btn-default" id="edBtn">
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

							<!-- Modal for New Purchase Order -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Add Purchase Order</h4>
										</div>
										<div class="modal-body">
											<form action="" method="POST" onsubmit="return validateForm2()">
												<h3>User</h3>
												<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
																																					
												<h3>Supplier</h3>  
												<div class="ui-widget">
													<input id="addSupplier" name="supplier" placeholder="Supplier">
												</div>
		
												<br>

												<h5 id="prodHeader">Product/s</h5>
												<table class="table table-striped" id="dataTable" name="chk">				
													<tbody>
														<tr>
															<td>
																Product Name
															</td>
															<td>
																Quantity
															</td>
														</tr>
														<tr>
															<td>	
																<div class="ui-widget">
																	<input type="text" class="prodItem" name="prodItem[]" id="prod" placeholder="Product Name" required>
																</div>
															</td>
																		
															<td>
																<input type="number" min="1" class="form-control" id ="addQty" placeholder="Quantity" name="qty[]" required>
															</td>
														</tr>
													</tbody>
												</table>
														
												<br>
													
												<div class="modFoot">
													<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
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
													$query = $conn->prepare("SELECT editPO.poEditDate, editPO.poNumber, editPO.poDate, editPO.qtyOrder, product.prodName, editPO.userID from editpo INNER JOIN product ON editpo.prodID = product.prodID");
													$query->execute();
													$result1 = $query->fetchAll();
												?>
												
												<thead>
													<tr id="centerData">
														<th>
															<div id="tabHead">Date Edited</div>
														</th>
														<th>
															<div id="tabHead">PO Number</div>
														</th>
														<th>
															<div id="tabHead">PO Date</div>
														</th>
														<th>
															<div id="tabHead">Quantity Order</div>
														</th>
														<th>
															<div id="tabHead">Product Description</div>
														</th>
														<th>
															<div id="tabHead">Edited By</div>
														</th>
													</tr>
												</thead>
												
												<tbody>						
														
													<?php
														foreach ($result1 as $item):
														$incID = $item["poNumber"];
													?>
													<tr id="centerData">	
														<td data-title="Edit Date"><?php echo $item["poEditDate"]; ?></td>
														<td data-title="PO Number"><?php echo $item["poNumber"]; ?></td>
														<td data-title="PO Date<"><?php echo $item["poDate"]; ?></td>
														<td data-title="Quantity Order"><?php echo $item["qtyOrder"]; ?></td>
														<td data-title="Product Description"><?php echo $item["prodName"]; ?></td>
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
							
							<!-- Modal - Incomplete PO -->
							<div class="modal fade" id="incPOModal" role="dialog">
								<div class="modal-dialog modal-xl">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Undelivered PO</h4>
										</div>
										<div class="modal-body">
											<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
											
												<!-- Retrieve Category Data -->
												<?php
													$thisPOQuery = $conn->prepare("SELECT purchaseorders.poNumber, purchaseorders.poDate, purchaseorders.userID, suppliers.supplier_name
																			FROM purchaseorders INNER join product ON purchaseorders.prodID = product.prodID INNER JOIN suppliers ON purchaseorders.supID = suppliers.supID WHERE purchaseorders.status = 'Incomplete'
																			GROUP BY purchaseorders.poNumber, purchaseorders.poDate, purchaseorders.userID, suppliers.supplier_name");
													$thisPOQuery->execute();
													$thisPOResult = $thisPOQuery->fetchAll();
												?>
												
												<thead>
													<tr id="centerData">
														<th>
															<div id="tabHead">PO Number</div>
														</th>
														<th>
															<div id="tabHead">PO Date</div>
														</th>
														<th>
															<div id="tabHead">Supplier</div>
														</th>		
														<th>
															<div id="tabHead">Last Modified By</div>
														</th>
														<th>
															<div id="tabHead">View Purchase Order</div>
														</th>
													</tr>
												</thead>
												
												<tbody>						
														
													<?php
														foreach ($thisPOResult as $poItem):
														$poIncID = $poItem["poNumber"];
													?>
													<tr id="centerData">	
														<td data-title="PO Number"><?php echo $poItem["poNumber"];?></td>
														<td data-title="PO Date"><?php echo $poItem["poDate"]; ?></td>	
														<td data-title="Supplier"><?php echo $poItem["supplier_name"]; ?></td>
														<td data-title="User"><?php echo $poItem["userID"]; ?></td>
														<td data-title="Purchase Order">
															<a href="functionalities/viewPO.php?incId=<?php echo $poIncID; ?>"> 
															<button type="button" class="btn btn-default" id="edBtn">
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
		
		<!-- Add Incoming Entry Functionality-->
		<?php include('functionalities/addPO.php'); ?>
	</body>
</html>