<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Incoming</title>
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

	<div class="addInv">
	<h1 id="headers">EDIT Entry</h1>
		<div>
			<form action="" method="POST">
				
				<h3>Item</h3>
				<?php
					$incID= $_GET['incId'];
					$query = $conn->prepare("SELECT product.prodName, product.model, incoming.inID, incoming.inQty, incoming.inDate, suppliers.supplier_name, incoming.receiptNo, incoming.receiptDate, incoming.inRemarks 
					FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN suppliers ON incoming.supID = suppliers.supID 
					WHERE inID = $incID");
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
				
				<input type="text" class="form-control" id ="addEntry" placeholder="" name="incoQty"> 
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
				
				<h3>Receipt Number</h3>
				<input type="text" class="form-control" id ="addEntry" placeholder="Receipt Number" name="inRecN"> <br>
				
				<h3>Remarks</h3>
				<?php
					$incID= $_GET['incId'];
					$query = $conn->prepare("SELECT product.prodName, product.model, incoming.outID, incoming.outQty, incoming.outDate, employee.empName, branch.location, incoming.outRemarks 
					FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN branch ON incoming.branchID = branch.branchID 
					INNER JOIN employee ON incoming.empID = employee.empID");
					$query->execute();
					$res = $query->fetchAll();
				?>
				
				<textarea class="form-control" id="addEntry" rows="3" name="inRem"></textarea> <br>
				
			<input type="submit" value="Update" class="btn btn-success" name="addOut" onclick="alert('Outgoing Entry Successfully Edited');">
			<input type="submit" value="Cancel"class="btn btn-default" style="width: 100px;">
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
				

			}    

	?>
	
  </body>
</html>