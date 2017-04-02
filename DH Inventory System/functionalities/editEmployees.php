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
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="logo.jpg">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
								<li><a href="outgoing.php">Outgoing</a></li>
								<li><a href="returns.php">Returns</a></li>
								<li><a href="admin.php">Admin</a></li>
							</ul>
						</div>
					</div>
				</nav>
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
