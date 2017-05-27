<!DOCTYPE html>
<html lang="en">
	<head>
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
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Product Issuance</title>
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">

		<!-- Custom CSS for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="js/outgoing.js"></script>
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
							message: 'Product Issuance', 
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
		
		<script>
		  $(function() {
			$('.thisProduct').autocomplete({
				minLength:2,
				source: "search.php"
			});
		  });

		</script>
		
		<script>
		  $(function() {
			$('#supplier').autocomplete({
				minLength:2,
				source: "searchSup.php"
			});
		  });

		</script>
		
	</head>

	<body>			
		<!--Retrieve Outgoing Data -->
		<?php include('functionalities/fetchOutgoing.php'); ?>
		
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
						<li class="active"><a href="userProdIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance<span class="sr-only">(current)</span></a></li>
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

				<?php
					foreach ($result as $item):
					$outid = $item["receiptNo"];
				?>
					
				<?php
					endforeach;
				?>
					
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div id="tableHeader">
							<h1 id="headers">PRODUCT ISSUANCE</h1>
							<table class="table">	
								<tr>
									<td>
										<br>
										<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#myModal" id="modbutt">Add Issued Products</button>					
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
					
						<div class="pages no-more-tables">
							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
				
							<!-- Table Display for Outgoing Entries -->
							<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								<thead>
								
									<tr>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Reference No.</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date Entered</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Handled By</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Branch</th>	
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Last Modified By</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">View Details</th>
									</tr>
								</thead>	
								<tbody>			
									<?php
										foreach ($result as $item):
										$outid = $item["receiptNo"];
										$outReceipt = $item["receiptNo"];							
									?>
										
									<tr id="centerData">
										<td data-title="Reference No."><?php echo $item["receiptNo"]; ?></td>
										<td data-title="Date Entered"><?php echo $item["outDate"]; ?></td>
										<td data-title="Employee"><?php echo $item["empName"]; ?></td>
										<td data-title="Branch"><?php echo $item["location"]; ?></td>
										<td data-title="User"><?php echo $item["userID"]; ?></td>
										<td>
											<a href="functionalities/userViewProdIssuance.php?outId=<?php echo $outReceipt; ?>">
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
					
							<!-- Modal - Add Outgoing Entry Form -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Add Outgoing Product</h4>
										</div>
										<div class="modal-body">
											<form action="" method="POST" onsubmit="return validateForm()">
												<h3> User </h3>
												<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
													
												<h3>Handled By</h3>
												<?php
													$query = $conn->prepare("SELECT empFirstName FROM employee ");
													$query->execute();
													$result = $query->fetchAll();
												?>
																
												<select class="form-control" id="addEmpl" name="emp">
													<?php foreach ($result as $row): ?>
														<option><?=$row["empFirstName"]?></option>
													<?php endforeach ?>
												</select> 
												
												<h3>Branch</h3>
												<?php
													$query = $conn->prepare("SELECT location FROM branch WHERE branchID > 0");
													$query->execute();
													$res = $query->fetchAll();
													?>
												
												<select class="form-control" id="addEntry" name="branch">
													<?php foreach ($res as $row): ?>
														<option><?=$row["location"]?></option>
													<?php endforeach ?>
												</select> 
												<br>
														
												<h5 id="multipleProd">Product/s</h5>
												<table class="table table-striped" id="dataTable" name="chk">
													<tbody>
														<tr>
															<td><input type="checkbox" name="chk"></TD>
															<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
															<td>	
																<div class="ui-widget">
																	<input class="thisProduct" name="prodItem">
																</div>
															</td>
																	
															<td>
																<input type="number" min="1" class="form-control" id ="addOutQty"  placeholder="Item Quantity" name="outQty[]">
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
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Add Outgoing Entry -->
		<?php include('functionalities/addOutgoing.php'); ?>
	</body>
</html>
