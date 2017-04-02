<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Outgoing Products</title>
			
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" media="screen" type ="text/css" href="../css/responsive.css">
		
		<script src="../outgoing.js"></script>
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

  		<!-- Page Header and Navigation Bar -->
		<nav class="navbar navbar-inverse navbar-fixed-top" >
		<!-- Header -->
		  <div class="container-fluid" id="navFix">
		    <div class="navbar-header">
			<div id="dencysname"><h2>Dency's Hardware and General Merchandise</h2></div>
		      <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse" id="togBtn">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
		      </button>
				<div class="dropdown">
				  <button class="dropbtn"><i class="glyphicon glyphicon-user"></i> Admin</button>
				  <div class="dropdown-content">
					<a href="../logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
					<a href="#"><button class="btn btn-success btn-md" onclick="myFunction()" id="printBtn">
					<i class="glyphicon glyphicon-print"></i> Print</button></a>
					</div>
				</div>
   			</div>
		  </div><!-- /container -->
		</nav>

		<!-- Side bar -->
		<div class="row row-offcanvas row-offcanvas-left">
			<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="collapse navbar-collapse">	
				<ul class="nav nav-pills nav-stacked affix">
				      <div id="sidelogo"><img src="../logo.png" alt=""/></div>
		        <li><a href="../inventory.php" ><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
		        <li><a href="../incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
		        <li class="active"><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
		        <li><a href="../returns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>	
		        <li><a href="../reports.php"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>					
		        <li class="nav-header">
		        	<a href="#" data-toggle="collapse" data-target="#menu2">
		          		<i class="glyphicon glyphicon-pencil"></i>Manage<i class="glyphicon glyphicon-chevron-down"></i>
		          	</a>
		            	<ul class="list-unstyled collapse affix" id="menu2">
		                <li><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i>Accounts</a>
		                </li>
		                <li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a>
		                </li>
		                <li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a>
		                </li>
		                <li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a>
		                </li>
		                <li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a>
		                </li>
		                <li><a href="../branches.php"><i class="glyphicon glyphicon-random"></i> Branches</a>
		                </li>
		                </ul>
		          </li>                              
		          </ul>
		 	 </div><!--/span-->	
		   </div>
		<!-- end of side  bar -->

	<?php
		$outid= $_GET['outsId'];
		$query = $conn->prepare("SELECT product.prodName, product.model, outgoing.outID, outgoing.outQty, outgoing.outDate, employee.empFirstName, branch.location, outgoing.outRemarks 
		FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID 
		INNER JOIN employee ON outgoing.empID = employee.empID");
		$query->execute();
		$res = $query->fetchAll();
		
		$query2 = $conn->prepare("SELECT product.prodName, product.model, outgoing.outID, outgoing.outQty, outgoing.outDate, employee.empFirstName, branch.location, outgoing.outRemarks 
		FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID 
		INNER JOIN employee ON outgoing.empID = employee.empID 
		WHERE outID = $outid");
		$query2->execute();
		$resul = $query2->fetchAll();
	?>
	
	<div class="addInv">
		<h1 id="headers">Edit Outgoing Entry</h1>
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
					<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $item["outQty"]; ?>" value="<?php echo $item["outQty"]; ?>" name="outgoQty"> 
				<?php endforeach; ?>
				
				<h3>Employee</h3>
				<select class="form-control" id="addEntry" name="emp">
					<?php foreach ($resul as $item): ?>
						<option selected><?php echo $item["empFirstName"]; ?></option>
					<?php endforeach; ?>
					<?php foreach ($res as $row): ?>
						<option><?=$row["empFirstName"]?></option>
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
						<?php foreach ($resul as $item): ?>
							<option selected><?php echo $item["location"]; ?></option>
						<?php endforeach; ?>
						<?php foreach ($res as $row): ?>
							<option><?=$row["location"]?></option>
						<?php endforeach ?>
					</select> 
					<br>
				
				<h3>Remarks</h3>
				<?php foreach ($resul as $item): ?>
					<textarea class="form-control" id="addEntry" rows="3" name="outRem" placeholder="<?php echo $item["outRemarks"]; ?>"><?php echo $item["outRemarks"]; ?></textarea> <br>
				<?php endforeach; ?>
				
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