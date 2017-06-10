<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Monthly Product Deliver Summary</title>
		
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
		<link rel="shortcut icon" href="logo.jpg">

		<!-- Custom styles for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		
		<!--Javascript Files -->
		<script src="returns.js"></script>
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
							message: 'Monthly Incoming Reports', 
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
		
		<?php 
			$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
			if (!empty($sortByMonthDate)) { 
				$selectedMonth = $sortByMonthDate;
			} else {
				$selectedMonth = "None";
			}
			
			$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
			if (!empty($sortByYearDate)) { 
				$selectedYear = $sortByYearDate;
			} else {
				$selectedYear = "None";
			}
			
			/* For Date */
			$queryMonth = $conn->prepare("SELECT DISTINCT MONTHNAME(inDate) AS nowMonthDate, (SELECT DISTINCT YEAR(inDate) FROM incoming) AS nowYearDate, MONTH(curdate()) AS currentMonthDate 
								FROM incoming;");
			$queryMonth->execute();
			$resultMonth = $queryMonth->fetchAll();
			
			$queryYear = $conn->prepare("SELECT DISTINCT YEAR(inDate) AS nowYearDate FROM incoming");
			$queryYear->execute();
			$resultYear = $queryYear->fetchAll();
		?>
		
		<?php 
			/* For Incoming Product Overall Query */
			if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
				$query = $conn->prepare("SELECT prodName, SUM(inQty) AS totInQty
										FROM incoming 
										JOIN product ON incoming.prodID = product.prodID 
										WHERE MONTHNAME(inDate) = '$sortByMonthDate'
										AND YEAR(inDate) = $sortByYearDate
										GROUP BY prodName ORDER BY totInQty DESC");
				$query->execute();
				$result = $query->fetchAll();
			} else {
				$query = $conn->prepare("SELECT prodName, SUM(inQty) AS totInQty
										FROM incoming 
										JOIN product ON incoming.prodID = product.prodID 
										WHERE MONTHNAME(inDate) = MONTHNAME(CURDATE()) 
										AND YEAR(inDate) = YEAR(CURDATE())
										GROUP BY prodName ORDER BY totInQty DESC");
				$query->execute();
				$result = $query->fetchAll();
			}
			
			$query2 = $conn->prepare("SELECT DISTINCT MONTHNAME(inDate) AS nowMonthDate, (SELECT DISTINCT YEAR(inDate) FROM incoming) AS nowYearDate, MONTH(curdate()) AS currentMonthDate 
								FROM incoming;");
			$query2->execute();
			$result2 = $query2->fetchAll();
			
			$query3 = $conn->prepare("SELECT DISTINCT YEAR(inDate) AS nowYearDate FROM incoming");
			$query3->execute();
			$result3 = $query3->fetchAll();
		?>
		
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
								<li><a href="functionalities/addDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>	
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
				
				<?php
					foreach ($result as $item):
				?>
				
				<?php
					endforeach;
				?>
		
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">	
					<div id="contents">
						<div id="tableHeader">
							<h1 id="headers">Product Delivery Summary for the Month </h1>
							<table class="table">	
								<tr>
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
					
						<div class="pages no-more-tables">	
							<hr>						
							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
									
							<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								<thead>							
									<tr>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Name</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Total Quantity</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach ($result as $item):
									?>
									<tr id="centerData">
										<td data-title="Product Name"><?php echo $item["prodName"]; ?></td>
										<td data-title="Total Quantity"><?php echo $item["totInQty"]; ?></td>
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
	</body>
</html>
