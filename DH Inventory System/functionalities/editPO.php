<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Edit Product Order Entry</title>

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
	</head>
	
	<body>
		<?php
			$incID= $_GET['incId']; 
			$query = $conn->prepare("SELECT purchaseorders.poID, purchaseorders.poNumber, purchaseorders.poDate, purchaseorders.qtyOrder, purchaseorders.supplier, product.unitType, product.prodName, purchaseorders.userID
									FROM purchaseorders INNER join product ON purchaseorders.prodID = product.prodID
									WHERE poNumber = '$incID'
									ORDER BY poID DESC");
			$query->execute();
			$result = $query->fetchAll();
			
			$supplier = current($conn->query("SELECT supplier FROM purchaseorders WHERE poNumber = '$incID'")->fetch());
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
					<a class="navbar-brand" href="#">Dency's Hardware and General Merchandise</a>
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
								<li><a href="../functionalities/addDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../incoming.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
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
								<li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
								<li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
								<li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
							</ul>
						</li>
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
							<h5> User </h5>
							<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
							</td>	

							<h5>Purchase No</h5> 
							<input type="text" class="form-control" id ="addSupplier" value = "<?php echo $incID; ?>" placeholder="<?php echo $incID; ?>" name="poNum">		
							
							<h5>Supplier</h5> 
							<input type="text" class="form-control" id ="addSupplier" value = "<?php echo $supplier; ?>" placeholder="<?php echo $supplier; ?>" name="supplier"><br>
									
							<h5>Product/s</h5>
							<table class="table table-striped" id="dataTable" name="chk">	
								<?php foreach ($result as $row): ?>
									<tbody>
										<tr>
											<td><input type="checkbox" name="chk"></TD>
											<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
											<td>	
												<?php
													$query = $conn->prepare("SELECT prodName FROM product ");
													$query->execute();
													$res = $query->fetchAll();
												?>
										
												<select class="form-control" id="addItem" name="prodItem[]">
														<option><?=$row["prodName"]?></option>
													<?php foreach ($res as $row2): ?>
														<option><?=$row2["prodName"]?></option>
													<?php endforeach ?>
												</select> 
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
								<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
								<span><button type="button" value="Delete Row" class="btn btn-default" onclick="deleteRow('dataTable')">Remove from List</button></span>
								<br>
								<br>
								<span><input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()"></span>
								<span><input type="submit" name="editPO" value="Update" class="btn btn-success" id="sucBtn"></span>
							</div>
						</form>  								
					</div>								
				</div>
				</div>
				</div>
			</div>	
		</div>
		
		<?php
			$incID= $_GET['incId'];
			$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);

			if (isset($_POST["editPO"])){
				for ($index2 = 0; $index2 < count($prodTem); $index2++) {		
					$inRemarks = $_POST['inRemarks'][$index2];
					$prodItem = $_POST['prodItem'][$index2];
					$inQty = $_POST['qty'][$index2];
					$userID = $_POST['userID'];
					$poNum = $_POST['poNum'];
					$thisSup = $_POST['supplier'];

					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
						
					$sql = "UPDATE purchaseorders SET qtyOrder = $inQty, poDate = CURDATE(), poNumber = '$poNum', supplier = '$thisSup', prodID = '$prod3', userID = '$userID'
							WHERE poNumber = '$incID' AND prodID = '$prod3'";
						$conn->exec($sql);
				}
				echo "<meta http-equiv='refresh' content='0'>";
			}
			
		?>
	
  </body>
</html>