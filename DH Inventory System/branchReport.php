<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Product Issuance Report</title>
		
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
		
		<!-- Custom styles for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		
		<!--Javascript Files -->
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
		<link href="datatables/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet">		
        <link href="datatables/Buttons/css/buttons.dataTables.min.css"rel="stylesheet">
		
		<!-- Datatables Script-->
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
							message: 'Overall Outgoing Reports ', 
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
			
			$(document).ready(function() {
                $('#myTable1').DataTable( {
                    dom: 'Bfrtip',
					lengthMenu: [
						[ 10, 25, 50, 100, -1 ],
						[ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
					],
                    buttons: [
                        {
                            title: 'Dencys Hardware and General Merchandise', 
							message: 'Outgoing Products in Camdas', 
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

			$(document).ready(function() {
                $('#myTable2').DataTable( {
                    dom: 'Bfrtip',
					lengthMenu: [
						[ 10, 25, 50, 100, -1 ],
						[ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
					],
                    buttons: [
                        {
                            title: 'Dencys Hardware and General Merchandise', 
							message: 'Outgoing Products in Hilltop', 
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

			$(document).ready(function() {
                $('#myTable3').DataTable( {
                    dom: 'Bfrtip',
					lengthMenu: [
						[ 10, 25, 50, 100, -1 ],
						[ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
					],
                    buttons: [
                        {
                            title: 'Dencys Hardware and General Merchandise', 
							message: 'Outgoing Products in KM4', 
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

			$(document).ready(function() {
                $('#myTable4').DataTable( {
                    dom: 'Bfrtip',
					lengthMenu: [
						[ 10, 25, 50, 100, -1 ],
						[ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
					],
                    buttons: [
                        {
                            title: 'Dencys Hardware and General Merchandise', 
							message: 'Outgoing Products in KM5', 
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

			$(document).ready(function() {
                $('#myTable5').DataTable( {
                    dom: 'Bfrtip',
					lengthMenu: [
						[ 10, 25, 50, 100, -1 ],
						[ '10 rows', '25 rows', '50 rows', '100 rows', 'Show all' ]
					],
                    buttons: [
                        {
                            title: 'Dencys Hardware and General Merchandise', 
							message: 'Outgoing Products in San Fernando, La Union', 
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
		<?php include('functionalities/fetchBranchReport.php'); ?>	

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
			<div class="row navbar-collapse">
			
				<!-- Sidebar -->
				<div id="sidebarCol" class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="inventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="defectives.php"><i class="glyphicon glyphicon-list"></i> Defectives</a></li>
							</ul>
						</li>	
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="prodDeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="prodIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li ><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="returnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="returnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
				
		 		<!-- PHP code for the datatables data -->
				<?php
					foreach ($result6 as $item6):
				?>
				
				<?php
					endforeach;
				?>	
					
				<?php
					foreach ($result1 as $item):
				?>	
				<?php
					endforeach;
				?>	
				
				<?php
					foreach ($result2 as $item2):
				?>				
				<?php
					endforeach;
				?>
				
				<?php
					foreach ($result3 as $item3):
				?>
				<?php
					endforeach;
				?>
				
				<?php
					foreach ($result4 as $item4):
				?>
				<?php
					endforeach;
				?>								
				
				<?php
					foreach ($result5 as $item5):
				?>
				<?php
					endforeach;
				?>				
				
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">	
					<div id="contents">
						<div class="pages no-more-tables">							
							<div class="container">	
								<h2 id="outheader">Summary of Products Issued per Branch</h2>

								<ul class="nav nav-pills" id="navjust">
									<li>
										<a href="#mainOutSummary" data-toggle="tab">
											<span>Issuance</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryCamdas" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>Camdas</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryHilltop" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">
											<span>Hilltop</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryKM4" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>KM 4</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryKM5" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>KM 5</span>
										</a>
									</li>
									<li>
										<a href="#outSummarySF" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>San Fernando</span>
										</a>
									</li>
								</ul>
				
						<div class="pages">
							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
							
							<h3 id="reportHeader">View Previous Reports</h3>
							<form class="form-inline" action="" method="post">
								<table>
									<tr>
										<td>
											<label id="labelFormat">FROM</label>     
										</td>
										<td>
											<div class="form-group">
												<select name="firstDateMonthName" class="form-control">
													<option value="<?php echo $firstSelectedMonth ?>" SELECTED>Month: <?php echo $firstSelectedMonth ?></option>
													<?php foreach ($resultMonth as $rowMonth): ?>
														<option value="<?=$rowMonth["nowMonthDate"]?>"><?=$rowMonth["nowMonthDate"]?></option>
													<?php endforeach ?>
												</select>
											</div>
										</td>	
										<td><div class="form-group">
												<select name="firstDateDayName" class="form-control">
													<option value="<?php echo $firstSelectedDay ?>" SELECTED>Day: <?php echo $firstSelectedDay ?></option>
													<?php foreach ($resultDay as $rowDay): ?>
														<option value="<?=$rowDay["nowDayDate"]?>"><?=$rowDay["nowDayDate"]?></option>
													<?php endforeach ?>
												</select>
											</div>
										</td>
										<td>
										<div class="form-group">
												<select name="firstDateYearName" class="form-control">
													<option value="<?php echo $firstSelectedYear ?>">Year: <?php echo $firstSelectedYear ?></option>
													<?php foreach ($resultYear as $rowYear): ?>
														<option value="<?=$rowYear["nowYearDate"]?>"><?=$rowYear["nowYearDate"]?></option>
													<?php endforeach ?>
												</select>
											</div>	
										</td>
									</tr>
									<tr>	
										<td>
											<label id="labelFormat">TO</label>
										</td>
										<td>
											<div class="form-group">
												<select name="secondDateMonthName" class="form-control">
													<option value="<?php echo $secondSelectedMonth ?>" SELECTED>Month: <?php echo $secondSelectedMonth ?></option>
													<?php foreach ($resultMonth as $rowMonth): ?>
														<option value="<?=$rowMonth["nowMonthDate"]?>"><?=$rowMonth["nowMonthDate"]?></option>
													<?php endforeach ?>
												</select>
											</div>
										</td>
										<td>
											<div class="form-group">
												<select name="secondDateDayName" class="form-control">
													<option value="<?php echo $secondSelectedDay ?>" SELECTED>Day: <?php echo $secondSelectedDay ?></option>
													<?php foreach ($resultDay as $rowDay): ?>
														<option value="<?=$rowDay["nowDayDate"]?>"><?=$rowDay["nowDayDate"]?></option>
													<?php endforeach ?>
												</select>
											</div>
										</td>
										<td>	
											<div class="form-group">
												<select name="secondDateYearName" class="form-control">
													<option value="<?php echo $secondSelectedYear ?>">Year: <?php echo $secondSelectedYear ?></option>
													<?php foreach ($resultYear as $rowYear): ?>
														<option value="<?=$rowYear["nowYearDate"]?>"><?=$rowYear["nowYearDate"]?></option>
													<?php endforeach ?>
												</select>
											</div>	
										</td>
									</tr>
								</table>
							<div class="form-group">
								<input type="submit" value="View" id="viewButtonReport" class="btn btn-success" name="submit">
							</div>
							</form>		
						
							<br>
							<br>
							<hr>
						
							<div class="tab-content clearfix" id="test">
								<div class="tab-pane active" id="mainOutSummary">
									<!-- Overall Outgoing Branch -->
									
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">		
											<thead>
												<tr id="centerData">
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Location</th>
													<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result6 as $item6):
												?>
												<tr id="centerData">
													<td data-title="Location"><?php echo $item6["location"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item6["TOTAL_QUANTITY"]; ?></td>
												</tr>	
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
													
									<!-- Camdas Outgoing Summary -->
									<div class="tab-pane" id="outSummaryCamdas">
										<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div id="myTable_length" class="dataTables_length">
												<div id="myTable_filter" class="dataTables_filter">
												</div>
											</div>
											
											<h3>Products Issued in Camdas:</h3>
											<table id="myTable1" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">		
												<thead>
													<tr id="centerData">
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date Issued</th>	
													</tr>
												</thead>
												<tbody>
													<?php
														foreach ($result1 as $item):
													?>
													<tr id="centerData">
														<td data-title="Product Description"><?php echo $item["prodName"]; ?></td>
														<td data-title="Total Quantity"><?php echo $item["outQty"]; ?></td>
														<td data-title="Date Issued"><?php echo $item["outDate"]; ?></td>
													</tr>
													<?php
														endforeach;
													?>
												</tbody>
											</table>
										</div>
									</div>
			
									<!-- Hilltop Outgoing Summary -->
									<div class="tab-pane" id="outSummaryHilltop">									
										<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div id="myTable_length" class="dataTables_length">
												<div id="myTable_filter" class="dataTables_filter">
												</div>
											</div>
											
											<h3>Products Issued in Hilltop:</h3>
											<table id="myTable2" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
												<thead>
													<tr id="centerData">
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date Issued</th>	
													</tr>
												</thead>
												<tbody>
													<?php
														foreach ($result2 as $item2):
													?>
													<tr id="centerData">
														<td data-title="Product Description"><?php echo $item2["prodName"]; ?></td>
														<td data-title="Total Quantity"><?php echo $item2["outQty"]; ?></td>
														<td data-title="Total Quantity"><?php echo $item["outDate"]; ?></td>
													</tr>
													<?php
														endforeach;
													?>
												</tbody>
											</table>
										</div>
									</div> 
									
									 <!-- KM 4 Outgoing Summary-->
									<div class="tab-pane" id="outSummaryKM4">
										<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div id="myTable_length" class="dataTables_length">
												<div id="myTable_filter" class="dataTables_filter">
												</div>
											</div>
											
											<h3>Products Issued in KM4:</h3>
											<table id="myTable3" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
												<thead>
													<tr id="centerData">
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date Issued</th>	
													</tr>
												</thead>
												<tbody>
													<?php
														foreach ($result3 as $item3):
													?>
													<tr id="centerData">
														<td data-title="Product Description"><?php echo $item3["prodName"]; ?></td>
														<td data-title="Total Quantity"><?php echo $item3["outQty"]; ?></td>
														<td data-title="Date Issued"><?php echo $item["outDate"]; ?></td>
													</tr>
														
													<?php
														endforeach;
													?>
												</tbody>
											</table>
										</div>
									</div>
									
									
									<!-- KM5 Outgoing Summary-->
									<div class="tab-pane" id="outSummaryKM5">
										<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div id="myTable_length" class="dataTables_length">
												<div id="myTable_filter" class="dataTables_filter">
												</div>
											</div>
											<h3>Products Issued in KM5:</h3>
											<table id="myTable4" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
												<thead>
													<tr id="centerData">
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date Issued</th>	
													</tr>
												</thead>
												<tbody>
													<?php
														foreach ($result4 as $item4):
													?>
													<tr id="centerData">
														<td data-title="Product Description"><?php echo $item4["prodName"]; ?></td>
														<td data-title="Total Quantity"><?php echo $item4["outQty"]; ?></td>
														<td data-title="Date Issued"><?php echo $item["outDate"]; ?></td>
													</tr>
														
													<?php
														endforeach;
													?>
												</tbody>
											</table>
										</div>
									</div>
											
									<!-- San Fernando Outgoing Summary -->
									<div class="tab-pane" id="outSummarySF">
										<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
											<div id="myTable_length" class="dataTables_length">
												<div id="myTable_filter" class="dataTables_filter">
												</div>
											</div>
											
											<h3>Products Issued in San Fernando, La Union:</h3>
											<table id="myTable5" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
												<thead>
													<tr id="centerData">
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Description</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
														<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Date Issued</th>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach ($result5 as $item5):
													?>
													<tr id="centerData">
														<td data-title="Product Description"><?php echo $item5["prodName"]; ?></td>
														<td data-title="Total Quantity"><?php echo $item5["outQty"]; ?></td>
														<td data-title="Date Issued"><?php echo $item["outDate"]; ?></td>
													</tr>
														
													<?php
														endforeach;
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>									
	</body>
</html>
