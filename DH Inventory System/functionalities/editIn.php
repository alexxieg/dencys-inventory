<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Incoming Products</title>

		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" media="screen" type ="text/css" href="../css/responsive.css">
		
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
		        <li class="active"><a href="../incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
		        <li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
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