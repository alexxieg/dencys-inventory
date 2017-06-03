<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>View Warehouse Return Entry</title>
	
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
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		<link href="../css/printFunction.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="../js/returns.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>		
		<script src="../js/bootstrap.min.js"></script>
		
		<!-- Datatables CSS and JS Files -->
		<script src="../datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="../datatables/media/js/dataTables.bootstrap.min.js"></script>
		<script src="../datatables/Buttons/js/dataTables.buttons.min.js"></script>
		<script src="../datatables/Buttons/js/buttons.bootstrap.min.js"></script>
		<script src="../datatables/media/js/buttons.html5.min.js"></script>
		<script src="../datatables/Buttons/js/buttons.print.min.js"></script>
		<script src="../datatables/Buttons/js/buttons.colVis.min.js"></script>
		<link href="../datatables/media/css/dataTables.bootstrap.min.css"rel="stylesheet">
		<link href="../datatables/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet">		
        <link href="../datatables/Buttons/css/buttons.dataTables.min.css"rel="stylesheet">

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
							message: 'Warehouse Return Details', 
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
		<!-- Retrieved Selected Entry Details -->
		<?php
			$retID= $_GET['retId'];
			$query = $conn->prepare("SELECT product.prodID, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark, returns.userID 
					FROM returns INNER JOIN product ON returns.prodID = product.prodID
					WHERE returns.receiptNo = '$retID';");
			$query->execute();
			$result = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT product.prodID, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark, returns.branchID, returns.userID, returns.receiptNo  
					FROM returns INNER JOIN product ON returns.prodID = product.prodID 
					WHERE receiptNo = '$retID' ");
			$query2->execute();
			$result2 = $query2->fetchAll();
		
			$receiptNum = current($conn->query("SELECT returns.receiptNo FROM returns WHERE returns.receiptNo = '$retID'")->fetch());
			$date = current($conn->query("SELECT returns.returnDate FROM returns WHERE returns.receiptNo = '$retID'")->fetch());
			$branch = current($conn->query("SELECT location FROM returns Join branch ON returns.branchID = branch.branchID WHERE returns.receiptNo = '$retID'")->fetch());
			$employee = current($conn->query("SELECT CONCAT(empFirstName, ' ', empLastName) AS empName FROM returns INNER JOIN employee ON returns.empID = employee.empID WHERE returns.receiptNo = '$retID'")->fetch());
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
					<a class="navbar-brand" href="../inventory.php">DENCY'S HARDWARE AND GENERAL MERCHANDISE</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					<li id="adminhead"><a href="#">Admin |</a></li>
						<li id="loghead"><a href="../Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
					</ul>
			</div>
		</nav>
		<!-- End of Top Main Header -->

		<div class="container-fluid">
			<div class="row navbar-collapse">
				<!-- Sidebar -->
				<div id="sidebarCol" class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="../inventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="addDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../prodDeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="prodIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="../returnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="../returnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="../branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="../monthlyIncoming.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="../monthlyOutgoing.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="manage">
								<li><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
								<li><a href="../branches.php"><i class="glyphicon glyphicon-home"></i> Branches</a></li>
								<li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
								<li><a href="../suppliers.php"><i class="glyphicon glyphicon-user"></i> Suppliers</a></li>
								<li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
								<li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
								<li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
							</ul>
						</li>
						<li><a href="../backup.php"><i class="glyphicon glyphicon-cog"></i> System Settings</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->	
				
				<?php
					foreach ($result2 as $item):
					$returnID = $item["receiptNo"];
				?>
				
				<?php
					endforeach;
				?>
										
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div id="tableHeader">
							<h1 id="headers">WAREHOUSE RETURN DETAILS</h1>
								
							<hr>
							
							<a href="../returnsWarehouse.php">
								<input type="button" class="btn btn-danger" id="backButton" value="GO BACK" data-dismiss="modal" onclick="this.form.reset()">
							</a>
									
							<a href="editRetWh.php?retId=<?php echo $retID; ?>"> 
								<button type="button" class="btn btn-default">
									EDIT ENTRY
								</button>
							</a>
							
							<hr>
							
							<!-- Table Display for Warehouse Returns Details -->
							<table class="table table-striped table-bordered">
								<tr>
									<td>
										Reference No:
										<?php echo $receiptNum;?> 
									</td>
									<td>
										Return Date:
										<?php echo $date; ?>
									</td>
									<td>
										Returned From:
										<?php echo $branch;?> 
									</td>
									<td> 
										Handled by:
										<?php echo $employee;?>
									</td>
								</tr>									
							</table>
							<!-- End of Table Display -->
						</div>
						
						<hr>
						
						<div class="pages no-more-tables">
							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
							
							<!-- Table Display for Warehouse Returns Content -->
							<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								<thead>
									<tr>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product ID</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Name</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Quantity</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Remarks</th>
									</tr>
								</thead>
								
								<tbody>
									<?php
										foreach ($result as $item):
										$returnID = $item["returnID"];
									?>
										
									<tr id="centerData">
										<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
										<td data-title="Description"><?php echo $item["prodName"]; ?></td>
										<td data-title="Quantity"><?php echo $item["returnQty"]; ?></td>
										<td data-title="Remarks"><?php echo $item["returnRemark"]; ?></td>
									</tr>
											
									<?php
										endforeach;
									?>
								</tbody>	
							</table>
							<!-- End of Table Display -->
							
						</div>				
					</div>
				</div>
			</div>
		</div>
	</body>
</html>