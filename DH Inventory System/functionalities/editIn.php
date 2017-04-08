<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Edit Incoming Entries</title>

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
		<?php
			$incID= $_GET['incId'];
			$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, incoming.inID, incoming.inQty, incoming.inDate, MONTHNAME(incoming.inDate) AS nowMonthDate, YEAR(inDate) AS nowYearDate, employee.empFirstName, incoming.receiptNo, incoming.receiptDate, incoming.supplier, incoming.status, incoming.inRemarks 
									FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
									ORDER BY inID DESC;");
			$query->execute();
			$result = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, incoming.inID, incoming.inQty, incoming.inDate, MONTHNAME(incoming.inDate) AS nowMonthDate, YEAR(inDate) AS nowYearDate, employee.empFirstName, incoming.receiptNo, incoming.receiptDate, incoming.supplier, incoming.status, incoming.inRemarks
									FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID
									WHERE incoming.receiptNo = '$incID'
									ORDER BY inID DESC;");
			$query2->execute();
			$result2 = $query2->fetchAll();
			
			$reciptNum = current($conn->query("SELECT incoming.receiptNo FROM incoming WHERE incoming.receiptNo = '$incID'")->fetch());
			$reciptDate = current($conn->query("SELECT incoming.receiptDate FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID WHERE incoming.receiptNo = '$incID'")->fetch());
			$supplier = current($conn->query("SELECT incoming.supplier FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID WHERE incoming.receiptNo = '$incID'")->fetch());
			$employ = current($conn->query("SELECT employee.empFirstName FROM incoming INNER JOIN product ON incoming.prodID = product.prodID INNER JOIN employee ON incoming.empID = employee.empID WHERE incoming.receiptNo = '$incID'")->fetch());
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
  
		<!-- Modal for New Incoming Entry Form -->
			<div class="addInv">
				<div>
					<div>
						<div>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Incoming Product</h4>
						</div>
						<div>
							<form action="" method="POST" onsubmit="return validateForm()">
									<h5>Receipt No.</h5> 
									<input type="text" class="form-control" id ="addRcpt" placeholder="<?php echo $reciptNum; ?>" value="<?php echo $reciptNum; ?>" name="rcno"><br>
									
									<h5>Receipt Date</h5> 
									<input type="date" class="form-control" id ="addRcptDate" placeholder="<?php echo $reciptDate;?>" value="<?php echo $reciptDate;?>" name="rcdate"><br>
									
									<h5>Supplier</h5> 
									<input type="text" class="form-control" id ="addSupplier" placeholder="<?php echo $supplier;?>" value="<?php echo $supplier;?>" name="supplier"><br>
								
								<h5>Received By</h5>				
								<select class="form-control" id="addEmpl" name="emp">
									<?php
										$query = $conn->prepare("SELECT empFirstName FROM employee ");
										$query->execute();
										$res = $query->fetchAll();
									?>
									<?php foreach ($res as $row): ?>
										<option><?=$row["empFirstName"]?></option>
									<?php endforeach ?>
										<option SELECTED><?=$employ?></option>
								</select> 
								
								<br>
										
								<h5>Product/s</h5>
								<table class="table table-striped" id="dataTable" name="chk">				
									<tbody>
										<?php foreach ($result2 as $row): ?>
											<tr>
												<td><input type="checkbox" name="chk"></TD>
												<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
												
												<input type="hidden" name="productInID[]" value="<?php echo $row["inID"]; ?>" />
												
												<td>	
													<?php
														$query = $conn->prepare("SELECT prodName FROM product ");
														$query->execute();
														$res = $query->fetchAll();
													?>
													
													<select class="form-control" id="addItem" name="prodItem[]">
														<option><?=$row["prodName"]?></option>
														<?php foreach ($res as $row3): ?>
															<option><?=$row3["prodName"]?></option>
														<?php endforeach ?>
													</select> 
												</td>
														
												<td>
													<input type="text" class="form-control" id ="addQty" placeholder="<?php echo $row["inQty"]; ?>" value="<?php echo $row["inQty"]; ?>" name="incQty[]">
												</td>
												
												<td>
													<select class="form-control" id="addInStatus" name="inStatus[]">
														<option>Complete</option>
														<option>Partial</option>
													</select> 
												</td>
												
												<td>
													<input type="text" class="form-control" id="addRem" placeholder="<?php echo $row["inRemarks"]; ?>" value="<?php echo $row["inRemarks"]; ?>" name="inRemarks[]">
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
								
								<br>
								
								<div class="modFoot">
								<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
								<span> <button type="button" value="Delete Row" class="btn btn-default" onclick="deleteRow('dataTable')">Remove from List</button></span>
								<br>
								<br>
								<span>
									<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
								</span>
								<span>
									<input type="submit" name="updateIn" value="Update" class="btn btn-success" id="sucBtn">
								</span>
								</div>
							</form> 	
						
							<div class="modal-footer">
							</div>								
						</div>
					</div>
				</div>
			</div> 
			<!-- End of Modal -->
		
	<?php
			$incID= $_GET['incId'];
			$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			if (isset($_POST["updateIn"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				for ($index = 0; $index < count($prodTem); $index++) {	
					$inRemarks = $_POST['inRemarks'][$index];
					$prodItem = $_POST['prodItem'][$index];
					$inQty = $_POST['incQty'][$index];
					$inStat = $_POST['inStatus'][$index];
					$rcpNo = $_POST['rcno'];
					$recDate = $_POST['rcdate'];
					$sup = $_POST['supplier'];
					$incomingID = $_POST['productInID'][$index];
					
					$emp = $_POST['emp'];
					$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
					$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
					$emp3 = $emp2['empA'];

					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
					
					$sql = "UPDATE incoming SET inQty = $inQty, inDate = CURDATE(), receiptNo = '$rcpNo', receiptDate = '$recDate', supplier = '$sup', status = '$inStat', inRemarks = '$inRemarks', empID = '$emp3', prodID = '$prod3'
							WHERE inID = $incomingID";
					$conn->exec($sql);				
					
					/* $sql = "UPDATE outgoing SET outQty = ".$_POST['outQty']." , outDate = CURDATE(), outRemarks = ".$_POST['outRemarks'].", branchID = $branch3, empID = $emp3, prodID = $prod3
					WHERE outID = '$outid'"; */
					  echo "<meta http-equiv='refresh' content='0'>";
				}
			}    
	?>
	
  </body>
</html>