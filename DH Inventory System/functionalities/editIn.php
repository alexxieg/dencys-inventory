<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Incoming Products</title>

		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../css/test.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<script src="../incoming.js"></script>
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
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><i class="glyphicon glyphicon-user"></i> Admin</a></li>
				</ul>
			</div>
		</div>
    </nav>

    <div class="container-fluid">
		<div class="row">
			<div id="navbar" class="col-sm-3 col-md-2 sidebar collapse">
				<ul class="nav nav-sidebar">
						<img src="../logo.png" alt="" width="100px" height="100px" id="sidebarLogo"/>
					<li >
						<a href="../inventory.php">
							<i class="glyphicon glyphicon-list-alt"></i> Inventory
						</a>
					</li>
					<li class="active"><a href="../incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming<span class="sr-only">(current)</span></a></li>
					<li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
					<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-sort"></i> Returns <i class="glyphicon glyphicon-menu-right"></i></a>
						<ul class="list-unstyled collapse" id="returns">
							<li><a href="../returns.php"><i class="glyphicon glyphicon-sort"></i>Warehouse Returns</a></li>
							<li><a href="../returnSupplier.php"><i class="glyphicon glyphicon-sort"></i>Supplier Returns</a></li>
						</ul>
					</li>
					<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-right"></i></a>
						<ul class="list-unstyled collapse" id="reports">
							<li><a href="../branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
						</ul>
					</li>
					<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-menu-right"></i></a>
						<ul class="list-unstyled collapse" id="manage">
							<li><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
							<li><a href="../branches.php"><i class="glyphicon glyphicon-random"></i> Branches</a></li>
							<li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
							<li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
							<li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
							<li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
						</ul>
					</li>
					<li class="PrintBtn"><a href="print.php"><i class="glyphicon glyphicon-print"></i> Print</a></li>
					<li class="LogBtn"><a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- End of Sidebar -->
  
		<div class="addInv">
			<h1 id="headers">Edit Incoming Entry</h1>
			<div id="contents">
				<form action="" method="POST">
					
					<h3>Item</h3>
					<?php
						$incID= $_GET['incId'];
						$query = $conn->prepare("SELECT product.prodName, product.model, incoming.inID, incoming.inQty, incoming.inDate, incoming.receiptNo, incoming.inRemarks, employee.empFirstName 
						FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID");
						$query->execute();
						$res = $query->fetchAll();
						
						$query2 = $conn->prepare("SELECT product.prodName, product.model, incoming.inID, incoming.inQty, incoming.inDate, incoming.receiptNo, incoming.inRemarks, employee.empFirstName 
						FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
						WHERE inID = $incID");
						$query2->execute();
						$res2 = $query2->fetchAll();
					?>
					
					<select class="form-control" id="addEntry" name="prodItem">
						<?php foreach ($res as $row): ?>
							<option><?=$row["prodName"]?> - <?=$row["model"]?></option>
						<?php endforeach ?>
						<?php foreach ($res2 as $row2): ?>
							<option Selected><?=$row2["prodName"]?> - <?=$row2["model"]?></option>
						<?php endforeach ?>
					</select> 
					<br>
					
					<h3>Quantity</h3>
					<?php foreach ($res2 as $row2): ?>
						<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row2["inQty"]; ?>" value="<?php echo $row2["inQty"]; ?>" name="incoQty"> 
					<?php endforeach ?>
					<br>
					
					<h3>Employee</h3>
					<?php
						$query = $conn->prepare("SELECT empName FROM employee ");
						$query->execute();
						$res = $query->fetchAll();
					?>
				
					<select class="form-control" id="addEntry" name="emp">
						<?php foreach ($res as $row): ?>
							<option><?=$row["empFirstName"]?></option>
						<?php endforeach ?>
						<?php foreach ($res2 as $row2): ?>
							<option Selected><?=$row2["empFirstName"]?></option>
						<?php endforeach ?>
					</select> 
					<br>
					
					<h3>Receipt Number</h3>
					<?php foreach ($res2 as $row2): ?>
						<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row2["receiptNo"]; ?>" value="<?php echo $row2["receiptNo"]; ?>" name="inRecN"> <br>
					<?php endforeach ?>
					
					<h3>Remarks</h3>
					<?php foreach ($res2 as $row2): ?>
						<textarea class="form-control" id="addEntry" rows="3" name="inRem"><?php echo $row2["inRemarks"]; ?></textarea> <br>
					<?php endforeach ?>
					
				<input type="submit" value="Update" class="btn btn-success" name="addOut" onsubmit="return validateForm()">
				<input type="submit" value="Cancel"class="btn btn-default">
				</form> 
				</div>
		</div>
		
	<?php
			$incID= $_GET['incId'];
			$quant=(isset($_REQUEST['incoQty']) ? $_REQUEST['incoQty'] : null);
			$recip=(isset($_REQUEST['inRecN']) ? $_REQUEST['inRecN'] : null);
			$rem=(isset($_REQUEST['inRem']) ? $_REQUEST['inRem'] : null);
			$prod=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			
			if (isset($_POST["addOut"])){
					
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$emp = $_POST['emp'];
				$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empName = '$emp'");
				$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
				$emp3 = $emp2['empA'];
			 	/*
				$outid= $_GET['outsId'];		
				$prod = $_POST['prodItem'];
							
				$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prod'");
				$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
				$prod3 = $prod2['prodA'];
	
				*/
				
				$sql = "UPDATE incoming SET inQty=$quant, inDate=CURDATE(), receiptNo='$recip', inRemarks='$rem', empID='$emp3' WHERE inID=$incID";
				$conn->exec($sql);				
				
				/* $sql = "UPDATE outgoing SET outQty = ".$_POST['outQty']." , outDate = CURDATE(), outRemarks = ".$_POST['outRemarks'].", branchID = $branch3, empID = $emp3, prodID = $prod3
				WHERE outID = '$outid'"; */
				  echo "<meta http-equiv='refresh' content='0'>";
			}    
	?>
	
  </body>
</html>