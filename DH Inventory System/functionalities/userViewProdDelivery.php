<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
		
		<!-- Login Session -->
		<?php 
			session_start();
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) && $role!="user") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>View Product Delivery</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		<link href="../css/printFunction.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="../js/incoming.js"></script>
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
		
		<script src="../datatables/FixedHeader/js/dataTables.fixedHeader.min.js"></script>
		
		<link href="../datatables/media/css/dataTables.bootstrap.min.css"rel="stylesheet">
		<link href="../datatables/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet">		
        <link href="../datatables/Buttons/css/buttons.dataTables.min.css"rel="stylesheet">
		<link href="../datatables/media/css/bootstrap.min.css"rel="stylesheet">
		<link href="../datatables/FixedHeader/css/fixedHeader.bootstrap.min.css"rel="stylesheet">

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
							message: 'Product Delivery Details', 
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
			$incID= $_GET['incId'];
			$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, CONCAT(incoming.inQty,' ', product.unitType) AS inQty, incoming.inID, incoming.inType, incoming.inDate, MONTHNAME(incoming.inDate) AS nowMonthDate, YEAR(inDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, incoming.receiptNo, incoming.receiptDate, suppliers.supplier_name, incoming.status, incoming.inRemarks, incoming.userID 
									FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID INNER JOIN suppliers ON incoming.supID = suppliers.supID
									WHERE incoming.receiptNo = '$incID'
									ORDER BY inID DESC;");
			$query->execute();
			$result = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, incoming.inID, incoming.inType, CONCAT(incoming.inQty,' ', product.unitType) AS inQty, incoming.inDate, MONTHNAME(incoming.inDate) AS nowMonthDate, YEAR(inDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, incoming.receiptNo, incoming.receiptDate, suppliers.supplier_name, incoming.status, incoming.inRemarks, incoming.userID 
									FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID INNER JOIN suppliers ON incoming.supID = suppliers.supID
									WHERE incoming.receiptNo = '$incID'
									ORDER BY inID DESC;");
			$query2->execute();
			$result2 = $query2->fetchAll();
			
			$receiptNum = current($conn->query("SELECT incoming.receiptNo FROM incoming WHERE incoming.receiptNo = '$incID'")->fetch());
			$receiptDate = current($conn->query("SELECT incoming.receiptDate FROM incoming WHERE incoming.receiptNo = '$incID'")->fetch());
			$supplier = current($conn->query("SELECT suppliers.supplier_name FROM incoming INNER JOIN suppliers ON incoming.supID = suppliers.supID WHERE incoming.receiptNo = '$incID'")->fetch());
			$employee = current($conn->query("SELECT employee.empFirstName FROM incoming JOIN employee ON incoming.empID = employee.empID WHERE incoming.receiptNo = '$incID'")->fetch());
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
					<a class="navbar-brand" href="../userinventory.php">Dency's Hardware and General Merchandise</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li id="adminhead"><a href="#">User |</a></li>
						<li id="loghead"><a href="../Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
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
						<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="../userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="../userDefectives.php"><i class="glyphicon glyphicon-list"></i> Defectives</a></li>
							</ul>
						</li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../userPurchaseOrders.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="../userProdIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="../userReturnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="../userreturnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="../userbranchreport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="../usermonthlyin.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="../usermonthlyout.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li><a href="../usersuppliers.php"><i class="glyphicon glyphicon-user"></i> Suppliers</a></li>
						<li><a href="../userproduct.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->
  
				<?php
					foreach ($result as $item):
						$incID = $item["receiptNo"];
						$incRec = $item["receiptNo"];
				?>
				<?php
					endforeach;
				?>
  
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div id="tableHeader">
							<h1 id="headers">PRODUCT DELIVERY DETAILS</h1>
						</div>
						
						<hr>
						
						<a href="../userproductdeliveries.php">
								<input type="button" class="btn btn-danger" id="backButton" value="GO BACK" data-dismiss="modal" onclick="this.form.reset()">
						</a>
						
						<a href="userEditIn.php?incId=<?php echo $incID; ?>"> 
							<button type="button" class="btn btn-default" id="modButt">
								EDIT ENTRY
							</button>
						</a>

						<hr>
							
						<!-- Table Display for Product Delivery Details -->
						<table class="table table-striped table-bordered">
							<tr>
								<td>
									Receipt No:
									<?php echo $incID;?>
								</td>
								<td>
									Receipt Date:
									<?php echo  $receiptDate;?> 
								</td>
								<td>
									Supplier: 
									<?php echo $supplier ?>
								</td>
								<td> 
									Received by:
									<?php echo $employee ?>
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
						<br> 
							
						<!-- Table Display for Product Delivery Content -->
						<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
							<thead>	
								<tr>
									<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product ID</th>
									<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Product Name</th>
									<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Quantity</th>
									<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Status</th>
									<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Delivery Type</th>
									<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Remarks</th>
								</tr>
							</thead>
							<tbody>					
								<?php
									foreach ($result as $item):
									$incID = $item["inID"];
									$incRec = $item["receiptNo"];
								?>
									
								<tr id="centerData">
									<td data-title="Product ID"><?php echo $item["prodID"];?></td>
									<td data-title="Description"><?php echo $item["prodName"]; ?></td>
									<td data-title="Quantity"><?php echo $item["inQty"]; ?></td>
									<td data-title="Status"><?php echo $item["status"]; ?></td>
									<td data-title="Type"><?php echo $item["inType"]; ?></td>
									<td data-title="Remarks"><?php echo $item["inRemarks"]; ?></td>	
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
	</body>
</html>