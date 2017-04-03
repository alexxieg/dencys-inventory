<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Returns</title>
	
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../css/test.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<script src="../returns.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
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
		<?php
			$retID= $_GET['retId'];
			$query = $conn->prepare("SELECT product.prodID, product.unitType, product.model, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark 
					FROM returns INNER JOIN product ON returns.prodID = product.prodID");
			$query->execute();
			$res = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT product.prodID, product.unitType, product.model, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark 
					FROM returns INNER JOIN product ON returns.prodID = product.prodID 
					WHERE returnID = $retID ");
			$query2->execute();
			$resul = $query2->fetchAll();
		?>
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
					<li><a href="Logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
    </nav>

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					 	<div id="sidebarLogo"><img src="../logo.png" alt="" width="100px" height="100px"/></div>
					<li class="active">
						<a href="inventory.php">
							<i class="glyphicon glyphicon-list-alt"></i> Inventory<span class="sr-only">(current)</span>
						</a>
					</li>
					<li><a href="../incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
					<li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
					<li><a href="../returns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>
					<li><a href="../reports.php"><i class="glyphicon glyphicon-th-list"></i> Reports</a></li>
					<li><a href="../branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
					<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage</a>
						<ul class="list-unstyled collapse" id="manage">
							<li><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
							<li><a href="../branches.php"><i class="glyphicon glyphicon-random"></i> Branches</a></li>
							<li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
							<li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
							<li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
							<li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- End of Sidebar -->
				
		<div class="addInv">
		
			<h1 id="headers">Edit Return Entry</h1>
			<div id="contents">
				<form action="" method="POST">
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
					<?php foreach ($resul as $item): ?>
						<input type="text" class="form-control" id ="addEntry" value="<?php echo $item["returnQty"]; ?>" placeholder="<?php echo $item["returnQty"]; ?>" name="retQty"> <br>
					<?php endforeach; ?>
					
					<div class="form-group">
					 <h3>Status</h3>
					  <select class="form-control" id="addEntry" name="status">
						<option>Returned</option>
						<option>Pending</option>
					  </select>
					</div>
					
					<h3>Remarks</h3>
					<textarea class="form-control" id="addEntry" rows="3" name="retRemarks" placeholder="<?php echo $item["returnRemark"]; ?>"><?php echo $item["returnRemark"]; ?></textarea> <br>
			
					<br>
					<input type="submit" value="Update" class="btn btn-success" name="addRet">
					<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
				</form> 
			</div>
		</div>
	
		<?php
			$retID= $_GET['retId'];
			$quant=(isset($_REQUEST['retQty']) ? $_REQUEST['retQty'] : null);
			$stat=(isset($_REQUEST['status']) ? $_REQUEST['status'] : null);
			$rem=(isset($_REQUEST['retRemarks']) ? $_REQUEST['retRemarks'] : null);
			if (isset($_POST["addRet"])){
				
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