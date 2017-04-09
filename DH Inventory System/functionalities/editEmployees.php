<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Employee</title>
	<?php include('dbcon.php'); ?>
		
	<?php 
		session_start();
		if (isset($_SESSION['id'])){
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
			if (!isset($_SESSION['id']) || $_SESSION['id'] == false) {
				session_destroy();
				header('Location: index.php');
			}
		}
	?>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../css/test.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<script src="../employees.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  
  <body>
	<?php
		$employID= $_GET['emplId'];
		$query = $conn->prepare("SELECT empID, empFirstName, empLastName, empMidName, empExtensionName 
								FROM employee");
		$query->execute();
		$result = $query->fetchAll();
		
		$query2 = $conn->prepare("SELECT empID, empFirstName, empLastName, empMidName, empExtensionName 
								FROM employee
								WHERE empID = $employID");
		$query2->execute();
		$result2 = $query2->fetchAll();
	?>

		<!--Top Navigation Bar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle pull-left collapsed" data-toggle="collapse" data-target="#sidebarCol" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div id="font"><h2>DENCY'S HARDWARE AND GENERAL MERCHANDISE</h2></div>
			</div>
			<div  id="navbar" class="navbar-collapse">
				<ul class="nav navbar-nav navbar-right" id="adminDrp">
				    <li class="dropdown" id="font">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="try">
                        	<i class="glyphicon glyphicon-user"></i> ADMIN
                         </a>
                            <ul class="dropdown-menu list-unstyled">
                                <li>
                                    <a href="../logout.php" class="active"><i class="glyphicon glyphicon-log-out"></i> LOGOUT</a>
								</li>
                            </ul>
                     </li>
				</ul>
			</div>


    <div class="container-fluid">
		<div class="row navbar-collapse">
			<div id="sidebarCol" class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
						<img src="../logo.png" alt="" width="100px" height="100px" id="sidebarLogo"/>
					<li>
						<a href="../inventory.php">
							<i class="glyphicon glyphicon-list-alt"></i> Inventory
						</a>
					</li>
					<li><a href="../incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
					<li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing </a></li>
					<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
						<ul class="list-unstyled collapse" id="returns">
							<li><a href="../returns.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
							<li><a href="../returnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
						</ul>
					</li>
					<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
						<ul class="list-unstyled collapse" id="reports">
							<li><a href="../branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
						</ul>
					</li>
					<li class="active"><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
			</div>
			</div>
		</div>
	</nav>	
		<!-- End of Sidebar -->	
		
	<div class="addInv">
	
	
		<h1 id="headers">Edit Employee Entry</h1>
			<div class="contents">
					<form action="" method="POST">
																			
					<h3>First Name</h3>
					<?php foreach ($result2 as $row): ?>
						<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["empFirstName"]; ?>" value="<?php echo $row["empFirstName"]; ?>" name="empFName"> <br>
					<?php endforeach ?>
					
					<h3>Middle Name</h3>
					<?php foreach ($result2 as $row): ?>
						<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["empMidName"]; ?>" value="<?php echo $row["empMidName"]; ?>" name="empMName"> <br>
					<?php endforeach ?>
					
					<h3>Last Name</h3>
					<?php foreach ($result2 as $row): ?>
						<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["empLastName"]; ?>" value="<?php echo $row["empLastName"]; ?>" name="empLName"> <br>
					<?php endforeach ?>

					<h3>Extension Name</h3>
					<?php foreach ($result2 as $row): ?>
						<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["empExtensionName"]; ?>" value="<?php echo $row["empExtensionName"]; ?>" name="empEName"> <br>
					<?php endforeach ?>					
					<br>
					<input type="submit" value="Edit" class="btn btn-success btnclr" name="editEmp" onclick="alert('New Employee Successfully Added');">
					<input type="submit" value="Cancel" class="btn btn-default btnclr" style="width: 100px">
				</form> 
			</div>
	</div>
	   
	<?php
    $emploFirstName=(isset($_REQUEST['empFName']) ? $_REQUEST['empFName'] : null);
	$emploMiddleName=(isset($_REQUEST['empMName']) ? $_REQUEST['empMName'] : null);
	$emploLastName=(isset($_REQUEST['empLName']) ? $_REQUEST['empLName'] : null);
	$emploExtenName=(isset($_REQUEST['empEName']) ? $_REQUEST['empEName'] : null);
	
    if (isset($_POST["editEmp"])){
			
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
					 
	$sql = "UPDATE employee SET empFirstName = '$emploFirstName', empMidName = '$emploMiddleName', empExtensionName = '$emploLastName', empFirstName = '$emploExtenName'
			WHERE empID = '$employID'";
	$conn->exec($sql);
				
	}

	?>
  </body>
</html>
