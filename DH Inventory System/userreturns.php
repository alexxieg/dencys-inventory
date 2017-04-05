<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Returns</title>
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link href="css/test.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		
		<!--Javascript Files -->
		<script src="returns.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">
		
		<script src="datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="datatables/media/js/dataTables.bootstrap.min.js"></script>
		<link href="datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet">	
		<link href="..datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
		
		<!-- Datatables -->
		<script>
			$(document).ready(function(){
				$('#myTable').dataTable();
			});
		</script>
		
		<!-- Database Connection -->
		<?php include('dbcon.php'); ?>
		
		<!-- Login Session -->
		<?php 
			session_start();
			$role = $_SESSION['sess_role'];
			if (!isset($_SESSION['id']) || $role!="user") {
				header('Location: index.php');
			}
			$session_id = $_SESSION['id'];
			$session_query = $conn->query("select * from users where userName = '$session_id'");
			$user_row = $session_query->fetch();
		?>
	</head>
  
	<body>
		<!-- PHP code for fetching the data-->
		<?php include('functionalities/fetchReturns.php'); ?>

		<!-- Topbar Navigation / Main Header -->
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
							 	<div id="sidebarLogo"><img src="logo.png" alt="" width="100px" height="100px"/></div>
							<li><a href="userinventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
							<li><a href="userincoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
							<li><a href="useroutgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
							<li class="active"><a href="userreturns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li><span class="sr-only">(current)</span>
						</ul>
					</div>
				</div>
			</div>
		<!-- end of side  bar -->
		 
		<?php
			foreach ($result as $item):
			$retID = $item["returnID"];
		?>
					
		<?php
			endforeach;
		?>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">		
		<div id="contents">
			<div class="pages no-more-tables">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">	
						<h1 id="headers">RETURNED PRODUCTS</h1>	
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#archive" id="modbutt">View Archive</button>
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">Add Product</button>						
					</table>
				</div>
				
				<!-- Table for Returns -->
				<div id="myTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div id="myTable_length" class="dataTables_length">
						<div id="myTable_filter" class="dataTables_filter">
						</div>
					</div>
				</div>
				
				<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
					<thead>
						<tr>
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
								<div id="tabHead">Date</div>
							</th>
							
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
								<div id="tabHead">Product ID</div> 
							</th>
							
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
								<div id="tabHead">Product Description</div>
							</th>
							
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
								<div id="tabHead">Quantity</div>
							</th>
							
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
								<div id="tabHead">Unit</div>
							</th>
							
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
								<div id="tabHead">Return Type</div>
							</th>
							
							<th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
								<div id="tabHead">Remarks</div>
							</th>
							<th></th>
						</tr>
					</thead>
					
					<tbody>				
						<?php
							foreach ($result as $item):
							$retID = $item["returnID"];
						?>
						
						<tr id="centerData">
							<td data-title="Date"><?php echo $item["returnDate"]; ?></td>
							<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
							<td data-title="Description"><?php echo $item["prodName"]; ?></td>
							<td data-title="Quantity"><?php echo $item["returnQty"]; ?></td>
							<td data-title="Unit"><?php echo $item["unitType"];?></td>
							<td data-title="Unit"><?php echo $item["returnType"];?></td>
							<td data-title="Remarks"><?php echo $item["returnRemark"]; ?></td>
								
							<td>
								<a href="editRet.php?retId=<?php echo $retID; ?>" target="_blank">
									<button type="button" class="btn btn-default" id="edBtn">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</button>
								</a>
								<a href="functionalities/removeReturn.php?retId=<?php echo $retID; ?>">
									<button type="button" class="btn btn-default" id="edBtn"onclick="return confirm('Are you sure you want to remove this entry?');">
										<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
									</button>
								</a>
							</td>
						</tr>
								
						<?php
							endforeach;
						?>
					</tbody>	
				</table>
					
				<!-- Modal for Returned Product Entry Form -->
				<div class="modal fade" id="myModal" role="dialog">
					 <div class="modal-dialog modal-lg">
						 <div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add Returned Product</h4>
							</div>
							<div class="modal-body">
								<form action="" method="POST" onsubmit="return validateForm()">
									<h3>Item</h3>
									<?php
										$query = $conn->prepare("SELECT prodName FROM product ");
										$query->execute();
										$res = $query->fetchAll();
									?>
										
									<select class="form-control" id="addEntry" name="prodItem">
										<?php foreach ($res as $row): ?>
										<option><?=$row["prodName"]?></option>
										<?php endforeach ?>
									</select> 
									<br>
											
									<h3>Quantity</h3>
									<input type="number" min = "1" class="form-control" id ="addQty" placeholder="Item Quantity" name="retQty"> <br>
										
									<h3>Return Type</h3>
									<select class="form-control" id="addEntry" name="retType">
										<option>Branch Return</option>
										<option>Customer Return</option>
										<option>Warehouse Return</option>					
									</select> 
									
									<h3>Remarks</h3>
									<textarea class="form-control" id="addEntry" rows="3" name="retRemarks"></textarea> <br>
									<br>
									<div class="modFoot">
									<span>
										<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="this.form.reset()" id="canBtn"> Cancel</button>
									</span>
									<span>
										<input type="submit" value="Submit" class="btn btn-success" name="addRet" id="sucBtn">
									</span>
								</div>
								</form> 	

								<div class="modal-footer">
								</div>								
							</div>
						</div>
					</div>
				</div>
				
				<!-- Modal - Returns Archive -->
				<div class="modal fade" id="archive" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Archived Returns</h4>
							</div>
							<div class="modal-body">
								<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="myTable_info" style="width: 100%;">
								
									<!-- Retrieve Return Data -->
									<?php
										$query = $conn->prepare("SELECT product.prodID, product.unitType, returns.returnDate, returns.returnID, product.prodName, returns.returnQty, returns.returnRemark 
																FROM returns INNER JOIN product ON returns.prodID = product.prodID 
																WHERE returns.status = 'Inactive'
																ORDER BY returnID DESC;");
										$query->execute();
										$result = $query->fetchAll();
									?>
									
									<thead>
										<tr id="centerData">
											<th>
												<div id="tabHead">Date</div>
											</th>
											<th>
												<div id="tabHead">Product ID</div> 
											</th>
											<th>
												<div id="tabHead">Product Description</div>
											</th>
											<th>
												<div id="tabHead">Quantity</div>
											</th>
											<th>
												<div id="tabHead">Unit</div>
											</th>
											<th>
												<div id="tabHead">Remarks</div>
											</th>
											<th></th>
										</tr>
									</thead>
									
									<tbody>				
										
										<tr id="centerData">
											<td data-title="Date"><?php echo $item["returnDate"]; ?></td>
											<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
											<td data-title="Description"><?php echo $item["prodName"]; ?></td>
											<td data-title="Quantity"><?php echo $item["returnQty"]; ?></td>
											<td data-title="Unit"><?php echo $item["unitType"];?></td>
											<td data-title="Remarks"><?php echo $item["returnRemark"]; ?></td>
												
											<td>
												<a href="functionalities/restoreReturn.php?retId=<?php echo $retID; ?>">
													<button type="button" class="btn btn-default" id="edBtn" onclick="return confirm('Are you sure you want to remove this entry?');">
														Restore
													</button>
												</a>
											</td>
										</tr>
										<?php
											foreach ($result as $item):
											$retID = $item["returnID"];
										?>
										<tr id="centerData">
											<td data-title="Date"><?php echo $item["returnDate"]; ?></td>
											<td data-title="Product ID"><?php echo $item["prodID"]; ?></td>
											<td data-title="Description"><?php echo $item["prodName"]; ?></td>
											<td data-title="Quantity"><?php echo $item["returnQty"]; ?></td>
											<td data-title="Unit"><?php echo $item["unitType"];?></td>
											<td data-title="Remarks"><?php echo $item["returnRemark"]; ?></td>
												
											<td>
												<a href="functionalities/restoreReturn.php?retId=<?php echo $retID; ?>">
													<button type="button" class="btn btn-default" id="edBtn" onclick="return confirm('Are you sure you want to remove this entry?');">
														Restore
													</button>
												</a>
											</td>
										</tr>
										<?php
											endforeach;
										?>
									</tbody>	
								</table>
							</div>
						</div>
							
						<div class="modal-footer">
						</div>
							
					</div>
				</div>
				
			</div>
		</div>

		<!-- Functionality for Adding Returns -->
		<?php include('functionalities/addReturn.php'); ?>
			
	</body>
</html>

