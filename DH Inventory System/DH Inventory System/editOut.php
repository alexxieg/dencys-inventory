<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Outgoing</title>
	<?php include('dbcon.php'); ?>
		
	<?php 
		session_start();
		if (isset($_SESSION['id'])){
			header('Location: inventory.php');
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

	<div class="addInv">
	<h1 id="headers">EDIT Entry</h1>
		<div>
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
				
				$sql = "UPDATE outgoing SET outQty=$quant, outDate=CURDATE(), outRemarks='$rem', branchID='$branch3', empID='$emp3' WHERE OutID=$outid";
				$conn->exec($sql);				
				
				/* $sql = "UPDATE outgoing SET outQty = ".$_POST['outQty']." , outDate = CURDATE(), outRemarks = ".$_POST['outRemarks'].", branchID = $branch3, empID = $emp3, prodID = $prod3
				WHERE outID = '$outid'"; */
				

			}    

	?>
	
  </body>
</html>