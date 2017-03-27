<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Incoming Products</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
		
		<script src="incoming.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<?php include('dbcon.php'); ?>
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
		<?php include('functionalities/fetchIncoming.php'); ?>
		
	<!-- Page Header and Navigation Bar -->				
<nav class="navbar navbar-inverse navbar-fixed-top" >
		<!-- Header -->
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse" id="togBtn">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
		      </button>

		      <img src="logohead.png" id="logohead"/>

            <div class="dropdown">
			  <button class="dropbtn"><i class="glyphicon glyphicon-user"></i> Admin</button>
			  <div class="dropdown-content">
			    <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
			    <a href="#"><button class="btn btn-success btn-md" onclick="myFunction()" id="printBtn">
							<i class="glyphicon glyphicon-print"></i> Print</button></a>
		    </div>
		</div>

   			</div>
		    
		    <form action="?" method="post">
					<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
			</form>
		  </div><!-- /container -->
		</nav>

		<!-- Side bar -->
		<div class="row row-offcanvas row-offcanvas-left">
			<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="collapse navbar-collapse">
				<ul class="nav nav-pills nav-stacked affix">
		        <li><a href="userinventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
		        <li><a href="userincoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
		        <li><a href="useroutgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
		        <li><a href="userreturns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>
		    	<li><a href="userproduct.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
		      	</ul>
		 	 </div><!--/span-->	
		   </div>
		<!-- end of side  bar -->
		 </nav><!-- /Header -->


		<div id="contents">
			<div class="pages no-more-tables">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">
						<h1 id="headers">INCOMING PRODUCTS</h1>
						<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">Add Incoming Product</button>
					</table>
				</div>
				
				<table class="table table-striped table-bordered">	
					<tr>
						<th>
							Date
							<button type="button" class="btn btn-default" value="?orderBy=inDate DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=inDate ASC" onclick="location = this.value;" id="sortBtn">
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
							Employee
							<button type="button" class="btn btn-default" value="?orderBy=empName DESC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" id="arrowBtn"></span>
							</button>
							<button type="button" class="btn btn-default" value="?orderBy=empName ASC" onclick="location = this.value;" id="sortBtn">
								<span class="glyphicon glyphicon-chevron-up" aria-hidden="true" id="arrowBtn"></span>
							</button>
						</th>
						<th>
							Receipt No.
							
						</th>
						
						<th>
							Remarks
						</th>
						<th></th>
					</tr>
							
					<?php
						foreach ($result as $item):
						$incID = $item["inID"];
					?>

					<tr id="centerData">
						<td data-title="Date"><?php echo $item["inDate"]; ?></td>	
						<td data-title="Product ID"><?php echo $item["prodID"];?></td>
						<td data-title="Description"><?php echo $item["prodName"]; ?></td>
						<td data-title="Model"><?php echo $item["model"]; ?></td>
						<td data-title="Quantity"><?php echo $item["inQty"]; ?></td>
						<td data-title="Unit"><?php echo $item["unitType"]; ?></td>
						<td data-title="Employee"><?php echo $item["empName"]; ?></td>
						<td data-title="Receipt No."><?php echo $item["receiptNo"]; ?></td>
						<td data-title="Remarks"><?php echo $item["inRemarks"]; ?></td>
						<td>
							<a href="editIn.php?incId=<?php echo $incID; ?>" target="_blank"> 
							<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</button>
							</a>
							<a href="deleteInc.php?incId=<?php echo $incID; ?>"> 
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
								<h4 class="modal-title">Add Incoming Product</h4>
							</div>
							<div class="modal-body">
								<form action="" method="POST" onsubmit="return validateForm()">
									<h5>Receipt No.</h5> 
									<input type="text" class="form-control" id ="addRcpt" placeholder="Receipt Number" name="rcno"><br>
									
									<h5>Employee</h5>
									<?php
										$query = $conn->prepare("SELECT empName FROM employee ");
										$query->execute();
										$res = $query->fetchAll();
									?>
													
									<select class="form-control" id="addEmpl" name="emp">
										<?php foreach ($res as $row): ?>
											<option><?=$row["empName"]?></option>
										<?php endforeach ?>
									</select> 
									
									<br>
											
									<table class="table table-striped" id="dataTable" name="chk">
														
										<tbody>
											<tr>
												<td><input type="checkbox" name="chk"></TD>
												<td><input type="hidden" value="1" name="num" id="orderdata">1</TD>
												<td>	
													<?php
														$query = $conn->prepare("SELECT prodName FROM product ");
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
													<input type="number" min="1" class="form-control" id ="addQty" placeholder="Item Quantity" name="incQty[]">
												</td>
												
												<td>
													<input type="text" class="form-control" id="addRem" placeholder="Remarks" name="inRemarks[]">
												</td>
											</tr>
										</tbody>
									</table>
									
									<br>
									
									<span><button type="button" class="btn btn-default" value="Add Row" onclick="addRow('dataTable')">Add Product</button></span>
									<span> <button type="button" value="Delete Row" class="btn btn-default" onclick="deleteRow('dataTable')">Remove from List</button></span>
									<br>
									<br>
									<div class="modFoot">
									<span>
										<input type="button" class="btn btn-danger" value="Cancel" data-dismiss="modal" onclick="this.form.reset()" id="canBtn">
									</span>
									<span>
										<input type="submit" name="submit" value="Submit"class="btn btn-success" id="sucBtn">
									</span>
									</div>
								</form> 			
							</div>
						
							<div class="modal-footer">
								</div>
							</div>
						</div>
					</div>      	
				</div>
			</div>	
		</div>
				
		<?php include('functionalities/addIncoming.php'); ?>
</body>
</html>
