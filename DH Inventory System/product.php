<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Products</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		
		<!-- Custom CSS for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
			
		<!-- Javascript Files -->
		<script src="js/product.js"></script>
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
							message: 'Product List', 
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
							'colvis','pageLength',

                    ],
                        columnDefs: [{
                            targets: -1,
                            visible: true
                            
                        }]
                } );
            } );		
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
		<!-- Retrieve Product Data -->
		<?php include('functionalities/fetchProduct.php'); ?>

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
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="inventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="functionalities/addDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
						<li class="active"><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
					</ul>
				</div>
				<!-- End of Sidebar -->
							
				<?php
					foreach ($result as $item):
					$proID = $item["prodID"];
				?>
									
				<?php
					endforeach;
				?>
		
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">		
					<div id="contents">
						<div class="pages no-more-tables">
							<div id="tableHeader">
								<table class="table table-striped table-bordered">	
									<h1 id="headers">PRODUCTS</h1>
									<table class="table">	
								   		<tr>
											<td>
												<button id="modbutt" type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#archive">View Archive</button>
												<button id="modbutt" type="button" class="btn btn-info btn-md btnmod" data-toggle="modal" data-target="#myModal">Add Product</button>
											</td>
											<?php 
												$location =  $_SERVER['REQUEST_URI']; 
											?>
											<td>
												<form action="<?php echo $location; ?>" method="POST">
													<label>Filter By Brand / Category</label>
													
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
													<input type="submit" value="Filter" class="btn btn-success" name="submit">
												</form>
											</td>
										</tr>
									</table>
								</table>
							</div>

							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
							
							<!-- Table Display for Products -->
							<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								<thead>
									<tr id="centerData">
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											<div id="tabHead">Product ID</div>
										</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											<div id="tabHead">Product Description</div>							
										</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											<div id="tabHead">Brand</div>
										</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											<div id="tabHead">Category</div>
										</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											Unit
										</th>
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											<div id="tabHead">Price</div>
										</th>					
										<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
											<div id="tabHead">Action</th>
									</tr>
								</thead>
								<tbody>

									<?php
										foreach ($result as $item):
										$proID = $item["prodID"];
									?>
									<tr id="centerData">
										<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
										<td data-title="Description"><?php echo $item["prodName"]; ?></td>
										<td data-title="Brand"><?php echo $item["brandName"]; ?></td>
										<td data-title="Category"><?php echo $item["categoryName"]; ?></td>
										<td data-title="Unit"><?php echo $item["unitType"];?></td>
										<td data-title="Price"><?php echo $item["price"]; ?></td>
										<td>			
											<a href="functionalities/editProd.php?proId=<?php echo $proID; ?>">	
												<button type="button" class="btn btn-default" id="edBtn">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
												</button>
											</a>	
											<a href="functionalities/removeProduct.php?proId=<?php echo $proID; ?>">
												<button type="button" class="btn btn-default" id="edBtn" onclick="return confirm('Are you sure you want to archive this product?');" id="delBtn1">
													<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
												</button>
											</a>
										</td>				
									</tr>	
									<?php
										endforeach;
									?>
								</tbody>	
							</table>
								
							<!-- Modal - New Product Form -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Add New Product</h4>
										</div>
										<div class="modal-body">
											<form action="" method="POST" onsubmit="return validateForm()">
												<h3>Product Name</h3>
												<input type="text" class="form-control" id ="addProdName" placeholder="Name" name="prodItem"> <br>
														
												<h3>Quantity</h3>
												<input type="number" min="0" class="form-control" id="addProdQty" placeholder="Item Quantity" name="prodQty"> <br>
												
												<h3>Category</h3>
												<?php
													$query = $conn->prepare("SELECT categoryName FROM category ");
													$query->execute();
													$res = $query->fetchAll();
												?>
															
												<select class="form-control" id="addEntry" name="prodCateg">
													<?php foreach ($res as $row): ?>
														<option value = "<?=$row["categoryName"]?>"><?=$row["categoryName"]?></option>
													<?php endforeach ?>
												</select> 
												<br>
														
												<h3>Brand</h3>
												<?php
													$query = $conn->prepare("SELECT brandName FROM brand ");
													$query->execute();
													$res = $query->fetchAll();
												?>
															
												<select class="form-control" id="addEntry" name="prodBrand">
													<?php foreach ($res as $row): ?>
														<option value = "<?=$row["brandName"]?>"><?=$row["brandName"]?></option>
													<?php endforeach ?>
												</select> 
												<br>
																
												<h3>Unit</h3>
													<select class="form-control" id="addEntry" name="prodUnit">
														<option value = "Box/es">Box/es</option>
														<option value = "Kilogram/s">Kilogram/s</option>
														<option value = "Piece/s">Piece/s</option>
														<option value = "Set/s">Set/s</option>
														<option value = "Yard/s">Yard/s</option>
														<option value = "Roll/s">Roll/s</option>
													</select> 
															
												<h3>Price</h3>
												<input type="number" min="1" class="form-control" id ="addPrice" placeholder="Unit Price" name="prodPrice"> <br>
												
												<h3>Reorder Level</h3>
												<input type="number" class="form-control" id ="addReorderLvl" placeholder="Reorder Level" name="prodRO"> <br>
														
												<div class="modFoot">
													<span>
														<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn"> Cancel</button>
													</span>
													<span>
														<input type="submit" value="Submit" class="btn btn-success" name="addProd" id="sucBtn">
													</span>
												</div>			
											</form>

											<div class="modal-footer">
											</div>
											</div>
										</div>
									</div>
								</div>
									
								<!-- Modal - Product Archive -->
								<div class="modal fade" id="archive" role="dialog">
									<div class="modal-dialog modal-xl">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Archived Categories</h4>
											</div>
											<div class="modal-body">
												<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
												
													<!-- Retrieve Product Data -->
													<?php
														$query = $conn->prepare("SELECT product.prodID, product.prodName, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel
																					FROM product INNER JOIN brand ON product.brandID = brand.brandID INNER JOIN category ON product.categoryID = category.categoryID
																					WHERE product.status = 'Inactive'
																					ORDER BY prodID");
														$query->execute();
														$result = $query->fetchAll();
													?>
													
													<thead>
														<tr id="centerData">
															<th>
																<div id="tabHead">Product ID</div>
															</th>
															<th>
																<div id="tabHead">Product Description</div>							
															</th>
															<th>
																<div id="tabHead">Brand</div>
															</th>
															<th>
																<div id="tabHead">Category</div>
															</th>
															<th>
																<div id="tabHead">Unit</div>
															</th>
															<th>
																<div id="tabHead">Price</div>
															</th>					
														</tr>
													</thead>
													<tbody>
														
														<?php
															foreach ($result as $item):
															$proID = $item["prodID"];
														?>	
														<tr id="centerData">
															<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
															<td data-title="Description"><?php echo $item["prodName"]; ?></td>
															<td data-title="Brand"><?php echo $item["brandName"]; ?></td>
															<td data-title="Category"><?php echo $item["categoryName"]; ?></td>
															<td data-title="Unit"><?php echo $item["unitType"];?></td>
															<td data-title="Price"><?php echo $item["price"]; ?></td>
															<td>
																<a href="functionalities/restoreProduct.php?proId=<?php echo $proID; ?>">
																	<button type="button" class="btn btn-default" id="edBtn" onclick="return confirm('Are you sure you want to restore this entry?');" id="delBtn1">
																		Restore
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
		</div>
		
		<!-- Add New Product -->
		<?php include('functionalities/addProduct.php'); ?>
	</body>
</html>