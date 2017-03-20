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
		<?php include('fetchOutgoing.php'); ?>
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

		<div id="contents">
			<div class="pages no-more-tables">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">	
						<h1 id="headers">OUTGOING PRODUCTS</h1>	
						<form action="?" method="post">
							<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
						</form>	
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">
							Add Outgoing Product
						</button>					
					</table>
				</div>
				
				<table class="table table-striped table-bordered">
						<tr>
							<th>
								Date
								<button type="button" class="btn btn-default" value="?orderBy=outDate DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=outDate ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>
							</th>
							<th>
								Product ID
							</th>
							<th>
								Product Description
								<button type="button" class="btn btn-default" value="?orderBy=prodName DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=prodName ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>						
							</th>
							<th>
								Model
							</th>
							<th>
								Quantity
							</th>
							<th>
								Unit
							</th>
							<th>
								Receipt No.
							</th>
							<th>
								Employee
								<button type="button" class="btn btn-default" value="?orderBy=empName DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=empName ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>
							</th>
							<th>
								Branch
								<button type="button" class="btn btn-default" value="?orderBy=location DESC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
								</button>
								<button type="button" class="btn btn-default" value="?orderBy=location ASC" onclick="location = this.value;" id="sortBtn">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
								</button>
							</th>	
							<th>
								Remarks
							</th>					
							<th></th>
							</tr>
							
						<?php
							foreach ($result as $item):
							$outid = $item["outID"];
						?>
						
						<tr id="centerData">
							<td data-title="Date"><?php echo $item["outDate"]; ?></td>
							<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
							<td data-title="Description"><?php echo $item["prodName"]; ?></td>
							<td data-title="Model"><?php echo $item["model"]; ?></td>
							<td data-title="Quantity"><?php echo $item["outQty"]; ?></td>
							<td data-title="Unit"><?php echo $item["unitType"]; ?></td>
							<td data-title="Receipt No."><?php echo $item["receiptNo"]; ?></td>
							<td data-title="Employee"><?php echo $item["empName"]; ?></td>
							<td data-title="Branch"><?php echo $item["location"]; ?></td>
							<td data-title="Remarks"><?php echo $item["outRemarks"]; ?></td>
							<td>
								<a href="editOut.php?outsId=<?php echo $outid; ?>" target="_blank">
								<button type="button" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</button>
								</a>
								<a href="deleteOut.php?outsId=<?php echo $outid; ?>">
								<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this entry?');">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</button>
								</a>
							</td>		
						</tr>
						<?php
							endforeach;
						?>
					</table>
				
					
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Add Outgoing Product</h4>
								</div>
								<div class="modal-body">
									<form action="" method="POST" onsubmit="return validateForm()">
									
									<h5>Receipt No.</h5> 
									<input type="text" class="form-control" id ="addRcpt" placeholder="Receipt Number" name="rcno"><br>
									
										<?php
										$query = $conn->prepare("SELECT prodName FROM product ");
										$query->execute();
										$res = $query->fetchAll();
										?>
										
										<h5>Employee</h5>
									<?php
										$query = $conn->prepare("SELECT empName FROM employee ");
										$query->execute();
										$res = $query->fetchAll();
									?>
													
									<select class="form-control" id="addEmp" name="emp">
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
											
									<table class="table table-striped" id="dataTable" name="chk">
														
										<tbody>
											<tr>
												<td><input type="checkbox" name="chk"></TD>
												<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
												<td>	<?php
														$query = $conn->prepare("SELECT prodName FROM product ");
														$query->execute();
														$res = $query->fetchAll();
													?>
										
<<<<<<< HEAD
										<h3>Remarks</h3>
										<textarea class="form-control" id="addEntry" rows="3" name="outRemarks"></textarea>
										<br>
										
										<div class="modFoot">
										<span>
										<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn"> Cancel</button>
										</span>
										
										<span>
											<input type="submit" value="Submit" class="btn btn-success" name="addOut" id="sucBtn">
										</span>
										</div>

										<div class="modal-footer">
										</div>
=======
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
													<input type="text" class="form-control" id="addRem" placeholder="Remarks" name="outRemarks[]">
												</td>
											</tr>
										</tbody>
									</table>
											
									
									<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
									<span> <button type="button" value="Delete Row" class="btn btn-default" onclick="deleteRow('dataTable')">Remove from List</button></span>
									<br>
									<br>
									<span>
										<input type="button" class="btn btn-danger" value="Cancel" data-dismiss="modal" onclick="this.form.reset()" style="float:right; margin-left:10px;">
									</span>
									<span>
										<input type="submit" name = "submit" value="Submit"class="btn btn-success" style="float:right;">
									</span>
>>>>>>> cc603bd8aa3ef9b778ba2567e4494c6f649ada8dz
									</form>																		
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="container">
				<ul class="nav navbar-nav navbar-left" id="report">
					<li>
						<button class="btn btn-success btn-lg" onclick="myFunction()" id="printBtn">
							<span class="glyphicon glyphicon-print"></span>
						    Print
						</button> 
					</ul>
				<ul class="nav navbar-nav navbar-right" id="logout">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
		
		<?php include('addOutgoing.php'); ?>
		
	</body>
</html>

