<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Create Purchase Order</title>

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

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">
		
		<!-- Custom CSS for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
			
		<!-- Javascript Files -->
		<script src="../js/po.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>
		<script src="../alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="../alertboxes/sweetalert2.min.css">
		
		<!-- Autocomplete Script -->
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<script src="../js/jquery-1.9.1.js"></script>
		<script src="../js/jquery-ui.js"></script>
		
		<!-- Datatables CSS and JS Files -->
		<script src="../datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="../datatables/media/js/dataTables.bootstrap.min.js"></script>
		<script src="../datatables/Buttons/js/dataTables.buttons.min.js"></script>
		<script src="../datatables/Buttons/js/buttons.bootstrap.min.js"></script>
		<script src="../datatables/media/js/buttons.html5.min.js"></script>
		<script src="../datatables/Buttons/js/buttons.print.min.js"></script>
		<script src="../datatables/Buttons/js/buttons.colVis.min.js"></script>

		<link href="../datatables/media/css/dataTables.bootstrap.min.css"rel="stylesheet">
		<link href="../datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
		<link href="../datatables/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet">		

        <link href="../datatables/Buttons/css/buttons.dataTables.min.css"rel="stylesheet">
        <script src="../datatables/Buttons/js/buttons.print.min.js"></script>
		<script src="../datatables/Buttons/js/buttons.colVis.min.js"></script>

		<!-- Datatables Script -->
		<script>
			$(document).ready(function() {
				$('#myTable').DataTable( {
					dom: 'Bfrtip',
					buttons: [
						{
							extend: 'print',
							exportOptions: {
								columns: ':visible'
							}
						},
						'colvis'
					],
					columnDefs: [ {
						targets: -1,
						visible: true
					} ]
				} );
			} );

		</script>
		
		<script>
		  $(function() {
			$('.prodItem').autocomplete({
				minLength:2,
				source: "../search.php"
			});
		  });
		</script>
		
		<script>
		  $(function() {
			$('#supplier').autocomplete({
				minLength:2,
				source: "../searchSup.php"
			});
		  });

		</script>
			
	</head>

	<body>
		<!-- Retrieve Incoming Data -->
		<?php include('fetchPurchaseOrders.php');?>
		
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
					<a class="navbar-brand" href="../userinventory.php">DENCY'S HARDWARE AND GENERAL MERCHANDISE</a>
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

		<div class="container-fluid" >
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<!-- Sidebar -->
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory </span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="../userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="userAddDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
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
						$po = $item["poNumber"];
				?>
							
				<?php
					endforeach;
				?>
					
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div class="pages no-more-tables">
							<h1 id="headers">Add Purchase Order</h1>
							<form action="" method="POST" onsubmit="return validateForm()"><td>
								<td>
									<h3> User </h3>
									<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
								</td>																									
								
								<h3>Supplier</h3>  
								<div class="ui-widget">
									<input id="supplierName" name="supplier" placeholder="Supplier">
								</div>
								<br>
										
								<h5>Product/s</h5>
								<table class="table table-striped" id="dataTable" name="chk">				
									<tbody>
										<?php
											$useThisID = $_POST["chkbox"];
											$countChkBox = count($useThisID);
											for ($index = 0; $index < $countChkBox; $index++) {
												$productID = $useThisID[$index];
												$reorderQuery = $conn->prepare("SELECT * FROM inventory LEFT JOIN product ON inventory.prodID = product.prodID
																		WHERE inventory.qty <= product.reorderLevel AND inventory.prodID = '$productID'");
												$reorderQuery->execute();
												$reorderResult = $reorderQuery->fetchAll();
										?>
											<?php foreach ($reorderResult as $row): ?>
												<tr>
													<td><input type="checkbox" name="chk"></td>
														<td><input type="hidden" value="1" name="num" id="orderdata">1</td>
													<td>	
														<div class="ui-widget">
															<input type="text" class="prodItem" name="prodItem[]" id="prod" placeholder="<?php echo $row["prodName"]; ?>" value="<?php echo $row["prodName"]; ?>">
														</div>
													</td>
																
													<td>
														<input type="number" min="1" class="form-control" id ="addQty"  
														value="<?php 
														if ($row["qty"] < ($row["reorderLevel"]/2)) {
															echo $row["reorderLevel"] + 5; 
														} else if($row["qty"] = ($row["reorderLevel"])){
															echo 5;
														} else {
															echo $row["reorderLevel"];
														}
														?>" name="qty[]">
													</td>
												</tr>
											<?php endforeach ?>
										<?php } ?>
									</tbody>
								</table>
								
								<br>
								
								<div class="modFoot">
									<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
									<span><button type="button" value="Delete Row" class="btn btn-default" onclick="deleteRow('dataTable')">Remove from List</button></span>
									<br>
									<br>
									
									<span>
										<a href="../userinventory.php">
											<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
										</a>
									</span>
									<span><input type="submit" name="submit" value="Submit" class="btn btn-success" id="sucBtn"></span>
								</div>
							</form> 	
						
							<div class="modal-footer">
							</div>								

						</div>
					</div>		  
				</div>
			</div>
		</div>
		
		<?php include('addReoPO.php');?>
	</body>
</html>