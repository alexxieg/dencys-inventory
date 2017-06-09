<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Inventory</title>
		
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
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">

		<!-- Custom CSS for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">

		<!-- Javascript Files -->
		<script src="js/reorder.js"></script>
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
		
		<script src="datatables/FixedHeader/js/dataTables.fixedHeader.min.js"></script>
		
		<link href="datatables/media/css/dataTables.bootstrap.min.css"rel="stylesheet">
		<link href="datatables/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet">		
        <link href="datatables/Buttons/css/buttons.dataTables.min.css"rel="stylesheet">
		<link href="datatables/media/css/bootstrap.min.css"rel="stylesheet">
		<link href="datatables/FixedHeader/css/fixedHeader.bootstrap.min.css"rel="stylesheet">

		<!-- Datatables Script -->
		<script>
			$(document).ready(function() {
                var table = $('#myTable').DataTable( {
					fixedHeader: {
							header: true,
							headerOffset: 50
						},
                    dom: 'Bfrtip',
					lengthMenu: [
						[ 10, 25, 50, 100, -1 ],
						[ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
					],
                    buttons: [
                        {
                            title: 'Dencys Hardware and General Merchandise', 
							message: 'Inventory', 
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
	</head>

	<body>
		<!-- PHP code for fetching the data-->
		<?php include('functionalities/fetchInventory.php'); ?>
		
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
					<a class="navbar-brand" href="inventory.php">DENCY'S HARDWARE AND GENERAL MERCHANDISE</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li id="adminhead"><a href="#">Admin |</a></li>
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
								<li><a href="inventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="defectives.php"><i class="glyphicon glyphicon-list"></i> Defectives</a></li>
							</ul>
						</li>
						<li><a href="#"data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="prodDeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="prodIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="returnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="returnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="monthlyIncoming.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="monthlyOutgoing.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="manage">
								<li><a href="accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
								<li><a href="branches.php"><i class="glyphicon glyphicon-home"></i> Branches</a></li>
								<li><a href="employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
								<li><a href="suppliers.php"><i class="glyphicon glyphicon-user"></i> Suppliers</a></li>
								<li><a href="product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
								<li><a href="brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
								<li><a href="category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
							</ul>
						</li>
						<li><a href="backup.php"><i class="glyphicon glyphicon-cog"></i> System Settings</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->
		
				<?php
					foreach ($result as $item):
						$currQty = $item["qty"];
						$incID = $item["prodID"];
						if ($currQty <= $item["reorderLevel"]){
				?> 
							
				<?php	
					}else if ($currQty > $item["reorderLevel"]){
				?>
							
				<?php
					}	
				?>
								
				<?php
					endforeach;
				?>
							
				<!-- Main Container for Page Contents -->
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<div id="contents">
						<div class="pages no-more-tables">
							<div id="tableHeader">
								<h1 id="headers">INVENTORY</h1>	
								<table class="table">	
									<tr>
										<td width="50%">	
											<button type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#myModal">
												Products for Reorder
											</button>

											<a href="history.php">
												<button type="button" class="btn btn-info btn-md btnmod" id="modButt">
													Previous Inventory
												</button>
											</a>
												
											<a href="phyCountForm.php"> 
												<button type="button" class="btn btn-info btn-md btnmod" id="modButt">
													Physical Count
												</button>
											</a>
										</td>
										
										<?php 
											$location =  $_SERVER['REQUEST_URI']; 
										?>
											
										<td width="50%">
											<form action="<?php echo $location; ?>" method="POST">
												<label>View by Brand/Category</label>
												<select name="brand_Name">
													<option value="<?php echo $selectedBrand?>" SELECTED>Brand: <?php echo $filterBrand?></option>
													<option value="<?php echo $None?>">--None--</option>
													<?php foreach ($brandType as $row): ?>
														<option value="<?=$row["brandID"]?>"><?=$row["brandName"]?></option>
													<?php endforeach ?>
												</select>
											
												<select name="category_Name">
													<option value="<?php echo $selectedCategory?>" SELECTED>Category: <?php echo $filterCategory?></option>
													<option value="<?php echo $None?>">--None--</option>
													<?php foreach ($categoryType as $row2): ?>
														<option value="<?=$row2["categoryID"]?>"><?=$row2["categoryName"]?></option>
													<?php endforeach ?>
												</select>	
											
												<input type="submit" value="View" class="btn btn-success" id="viewButton" name="submit">
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
								
								<!-- Table for Inventory Data-->
								<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%">
									<thead>	
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
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product ID</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>	
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Beginning Quantity</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">IN</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">OUT</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Current Quantity</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Physical Count</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Reorder Level</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Unit</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Stock Card</th>
										</tr>
									</thead>
									<tbody>		
										<?php
											foreach ($result as $item):
											$incID = $item["prodID"];
											if ($item['qty'] <= $item["reorderLevel"]){
										?> 
										<tr style='background-color: #ff9999' id="centerData">
											<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
											<td><?php echo $item["prodName"]; ?></td>
											<td data-title="Beg. Quantity"><?php echo $item["beginningQty"]; ?></td>
											<td data-title="IN"><?php echo $item["totalIn"]; ?></td>
											<td data-title="OUT"><?php echo $item["totalOut"]; ?></td>
											<td data-title="Current Quantity"><?php echo $item["qty"] ?></td>
											<td data-title="Physical Count"><?php echo $item["physicalQty"]; ?></td>
											<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
											<td data-title="Unit"><?php echo $item["unitType"];?></td>
											<td data-title="Stock Card">
												<a href="ledger.php?incId=<?php echo $incID; ?>" target="_blank"> 
													<button type="button" class="btn btn-default" id="edBtn">
														<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
													</button>
												</a>
											</td>
										</tr>
											
										<?php	
											}else if ($item['qty'] > $item["reorderLevel"]){
										?>
										<tr id="centerData">
											<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
											<td><?php echo $item["prodName"]; ?></td>
											<td data-title="Beg. Quantity"><?php echo $item["beginningQty"]; ?></td>
											<td data-title="IN"><?php echo $item["totalIn"]; ?></td>
											<td data-title="OUT"><?php echo $item["totalOut"]; ?></td>
											<td data-title="Current Quantity"><?php echo $item["qty"] ?></td>
											<td data-title="Physical Count"><?php echo $item["physicalQty"]; ?></td>
											<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
											<td data-title="Unit"><?php echo $item["unitType"];?></td>
											<td data-title="Stock Card">
												<a href="ledger.php?incId=<?php echo $incID; ?>" target="_self"> 
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
									</tbody>	
								</table>
							</div>	
										
							<!-- Modal for Reorder Products Summary -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog modal-xl">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Products to be reordered</h4>
										</div>
										<div class="modal-body">
											<form action="functionalities/reorderPO.php" method="POST" onsubmit="return validateForm()">
												<?php
													$query = $conn->prepare("SELECT * FROM inventory LEFT JOIN product ON inventory.prodID = product.prodID
																			WHERE inventory.qty <= product.reorderLevel");
													$query->execute();
													$result = $query->fetchAll();
												?>	
												
												<table class="table table-bordered" id="tables">
													<tr>
														<th>Product ID</th>
														<th>Product Description</th>						
														<th>Current Quantity</th>
														<th>Reorder Level</th>
														<th>Unit</th>
														<th>Select for Reorder</th>
													</tr>
														
													<?php
														foreach ($result as $item):
													?>
														<tr>
														<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
														<td data-title="Description"><?php echo $item["prodName"]; ?></td>
														<td data-title="Current Quantity"><?php echo $item["qty"]; ?></td>
														<td data-title="Reorder Level"><?php echo $item["reorderLevel"]?></td>
														<td data-title="Unit"><?php echo $item["unitType"];?></td>
														<?php /** if($item["reorderStatus"] = 'false') {
															echo '<td data-title="Reorder Check"></td>';
														} else {
															echo '<td data-title="Reorder Check">PO Already reordered</td>';
														} */?>
														<td data-title='Reorder Check'>
															<?php 
															$reordStat = $item["reorderStatus"];
															$productID = $item["prodID"];
															if($reordStat == 'False') {
																echo "<input type='checkbox' class='chixbox' name='chkbox[]' value='$productID'>";
															} else {
																echo "PO Already reordered";
															} ?>
														</td>
														</tr>	
													<?php
														endforeach;
														?>
												</table>
												<div class="form-group">
													<input type="submit" value="Reorder" class="btn btn-success">
												</div>
											</form>
										</div>
												
										<div class="modal-footer">
										</div>
									</div>
								</div>
							</div>
						
						</div>
					</div>
					<!-- End of Main Container -->	
				</div>
			</div>
		</div>
	</body>
</html>
