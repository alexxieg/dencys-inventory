<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Add Physical Count</title>
	
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
		<link rel="shortcut icon" href="logo.jpg">

		<!-- Custom styles for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">

		<!-- Javascript Files -->
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
						[ '10 rows', '25 rows', '50 rows', '100 rows','Show all' ]
					],
					buttons: [
						'pageLength'
					]
				} );
			} );		
		</script>
	</head>
	  
	<body>
	  	<!-- Retrieve Data -->
		<?php
			$query = $conn->prepare("SELECT brandID, brandName FROM brand WHERE status = 'Active' ");
			$query->execute();
			$result = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT categoryID, categoryName FROM category WHERE status = 'Active' ");
			$query2->execute();
			$result2 = $query2->fetchAll();
			
			$sortByBrand = (isset($_REQUEST['brand_Name']) ? $_REQUEST['brand_Name'] : null);
			$sortByCategory = (isset($_REQUEST['category_Name']) ? $_REQUEST['category_Name'] : null);
			
			if (!empty($sortByBrand)) { 
				$query3 = $conn->prepare("SELECT product.prodID, product.prodName, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel, inventory.qty, inventory.physicalQty, inventory.remarks
										FROM product 
										INNER JOIN brand ON product.brandID = brand.brandID 
										INNER JOIN category ON product.categoryID = category.categoryID 
										INNER JOIN inventory ON product.prodID = inventory.prodID
										WHERE product.status = 'Active' AND product.brandID = '$sortByBrand'
										ORDER BY prodID");
				$query3->execute();
				$result3 = $query3->fetchAll();
			} else if (!empty($sortByCategory)) {
				$query3 = $conn->prepare("SELECT product.prodID, product.prodName, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel, inventory.qty, inventory.physicalQty, inventory.remarks
										FROM product 
										INNER JOIN brand ON product.brandID = brand.brandID 
										INNER JOIN category ON product.categoryID = category.categoryID 
										INNER JOIN inventory ON product.prodID = inventory.prodID
										WHERE product.status = 'Active' AND product.categoryID = '$sortByCategory'
										ORDER BY prodID");
				$query3->execute();
				$result3 = $query3->fetchAll();
			} else {
				$query3 = $conn->prepare("SELECT product.prodID, product.prodName, brand.brandName, category.categoryName, product.price, product.unitType, product.reorderLevel, inventory.qty, inventory.physicalQty, inventory.remarks
										FROM product 
										INNER JOIN brand ON product.brandID = brand.brandID 
										INNER JOIN category ON product.categoryID = category.categoryID 
										INNER JOIN inventory ON product.prodID = inventory.prodID
										WHERE product.status = 'Active'
										ORDER BY prodID");
				$query3->execute();
				$result3 = $query3->fetchAll();
			}
			
			$selectedBrand =(isset($_REQUEST['brand_Name']) ? $_REQUEST['brand_Name'] : null);
			if (!empty($selectedBrand)) {
				$filterBrand = current($conn->query("SELECT brandName FROM brand WHERE brandID = '$selectedBrand'")->fetch());
			} else {
				$filterBrand = "None";
			}
			
			$selectedCategory =(isset($_REQUEST['category_Name']) ? $_REQUEST['category_Name'] : null);
			if (!empty($selectedCategory)) {
				$filterCategory = current($conn->query("SELECT categoryName FROM category WHERE categoryID = '$selectedCategory'")->fetch());
			} else {
				$filterCategory = "None";
			}
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
			<div class="row">
			
				<!-- Sidebar -->
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="logo.png" alt=""/></div>
						<li class="active"><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory<span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="userDefectives.php"><i class="glyphicon glyphicon-list"></i> Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="userPurchaseOrders.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>					
						<li><a href="userProdIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
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
					foreach ($result3 as $item):
					$proID = $item["prodID"];
				?>	
				<?php
					endforeach;
				?>	
										
				<?php
					foreach ($result3 as $item):
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
									<h1 id="headers">Add Physical Count</h1>
									
									<?php 
										$location =  $_SERVER['REQUEST_URI']; 
									?>

									<tr>
										<td width="50%">
											View by Brand
											<form action="<?php echo $location; ?>" method="POST">
												<select name="brand_Name">
													<option value="<?php echo $selectedBrand?>" SELECTED>Selected: <?php echo $filterBrand?></option>
													<?php foreach ($result as $row): ?>
														<option value="<?=$row["brandID"]?>"><?=$row["brandName"]?></option>
													<?php endforeach ?>
												</select>
												<input type="submit" value="View" class="btn btn-success" id="viewButton" name="submit">
											</form>
										</td>	
										
										<td width="50%">
											View by Category
											<form action="<?php echo $location; ?>" method="POST">
												<select name="category_Name">
													<option value="<?php echo $selectedCategory?>" SELECTED>Selected: <?php echo $filterCategory?></option>
													<?php foreach ($result2 as $row2): ?>
														<option value="<?=$row2["categoryID"]?>"><?=$row2["categoryName"]?></option>
													<?php endforeach ?>
												</select>
												<input type="submit" value="View" class="btn btn-success" id="viewButton" name="submit">
											</form>
										</td>
									</tr>
								</table>
							</div>
							<hr>	
								
							<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div id="myTable_length" class="dataTables_length">
									<div id="myTable_filter" class="dataTables_filter">
									</div>
								</div>
							</div>
							
							<form action="" method="POST">
								<input type="submit" name="adjust" value ="Update Physical Quantity" id="phyCountButton">
								
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
												<div id="tabHead">Unit</div>
											</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												<div id="tabHead">Last Physical Count</div>
											</th>
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												<div id="tabHead">Current Quantity</div>
											</th>	
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												<div id="tabHead">New Physical Count</div>
											</th>	
											<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
												<div id="tabHead">Remarks</div>
											</th>		
										</tr>
									</thead>
									
									<tbody>	
										<?php
											foreach ($result3 as $item):
											$proID = $item["prodID"];
										?>
											
										<tr id="centerData">
											<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
											<td data-title="Description"><?php echo $item["prodName"]; ?></td>
											<td data-title="Brand"><?php echo $item["brandName"]; ?></td>
											<td data-title="Category"><?php echo $item["categoryName"]; ?></td>
											<td data-title="Unit"><?php echo $item["unitType"];?></td>
											<td data-title="Price"><?php echo $item["physicalQty"]; ?></td>
											<td data-title="Unit"><?php echo $item["qty"];?></td>
											
											<td>
												<input type="number" min="0" id="adjustment" name="adjustUpdate[]" value="<?php echo $item["physicalQty"]; ?>" placeholder="<?php echo $item["physicalQty"]; ?>">
												<input type="hidden" name="thisProductID[]" value="<?php echo $item["prodID"]; ?>" />
											</td>
											<td data-title="Remarks">
												<input type="text" id="adjustment" name="updateRemarks[]" value="<?php echo $item["remarks"]; ?>" placeholder="<?php echo $item["remarks"]; ?>">
											</td>
												
										</tr>	
										<?php
											endforeach;
										?>
									</tbody>	
								</table>	
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
						
		<?php 
			$productCounter=(isset($_REQUEST['thisProductID']) ? $_REQUEST['thisProductID'] : null);
			
			for ($index = 0; $index < count($productCounter); $index++) {
				$quant=(isset($_REQUEST['adjustUpdate'][$index]) ? $_REQUEST['adjustUpdate'][$index] : null);
				$thisProdID=(isset($_REQUEST['thisProductID'][$index]) ? $_REQUEST['thisProductID'][$index] : null);
				$thisRemarks=(isset($_REQUEST['updateRemarks'][$index]) ? $_REQUEST['updateRemarks'][$index] : null);
				
				if (isset($_POST["adjust"])){
				
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
					$sql1 = "INSERT INTO archive(archiveDate, qty, totalIn, totalOut, beginningQty, endingQty, physicalQty, remarks, prodID)
							SELECT invDate, qty, inQty, outQty, beginningQty, physicalQty, physicalQty, remarks, prodID FROM inventory
							WHERE prodID = '$thisProdID'";
					$conn->exec($sql1);
				
					$sql2 = "UPDATE inventory SET physicalQty=$quant, invDate=CURDATE(), remarks='$thisRemarks' WHERE prodID = '$thisProdID'";
					$conn->exec($sql2);

					$sql3 = "UPDATE inventory SET beginningQty=physicalQty WHERE prodID = '$thisProdID'";
					$conn->exec($sql3);
					$sql4 = "UPDATE archive SET endingQty=$quant WHERE prodID = '$thisProdID'";
					$conn->exec($sql4);
					$sql5 = "UPDATE archive SET physicalQty=$quant WHERE prodID = '$thisProdID'";
					$conn->exec($sql5);
					$sql6 = "UPDATE archive SET remarks='$thisRemarks' WHERE prodID = '$thisProdID'";
					$conn->exec($sql6);
					
					echo "<meta http-equiv='refresh' content='0'>";
				}
			}
		?>
	</body>
</html>
