<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Edit Purchase Order Entry</title>

		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
		
		<!-- Login Session -->
		<?php 
			session_start();
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) && $role!="admin") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="../js/incoming.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>
		
		<!-- Autocomplete Script -->
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<script src="../js/jquery-1.9.1.js"></script>
		<script src="../js/jquery-ui.js"></script>
		
		<script>
		  $(function() {
			$('#addSupplier').autocomplete({
				minLength:2,
				source: "../searchSup.php"
			});
		  });

		</script>
		
		<script>
		  $(function() {
			$('.thisProduct').autocomplete({
				minLength:2,
				source: "../search.php"
			});
		  });
		</script> 
		
	</head>
	
	<body>
		<?php
			$incID= $_GET['incId']; 
			$query = $conn->prepare("SELECT purchaseorders.poID, purchaseorders.poNumber, purchaseorders.poDate, purchaseorders.qtyOrder, purchaseorders.supID, product.unitType, product.prodName, purchaseorders.userID
									FROM purchaseorders INNER join product ON purchaseorders.prodID = product.prodID
									WHERE poNumber = '$incID'
									ORDER BY poID DESC");
			$query->execute();
			$result = $query->fetchAll();
			
			$supID = current($conn->query("SELECT supID FROM purchaseorders WHERE poNumber = '$incID'")->fetch());
			$supName = current($conn->query("SELECT supplier_name FROM suppliers WHERE supID = $supID")->fetch());
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
					<a class="navbar-brand" href="../inventory.php">Dency's Hardware and General Merchandise</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li id="adminhead"><a href="#">Admin |</a></li>
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
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory </span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="../inventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="addDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../prodDeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="../prodIssuance.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
						<li><a href="backup.php"><i class="glyphicon glyphicon-cog"></i> System Settings</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->
				
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">				
					<div id="contents">
						<div class="pages no-more-tables">
							<h1 id="headers">Edit Product Order Entry</h1>
							<br>
							<div id="content">
								<form action="" method="POST" onsubmit="return validateForm()"><td>
									<td>
									<h3>User</h3>
									<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
									</td>	

									<h3>Purchase No</h3> 
									<input type="text" class="form-control" id ="addPO" value = "<?php echo $incID; ?>" placeholder="<?php echo $incID; ?>" name="poNum">		
									
									<h3>Supplier</h3> 
									<div class="ui-widget">
										<input class="form-control" id ="addSupplier" value = "<?php echo $supName; ?>" placeholder="<?php echo $supName; ?>" name="supplier">
									</div>
										
									<h5 id="prodHeader">Product/s</h5>
									<table class="table table-striped" id="dataTable2" name="chk">	
										<?php foreach ($result as $row): ?>
											<tbody>
												<tr>
													<td><input type="hidden" value="1" name="num" id="orderdata"></TD>
													<td>	
														<div class="ui-widget">
															<input class="thisProduct" name="prodItem[]" value="<?php echo $row["prodName"]; ?>" placeholder="<?php echo $row["prodName"]; ?>">
														</div>		
													</td>
															
													<td>
														<input type="number" min="1" class="form-control" id ="addQty" value="<?php echo $row["qtyOrder"]?>" placeholder="<?php echo $row["qtyOrder"]?>" name="qty[]">
													</td>
												</tr>
											</tbody>
										<?php endforeach ?>
									</table>
									
									<br>
									
									<div class="modFoot">
										<br>
										<br>
										<span>
											<a href="../purchaseOrder.php">
												<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
											</a>
										</span>
										
										<span>
											<input type="submit" name="editPO" value="Update" class="btn btn-success" id="sucBtn">
										</span>
									</div>
									<div class="modal-footer">
									</div>	
								</form>  								
							</div>

							<!-- Modal for Adding Items Form -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Add Incoming Product</h4>
										</div>
										<form action="" method="POST" onsubmit="return validateForm()"><td>
											<td>
											<h3>User</h3>
											<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID2" readonly>
											</td>	

											<h3>Purchase No</h3> 
											<input type="text" class="form-control" id ="addPO" value = "<?php echo $incID; ?>" placeholder="<?php echo $incID; ?>" name="poNum2" readonly>		
											
											<h3>Supplier</h3> 
											<div class="ui-widget">
												<input class="form-control" id ="addSupplier" value = "<?php echo $supName; ?>" placeholder="<?php echo $supName; ?>" name="supplier2" readonly>
											</div>
												
											<h5>Product/s</h5>
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
																<input class="thisProduct" name="prodItem2[]" placeholder="Product Name">
															</div>		
														</td>
																
														<td>
															<input type="number" min="1" class="form-control" id ="addQty" placeholder="Quantity" name="qty2[]">
														</td>
													</tr>
												</tbody>
											</table>
											
											<br>
											
											<div class="modFoot">
												<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
												<br>
												<br>
												<span>
													<a href="../purchaseOrder.php">
														<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
													</a>
												</span>
												
												<span>
													<input type="submit" name="addItems" value="Add Items" class="btn btn-success" id="sucBtn">
												</span>
											</div>
											<div class="modal-footer">
											</div>	
										</form>
									</div>
								</div>
							</div> 
							<!-- End of Modal -->
						</div>
					</div>
				</div>
			</div>	
		</div>
		
		<!-- Archive Edit Function -->
		<?php
		$incID= $_GET['incId'];
		$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
		if (isset($_POST["editPO"])){
			for ($index3 = 0; $index3 < count($prodTem);) {		
				$prodItem = $_POST['prodItem'][$index3];
				$inQty = $_POST['qty'][$index3];
				$checkProd1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
				$checkProd2 = $checkProd1->fetch(PDO::FETCH_ASSOC);
				$checkProdItemID = $checkProd2['prodA'];
				
				foreach ($result as $checkRow) {
					if (!($checkRow['prodName'] == $prodItem)) {
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$sql = "INSERT INTO editpo (poEditDate, poNumber, poDate, qtyOrder, supID, prodID, userID, poID)
								SELECT CURDATE(), poNumber, poDate, qtyOrder, supID, prodID, userID, poID from purchaseorders 
								WHERE poNumber = '$incID' AND prodID = '$checkProdItemID'";
						$conn->exec($sql);
						$index3++;	
					} else {
						//Do Nothing
						$index3++;						
					}	
				}
			}
		}
		?>
		
		<!-- Edit PO Function -->
		<?php
			$incID= $_GET['incId'];
			$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			$prodTem2=(isset($_REQUEST['prodItem2']) ? $_REQUEST['prodItem2'] : null);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if (isset($_POST["editPO"])){
				for ($index = 0; $index2 < count($prodTem); $index2++) {		
					$prodItem = $_POST['prodItem'][$index2];
					$inQty = $_POST['qty'][$index2];
					$userID = $_POST['userID'];
					$poNum = $_POST['poNum'];
					$sup = $_POST['supplier'];
					
					$sup1 = $conn->query("SELECT supID AS supA FROM suppliers WHERE supplier_name = '$sup'");
					$sup2 = $sup1->fetch(PDO::FETCH_ASSOC);
					$sup3 = $sup2['supA'];

					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
						
					$sql = "UPDATE purchaseorders SET qtyOrder = $inQty, poDate = CURDATE(), poNumber = '$poNum', supID = $sup3, prodID = '$prod3', userID = '$userID'
							WHERE poNumber = '$incID' AND prodID = '$prod3'";
						$conn->exec($sql);
				}
				$url="viewPO.php?incId=$incID";
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
				
			}
			
			if (isset($_POST["addItems"])){
				for ($index3 = 0; $index3 < count($prodTem2); $index3++) {		
					$prodItem2 = $_POST['prodItem2'][$index3];
					$inQty2 = $_POST['qty2'][$index3];
					$userID2 = $_POST['userID2'];
					$poNum2 = $_POST['poNum2'];
					$sup2 = $_POST['supplier2'];
					
					$sup1 = $conn->query("SELECT supID AS supA FROM suppliers WHERE supplier_name = '$sup2'");
					$sup2 = $sup1->fetch(PDO::FETCH_ASSOC);
					$sup3 = $sup2['supA'];

					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName sounds like '$prodItem2'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];

					$sql = "INSERT INTO purchaseorders (qtyOrder, poDate, poNumber, supID, prodID, userID, status)
							VALUES ($inQty2,CURDATE(),'$poNum2','$sup3','$prod3','$userID2', 'Incomplete')";
					$conn->exec($sql);
				}
				$url="viewPO.php?incId=$incID";
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
			}
		?>
	
	</body>
</html>