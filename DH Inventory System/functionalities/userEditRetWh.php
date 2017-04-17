<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Edit Warehouse Return Entry</title>
	
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="../js/returns.js"></script>
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
		<!-- Retrieved Selected Entry Details -->
		<?php
			$retID= $_GET['retId'];
			$query = $conn->prepare("SELECT product.prodID, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark 
					FROM returns INNER JOIN product ON returns.prodID = product.prodID");
			$query->execute();
			$res = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT product.prodID, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark 
					FROM returns INNER JOIN product ON returns.prodID = product.prodID 
					WHERE returnID = $retID ");
			$query2->execute();
			$resul = $query2->fetchAll();
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
						<li id="adminhead"><h3>Admin |</h3></li>
					<li id="loghead"><a href="Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
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
					<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="functionalities/userAddDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
					<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries<i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
						<ul class="list-unstyled collapse" id="incoming">
							<li><a href="../userpurchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
							<li><a href="../userincoming.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
						</ul>
					</li>
					<li><a href="../useroutgoing.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
					<li class="active"><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
					<li><a href="../userproduct.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
				</ul>
			</div>
				<!-- End of Sidebar -->	
				
				<div class="addInv">
					<h1 id="headers">Edit Warehouse Return Entry</h1>
					<br>
					<div id="contents">
						<form action="" method="POST" class="editPgs">
							<h3>Item</h3>
							<select class="form-control" id="addEntry" name="prodItem">
								<?php foreach ($resul as $item): ?>
									<option selected><?php echo $item["prodName"]; ?></option>
								<?php endforeach; ?>
								<?php foreach ($res as $row): ?>
									<option><?=$row["prodName"]?></option>
								<?php endforeach ?>
							</select>  
							<br>
							
							<h3>Quantity</h3>
							<input type="text" class="form-control" id ="addEntry" value="<?php echo $item["returnQty"]; ?>" placeholder="<?php echo $item["returnQty"]; ?>" name="retQty"> <br>
							
							<h5>Branch</h5>
							<?php
								$query = $conn->prepare("SELECT location FROM branch");
								$query->execute();
								$res = $query->fetchAll();
							?>
								
							<select class="form-control" id="addEntry" name="branch">
								<?php foreach ($res as $row): ?>
									<option><?=$row["location"]?></option>
								<?php endforeach ?>
									<option selected><?=$branch?></option>
							</select> 
							
							<h3>Remarks</h3>
							<input type="text" class="form-control" id="addEntry" value="<?php echo $row["returnRemark"]; ?>" placeholder="<?php echo $row["returnRemark"]; ?>"  name="retRemarks">
								
							<br>
							
							<div class="modFoot">
								<span>
									<a href="../userReturnsWarehouse.php">
										<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
									</a>
								</span>
								<span>
									<input type="submit" name="editReturns" value="Update" class="btn btn-success" id="sucBtn">
								</span>
							</div>	
						</form> 
					</div>
				</div>
			</div>
		</div>
		
		<?php
			$retID= $_GET['retId'];
			$quant=(isset($_REQUEST['retQty']) ? $_REQUEST['retQty'] : null);
			$stat=(isset($_REQUEST['status']) ? $_REQUEST['status'] : null);
			$rem=(isset($_REQUEST['retRemarks']) ? $_REQUEST['retRemarks'] : null);
			if (isset($_POST["editReturns"])){
				
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
				$prod = $_POST['prodItem'];
						
				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];
				
				$sql = "UPDATE returns SET returnDate = CURDATE(), returnQty = '$quant', status = '$stat', returnRemark = '$rem' WHERE returnID = $retID";
				$conn->exec($sql);
			}    
		?>

	</body>
</html>