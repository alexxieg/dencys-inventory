<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>Edit Product Issuance Entry</title>
			
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../css/custom.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
		
		<!-- Javascript Files -->
		<script src="../js/outgoing.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/jquery-3.2.0.min.js"></script>	
		<script src="../js/bootstrap.min.js"></script>
		
		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
			
		<!-- Login Session -->
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
		<!-- Top Main Header -->
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
		<!-- End of Top Main Header -->
		
		<div class="container-fluid">
			<div class="row">
			
				<!-- Sidebar -->
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="../logo.png" alt=""/></div>
						<li><a href="../inventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="../purchaseOrder.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="../incoming.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li class="active"><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Product Issuance <span class="sr-only">(current)</span></a></li>
						<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="../returnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="../returnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="monthlyIncoming.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="monthlyOutgoing.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
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
				<!-- End of Sidebar -->	

				<!-- Retrieve Selected Entry's Details -->
				<?php
					$outid= $_GET['outsId'];
					$query = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, outgoing.receiptNo, outgoing.outID, outgoing.outQty, outgoing.outQty, outgoing.outDate, MONTHNAME(outgoing.outDate) AS nowMonthDate, YEAR(outDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, branch.location 
											FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID");
					$query->execute();
					$res = $query->fetchAll();
					
					$query2 = $conn->prepare("SELECT product.prodName, product.prodID, product.unitType, outgoing.receiptNo, outgoing.outID, outgoing.outQty, outgoing.outQty, outgoing.outDate, MONTHNAME(outgoing.outDate) AS nowMonthDate, YEAR(outDate) AS nowYearDate, CONCAT(employee.empLastName,', ',employee.empFirstName) AS empName, branch.location 
											FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID  
											WHERE receiptNo = '$outid'");
					$query2->execute();
					$resul = $query2->fetchAll();
					
					$reciptNum = current($conn->query("SELECT outgoing.receiptNo FROM outgoing WHERE outgoing.receiptNo = '$outid'")->fetch());
					$employ = current($conn->query("SELECT DISTINCT employee.empFirstName FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN employee ON outgoing.empID = employee.empID WHERE outgoing.receiptNo = '$outid'")->fetch());
					$branch = current($conn->query("SELECT DISTINCT location FROM outgoing INNER JOIN product ON outgoing.prodID = product.prodID INNER JOIN branch ON outgoing.branchID = branch.branchID INNER JOIN employee ON outgoing.empID = employee.empID WHERE outgoing.receiptNo = '$outid'")->fetch());
				?>
	
				<div class="addInv">
					<h1 id="headers">Edit Product Issuance Entry </h1>
					<br>
					<div id="contents">
						<form action="" method="POST" onsubmit="return validateForm()" class="editPgs">
						
							<h5>Receipt No.</h5> 
							<input type="text" class="form-control" id ="addRcpt" placeholder="<?php echo $reciptNum; ?>" value="<?php echo $reciptNum; ?>" name="rcno" Readonly><br>
									
							<h5>Handled By</h5>
							<?php
								$query = $conn->prepare("SELECT empFirstName FROM employee ");
								$query->execute();
								$result = $query->fetchAll();
								?>
											
							<select class="form-control" id="addEmpl" name="emp">
								<?php foreach ($result as $row): ?>
									<option><?=$row["empFirstName"]?></option>
								<?php endforeach ?>
									<option SELECTED><?=$employ?></option>
							</select> 
								
							<br>
								
							<h5>Branch</h5>
							<?php
								$query = $conn->prepare("SELECT location FROM branch");
								$query->execute();
								$res = $query->fetchAll();
							?>
								
							<select class="form-control" id="addEntry" name="branch">
								<?php foreach ($res as $row): ?>
									<option><?=$row["location"]?></option>
								<?php endforeach ?>
									<option SELECTED><?=$branch?></option>
							</select> 
							<br>
									
							<h5>Product/s</h5>
							<table class="table table-striped" name="chk">
								<tbody>
									<?php foreach ($resul as $row): ?>
									<tr>
										<td><input type="checkbox" name="chk"></TD>
											<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
											
										<input type="hidden" name="productOutID[]" value="<?php echo $row["outID"]; ?>" />
												
										<td>	
											<?php
												$query = $conn->prepare("SELECT prodName FROM product INNER JOIN inventory ON product.prodID = inventory.prodID WHERE inventory.qty != 0 OR NOT NULL");
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
											<input type="number" min="1" class="form-control" id ="addQty" placeholder="<?php echo $row["outQty"]; ?>" value="<?php echo $row["outQty"]; ?>"  name="outQty[]">
										</td>
										<td>
											<a href="removeOutgoingProduct.php?outID=<?php echo $row["outID"];?>">
												<button type="button" value="Delete Row" class="btn btn-default" onclick="deleteRow('dataTable')">ReMoVe</button>
											</a>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
											
							<div class="modFoot">
								<span><button type="button" class="btn btn-default" value="Add Row" data-toggle="modal" data-target="#myModal" id="modbutt">Add Product</button></span>
								<br>
								<br>
									<span>
										<a href="../outgoing.php">
										<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
									</a>
								</span>
								<span>
									<input type="submit" name="updateOut" value="Update" class="btn btn-success" id="sucBtn">
								</span>
							</div>
						</form>																		
					</div>
				</div>
			</div>
		</div>
		
		<!-- Modal - Add Outgoing Entry Form -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Outgoing Product</h4>
					</div>
					<div class="modal-body">
						<form action="" method="POST" onsubmit="return validateForm()">
								
							<h5>Handled By</h5>
							<?php
								$query = $conn->prepare("SELECT empFirstName FROM employee ");
								$query->execute();
								$result = $query->fetchAll();
							?>
											
							<select class="form-control" id="addEmpl" name="emp" Readonly>
								<option SELECTED><?=$employ?></option>
							</select> 
							
							<br>
							
							<h5>Branch</h5>
							<?php
								$query = $conn->prepare("SELECT location FROM branch");
								$query->execute();
								$res = $query->fetchAll();
								?>
							
							<select class="form-control" id="addEntry" name="branch" Readonly>
								<option SELECTED><?=$branch?></option>
							</select> 
							<br>
									
							<h5>Product/s</h5>
							<table class="table table-striped" id="dataTable" name="chk">
								<tbody>
									<tr>
										<td><input type="checkbox" name="chk"></TD>
										<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
										<td>	
											<?php
												$query = $conn->prepare("SELECT prodName FROM product INNER JOIN inventory ON product.prodID = inventory.prodID WHERE inventory.qty != 0 OR NOT NULL");
												$query->execute();
												$res = $query->fetchAll();
											?>
											<select class="form-control" id="addItem" name="prodItem[]">
											<?php foreach ($res as $row): ?>
												<option><?=$row["prodName"]?></option>
											<?php endforeach ?>
										</select> 
										</td>
												
										<td>
											<input type="number" min="1" class="form-control" id ="addQty" placeholder="Item Quantity" name="outQty[]">
										</td>
										
										<td>
											<input type="text" class="form-control" id="userID" value = "<?php echo $_SESSION['id']; ?>"placeholder="User" name="userID" readonly>
										</td>
									</tr>
								</tbody>
							</table>
								
							<div class="modFoot">
								<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
								<span> <button type="button" value="Delete Row" class="btn btn-default">Remove from List</button></span>
								<br>
								<br>
								<span>
									<input type="button" class="btn btn-danger" id="canBtn" value="Cancel" data-dismiss="modal" onclick="this.form.reset()">
								</span>
								<span>
									<input type="submit" name="editAddOutgoing" value="Issue Products" class="btn btn-success" id="sucBtn">
								</span>
							</div>
						</form>																		
			 
						<div class="modal-footer">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Update Function -->
		<?php
			$outid= $_GET['outsId'];
			$prodTem=(isset($_REQUEST['prodItem']) ? $_REQUEST['prodItem'] : null);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			if (isset($_POST["updateOut"])){
			
				for ($index = 0; $index < count($prodTem); $index++) {
					$outRemarks = $_POST['outRemarks'][$index];
					$prodItem = $_POST['prodItem'][$index];
					$outQty = $_POST['outQty'][$index];
					$emp = $_POST['emp'];
					$branch = $_POST['branch'];
					$rcpNo = $_POST['rcno'];
					$outgoingID = $_POST['productOutID'][$index];

					$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
					$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
					$emp3 = $emp2['empA'];
					
					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
						
					$branch1 = $conn->query("SELECT branchID AS branchA from branch WHERE location = '$branch'");
					$branch2 = $branch1->fetch(PDO::FETCH_ASSOC);
					$branch3 = $branch2['branchA'];
					
					$sql = "UPDATE outgoing SET outQty = $outQty, outDate = CURDATE(), receiptNo = '$rcpNo', branchID = $branch3, outRemarks = '$outRemarks', empID = '$emp3', prodID = '$prod3' 
							WHERE outID = $outgoingID";
					$conn->exec($sql);				
					
					/* $sql = "UPDATE outgoing SET outQty = ".$_POST['outQty']." , outDate = CURDATE(), outRemarks = ".$_POST['outRemarks'].", branchID = $branch3, empID = $emp3, prodID = $prod3
						WHERE outID = '$outid'"; */
				}
			}

			if (isset($_POST["editAddOutgoing"])){
				for ($index2 = 0; $index2 < count($prodTem); $index2++) {
					$prodItem = $_POST['prodItem'][$index2];
					$outQty = $_POST['outQty'][$index2];
					$userID = $_POST['userID'];
					$emp = $_POST['emp'];
					$branch = $_POST['branch'];

					$emp1 = $conn->query("SELECT empID AS empA FROM employee WHERE empFirstName = '$emp'");
					$emp2 = $emp1->fetch(PDO::FETCH_ASSOC);
					$emp3 = $emp2['empA'];
					
					$prod1 = $conn->query("SELECT prodID AS prodA FROM product WHERE prodName = '$prodItem'");
					$prod2 = $prod1->fetch(PDO::FETCH_ASSOC);
					$prod3 = $prod2['prodA'];
						
					$branch1 = $conn->query("SELECT branchID AS branchA from branch WHERE location = '$branch'");
					$branch2 = $branch1->fetch(PDO::FETCH_ASSOC);
					$branch3 = $branch2['branchA'];
					
					$sql = "INSERT INTO outgoing (outQty, outDate, receiptNo, branchID, empID, prodID, userID)
					VALUES ('$outQty',CURDATE(),'$reciptNum','$branch3','$emp3','$prod3','$userID')";
					$result = $conn->query($sql); 
				}
				echo "<meta http-equiv='refresh' content='0'>";
			}
					
		?>
	
  </body>
</html>