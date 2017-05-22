<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Accounts</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="../js/accounts.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>
		
		<?php include('dbcon.php'); ?>	
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
		<!-- Retrieve Selected Account Details -->
		<?php
			$useThisID = $_GET['useID'];
			$query = $conn->prepare("SELECT userID, userName, password, user_role FROM users");
			$query->execute();
			$result = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT userID, userName, password, user_role FROM users WHERE userID=$useThisID");
			$query2->execute();
			$result2 = $query2->fetchAll();
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
						<li><a href="../Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
					</ul>
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
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory </span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="../inventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="../functionalities/addDefective.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../prodDeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivred Products</a></li>
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
						<li class="active"><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage  <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
					</ul>
				</div>
				<!-- End of Sidebar -->
				
				<div class="addInv">
					<h1 id="headers">Edit Account</h1>
					<div id="contents">
						<form action="" method="POST" class="editPgs">
							<?php foreach ($result2 as $row): ?>
							<h3>Username</h3>
							<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["userName"]; ?>" value="<?php echo $row["userName"]; ?>" name="userName"> <br>
							<?php endforeach ?>
							
							<?php foreach ($result2 as $row): ?>
							<h3>Password</h3>
							<input type="password" class="form-control" id ="addEntry" placeholder="<?php echo $row["password"]; ?>" value="<?php echo $row["password"]; ?>" name="psw"> <br>
							<?php endforeach ?>
							
							<?php foreach ($result2 as $row): ?>
							<div class="form-group">
								 <h3>User Role</h3>
								  <select class="form-control" id="addEntry" name="user_role">
									<option>admin</option>
									<option>user</option>
								  </select>
							</div>
							<?php endforeach ?>
							<br>
							
							<div class="modFoot">
								<span>
									<a href="../accounts.php">
										<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
									</a>
								</span>
								<span>
									<input type="submit" name="editAccount" value="Update" class="btn btn-success" id="sucBtn">
								</span>
							</div>	
						</form> 
					</div>
				</div>
			</div>
		</div>
			   
		<?php
			$useThisID= $_GET['useID'];
			$useName=(isset($_REQUEST['userName']) ? $_REQUEST['userName'] : null);
			$passW=(isset($_REQUEST['psw']) ? $_REQUEST['psw'] : null);
			$urole=(isset($_REQUEST['user_role']) ? $_REQUEST['user_role'] : null);
			if (isset($_POST["editAccount"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
				$sql = "UPDATE users SET userName = '$useName', password = '$passW' WHERE userID = '$useThisID'";
			
				$conn->exec($sql);
			} 
			
		?>
	</body>
</html>