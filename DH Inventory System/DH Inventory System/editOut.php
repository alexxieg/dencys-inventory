<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Outgoing Products</title>
			
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
		
		<script src="outgoing.js"></script>
		<script src="js/bootstrap.js"></script>
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

  <nav class="navbar navbar-inverse navbar-fixed-top" >
		<div class="container">
					<img src="WDF_1857921.jpg" id="headerBG"/>
			<center><img src="dencys.png" alt="logo" id="logo1"/></center>
		</div>

		<div class="splitHeader">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right" id="categories">
								<li><a href="inventory.php">Inventory</a></li>
								<li><a href="incoming.php">Incoming</a></li>
								<li class="active"><a href="outgoing.php">Outgoing</a></li>
								<li><a href="returns.php">Returns</a></li>
								<li><a href="admin.php">Admin</a></li>
							</ul>
						</div>
					</div>
				</nav>
  
	<div class="addInv">
		<h1 id="headers">Edit Outgoing Entry</h1>
		<div id="contents">
			<form action="" method="POST">
				
				<h3>Item</h3>
				<?php
					$outid= $_GET['outsId'];
					$query = $conn->prepare("SELECT product.prodName, product.model, outgoing.outID, outgoing.outQty, outgoing.outDate, employee.empName, branch.location, outgoing.outRemarks 
					FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID 
					INNER JOIN employee ON outgoing.empID = employee.empID 
					WHERE outID = $outid");
					$query->execute();
					$res = $query->fetchAll();
				?>
					
				<select class="form-control" id="addEntry" name="prodItem">
					<?php foreach ($res as $row): ?>
						<option><?=$row["prodName"]?> - <?=$row["model"]?></option>
					<?php endforeach ?>
				</select> 
				<br>
				
				<h3>Quantity</h3>
				
				<input type="text" class="form-control" id ="addEntry" placeholder="" name="outgoQty"> 
				<br>
				
				<h3>Employee</h3>
				<?php
					$query = $conn->prepare("SELECT empName FROM employee ");
					$query->execute();
					$res = $query->fetchAll();
				?>
			
				<select class="form-control" id="addEntry" name="emp">
					<?php foreach ($res as $row): ?>
						<option><?=$row["empName"]?></option>
					<?php endforeach ?>
				</select> 
				<br>
				
				<h3>Branch</h3>
				<?php
					$query = $conn->prepare("SELECT location FROM branch");
					$query->execute();
					$res = $query->fetchAll();
				?>
			
				<select class="form-control" id="addEntry" name="branch">
					<?php foreach ($res as $row): ?>
						<option><?=$row["location"]?></option>
					<?php endforeach ?>
				</select> 
				<br>
				
				<h3>Remarks</h3>
				<?php
					$outid= $_GET['outsId'];
					$query = $conn->prepare("SELECT product.prodName, outgoing.outID, outgoing.outQty, outgoing.outDate, employee.empName, branch.location, outgoing.outRemarks 
					FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID 
					INNER JOIN employee ON outgoing.empID = employee.empID");
					$query->execute();
					$res = $query->fetchAll();
				?>
				
				<textarea class="form-control" id="addEntry" rows="3" name="outRem"></textarea> <br>
				
			<input type="submit" value="Update" class="btn btn-success" name="addOut" onclick="alert('Outgoing Entry Successfully Edited');">
			<input type="submit" value="Cancel"class="btn btn-default" style="width: 100px;">
			</form> 
		</div>
	</div>
	
	<?php
			$outid= $_GET['outsId'];
			$quant=(isset($_REQUEST['outgoQty']) ? $_REQUEST['outgoQty'] : null);
			$rem=(isset($_REQUEST['outRem']) ? $_REQUEST['outRem'] : null);
			$prod=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			
			if (isset($_POST["addOut"])){
					
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$branch = $_POST['branch'];
				$branch1 = $conn->query("SELECT branchID AS branchA from branch WHERE location = '$branch'");
				$branch2 = $branch1->fetch(PDO::FETCH_ASSOC);
				$branch3 = $branch2['branchA'];
				
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
				
				/*$sql = "UPDATE outgoing SET outQty=$quant, outDate=CURDATE(), outRemarks='$rem', branchID='$branch3', empID='$emp3' WHERE OutID=$outid";*/
				$sql = "UPDATE outgoing SET outQty=$quant, outDate=CURDATE(), outRemarks='$rem', branchID='$branch3', empID='$emp3' WHERE OutID=$outid";
				$conn->exec($sql);				
				
				/* $sql = "UPDATE outgoing SET outQty = ".$_POST['outQty']." , outDate = CURDATE(), outRemarks = ".$_POST['outRemarks'].", branchID = $branch3, empID = $emp3, prodID = $prod3
				WHERE outID = '$outid'"; */

			}    

	?>
	
  </body>
</html>