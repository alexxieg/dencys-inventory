<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Product Issuance Report</title>
		
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">
		
		<!--Javascript Files -->
		<script src="returns.js"></script>
		<script src="js/bootstrap.js"></script>
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
		<?php include('functionalities/fetchInventory.php'); ?>
		
		<!-- Fetch Outgoing Data per Branch -->
		<?php 
			$sortByMonthDate = (isset($_REQUEST['dateMonthName']) ? $_REQUEST['dateMonthName'] : null);
			if (!empty($sortByMonthDate)) { 
				$selectedMonth = $sortByMonthDate;
			} else {
				$selectedMonth = "-SELECTA-";
			}
			
			$sortByYearDate = (isset($_REQUEST['dateYearName']) ? $_REQUEST['dateYearName'] : null);
			if (!empty($sortByYearDate)) { 
				$selectedYear = $sortByYearDate;
			} else {
				$selectedYear = "-SELECTA-";
			}
			
			/* For Camdas Query */
			if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) { 
				$query = $conn->prepare("SELECT prodName, outQty 
										FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
										JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Camdas' 
										AND MONTHNAME(outDate) = '$sortByMonthDate' AND YEAR(outDate) = $sortByYearDate;");
				$query->execute();
				$result1 = $query->fetchAll();
			} else {
				$query = $conn->prepare("SELECT prodName, outQty 
										FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
										JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Camdas' 
										AND MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE());");
				$query->execute();
				$result1 = $query->fetchAll();
			}
			
			/* For Hilltop Query */
			if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) {
				$query2 = $conn->prepare("SELECT prodName, outQty 
										FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
										JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Hilltop'
										AND MONTHNAME(outDate) = '$sortByMonthDate' AND YEAR(outDate) = $sortByYearDate;");
				$query2->execute();
				$result2 = $query2->fetchAll();
			} else {
				$query2 = $conn->prepare("SELECT prodName, outQty 
										FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
										JOIN branch ON branch.branchID = outgoing.branchID WHERE location='Hilltop'
										AND MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE());");
				$query2->execute();
				$result2 = $query2->fetchAll();
			}
			
			/* For KM 4 Query */
			if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) {
				$query3 = $conn->prepare("SELECT prodName, outQty 
										FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
										JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 4'
										AND MONTHNAME(outDate) = '$sortByMonthDate' AND YEAR(outDate) = $sortByYearDate;");
				$query3->execute();
				$result3 = $query3->fetchAll();
			} else {
				$query3 = $conn->prepare("SELECT prodName, outQty 
										FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
										JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 4'
										AND MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE());");
				$query3->execute();
				$result3 = $query3->fetchAll();
			}
			
			/* For KM 5 Query */
			if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) {
				$query4 = $conn->prepare("SELECT prodName, outQty 
										FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
										JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 5'
										AND MONTHNAME(outDate) = '$sortByMonthDate' AND YEAR(outDate) = $sortByYearDate;");
				$query4->execute();
				$result4 = $query4->fetchAll();
			} else {
				$query4 = $conn->prepare("SELECT prodName, outQty 
										FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
										JOIN branch ON branch.branchID = outgoing.branchID WHERE location='KM 5'
										AND MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE());");
				$query4->execute();
				$result4 = $query4->fetchAll();
			}
			
			/* For San Fernando Query */
			if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) {
				$query5 = $conn->prepare("SELECT prodName, outQty 
										FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
										JOIN branch ON branch.branchID = outgoing.branchID WHERE location='San Fernando'
										AND MONTHNAME(outDate) = '$sortByMonthDate' AND YEAR(outDate) = $sortByYearDate;");
				$query5->execute();
				$result5 = $query5->fetchAll();
			} else {
				$query5 = $conn->prepare("SELECT prodName, outQty 
										FROM outgoing JOIN product ON outgoing.prodID = product.prodID 
										JOIN branch ON branch.branchID = outgoing.branchID WHERE location='San Fernando'
										AND MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE());");
				$query5->execute();
				$result5 = $query5->fetchAll();
			}
			
			/* For Branch Overall Query */
			if (!empty($sortByMonthDate) AND !empty($sortByYearDate)) {
				$query6 = $conn->prepare("SELECT SUM(outQty) AS 'TOTAL_QUANTITY', location 
											FROM outgoing JOIN branch ON outgoing.branchID = branch.branchID 
											WHERE MONTHNAME(outDate) = '$sortByMonthDate' AND YEAR(outDate) = $sortByYearDate
											GROUP BY location ORDER BY TOTAL_QUANTITY DESC;");
				$query6->execute();
				$result6 = $query6->fetchAll();
			} else {
				$query6 = $conn->prepare("SELECT SUM(outQty) AS 'TOTAL_QUANTITY', location 
											FROM outgoing JOIN branch ON outgoing.branchID = branch.branchID 
											WHERE MONTHNAME(outDate) = MONTHNAME(CURDATE()) AND YEAR(outDate) = YEAR(CURDATE())
											GROUP BY location ORDER BY TOTAL_QUANTITY DESC;");
				$query6->execute();
				$result6 = $query6->fetchAll();
			}
			
			/* For Date */
			$queryMonth = $conn->prepare("SELECT DISTINCT MONTHNAME(outDate) AS nowMonthDate, (SELECT DISTINCT YEAR(outDate) FROM outgoing) AS nowYearDate, MONTH(curdate()) AS currentMonthDate 
								FROM outgoing;");
			$queryMonth->execute();
			$resultMonth = $queryMonth->fetchAll();
			
			$queryYear = $conn->prepare("SELECT DISTINCT YEAR(outDate) AS nowYearDate FROM outgoing");
			$queryYear->execute();
			$resultYear = $queryYear->fetchAll();
		?>
	
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
					<a class="navbar-brand" href="#">DENCY'S HARDWARE AND GENERAL MERCHANDISE</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li id="adminhead"><a href="#">User |</a></li>
						<li><a href="Logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End of Top Main Header -->

		<div class="container-fluid">
			<div class="row navbar-collapse">
			
				<!-- Sidebar -->
				<div id="sidebarCol" class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<div id="sidebarLogo"><img src="logo.png" alt=""/></div>
						<li><a href="#"data-toggle="collapse" data-target="#inventory"><i class="glyphicon glyphicon-list-alt"></i> Inventory </span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="inventory">
								<li><a href="userinventory.php"><i class="glyphicon glyphicon-list"></i> Current Inventory</a></li>
								<li><a href="adddefectives.php"><i class="glyphicon glyphicon-list"></i> Add Defectives</a></li>
							</ul>
						</li>
						<li><a href="#" data-toggle="collapse" data-target="#incoming"><i class="glyphicon glyphicon-import"></i> Product Deliveries <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="incoming">
								<li><a href="userincoming.php"><i class="glyphicon glyphicon-list"></i> Purchase Orders</a></li>
								<li><a href="userproductdeliveries.php"><i class="glyphicon glyphicon-list"></i> Delivered Products</a></li>
							</ul>
						</li>
						<li><a href="useroutgoing.php"><i class="glyphicon glyphicon-export"></i> Product Issuance</a></li>
						<li ><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="returns">
								<li><a href="userReturnsWarehouse.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
								<li><a href="userreturnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
							</ul>
						</li>
						<li class="active"><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <span class="sr-only">(current)</span><i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
							<ul class="list-unstyled collapse" id="reports">
								<li><a href="userbranchreport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
								<li><a href="usermonthlyin.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (IN)</a></li>
								<li><a href="usermonthlyout.php"><i class="glyphicon glyphicon-list-alt"></i> Product Summary (OUT)</a></li>
							</ul>
						</li>
						<li><a href="userproduct.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
					</ul>
				</div>
				<!-- End of Sidebar -->
		 			
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">	
					<div id="contents">
						<div class="pages no-more-tables">							
							<div class="container">	
								<h2 id="headers">Summary of Products Issued per Branch for the Month</h2>

								<ul class="nav nav-pills" id="navjust">
									<li>
										<a href="#mainOutSummary" data-toggle="tab">
											<span>Outgoing</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryCamdas" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>Camdas</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryHilltop" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">
											<span>Hilltop</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryKM4" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>KM 4</span>
										</a>
									</li>
									<li>
										<a href="#outSummaryKM5" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>KM 5</span>
										</a>
									</li>
									<li>
										<a href="#outSummarySF" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">
											<span>San Fernando</span>
										</a>
									</li>
								</ul>

								<div class="tab-content clearfix">
									<!-- Overall Outgoing Branch -->
									<div class="tab-pane active" id="mainOutSummary">
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" width="80%" role="grid" aria-describedby="myTable_info">
											<label>View Previous Reports</label>
											<form class="form-inline" action="" method="post">
												<div class="form-group">
													<select name="dateMonthName" class="form-control">
														<option value="<?php echo $selectedMonth ?>" SELECTED>Selected: <?php echo $selectedMonth ?></option>
														<?php foreach ($resultMonth as $rowMonth): ?>
															<option value="<?=$rowMonth["nowMonthDate"]?>"><?=$rowMonth["nowMonthDate"]?></option>
														<?php endforeach ?>
													</select>
												</div>
												<div class="form-group">
													<select name="dateYearName" class="form-control">
														<option value="<?php echo $selectedYear ?>">Selected: <?php echo $selectedYear ?></option>
														<?php foreach ($resultYear as $rowYear): ?>
															<option value="<?=$rowYear["nowYearDate"]?>"><?=$rowYear["nowYearDate"]?></option>
														<?php endforeach ?>
													</select>
												</div>	
												<div class="form-group">
													<input type="submit" value="View" class="btn btn-success" name="submit">
												</div>
											</form>	
													
											<thead>
												<tr id="centerData">
													<th>Location</th>
													<th>Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result6 as $item6):
												?>
												<tr id="centerData">
													<td data-title="Location"><?php echo $item6["location"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item6["TOTAL_QUANTITY"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
									
									<!-- Camdas Outgoing Summary -->
									<div class="tab-pane" id="outSummaryCamdas">
										<h3>Outgoing Products in Camdas:</h3>
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
											<thead>
												<tr id="centerData">
													<th>Product Description</th>
													<th>Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result1 as $item):
												?>
												<tr id="centerData">
													<td data-title="Product Description"><?php echo $item["prodName"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item["outQty"]; ?></td>
												</tr>
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
									
									<!-- Hilltop Outgoing Summary -->
									 <div class="tab-pane" id="outSummaryHilltop">
										<h3>Outgoing Products in Hilltop:</h3>
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
											<thead>
												<tr id="centerData">
													<th>Product Description</th>
													<th>Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result2 as $item2):
												?>
												<tr id="centerData">
													<td data-title="Product Description"><?php echo $item2["prodName"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item2["outQty"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									 </div>
									 
									 <!-- KM 4 Outgoing Summary-->
									<div class="tab-pane" id="outSummaryKM4">
										<h3>Outgoing Products in KM4:</h3>
										<table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
											<thead>
												<tr id="centerData">
													<th>Product Description</th>
													<th>Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result3 as $item3):
												?>
												<tr id="centerData">
													<td data-title="Product Description"><?php echo $item3["prodName"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item3["outQty"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
									
									<!-- KM5 Outgoing Summary-->
									<div class="tab-pane" id="outSummaryKM5">
									<h3>Outgoing Products in KM5:</h3>
									  <table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
											<thead>
												<tr id="centerData">
													<th>Product Description</th>
													<th>Total Quantity</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result4 as $item4):
												?>
												<tr id="centerData">
													<td data-title="Product Description"><?php echo $item4["prodName"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item4["outQty"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
									
									<!-- San Fernando Outgoing Summary -->
									<div class="tab-pane" id="outSummarySF">
									<h3>Outgoing Products in San Fernando, La Union:</h3>
									  <table id="myTable" class="table table-hover table-bordered dataTable" cellspacing="0" role="grid" aria-describedby="myTable_info">
											<thead>
												<tr id="centerData">
													<th>Product Description</th>
													<th>Total Quantity</th>

												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($result5 as $item5):
												?>
												<tr id="centerData">
													<td data-title="Product Description"><?php echo $item5["prodName"]; ?></td>
													<td data-title="Total Quantity"><?php echo $item5["outQty"]; ?></td>
												</tr>
													
												<?php
													endforeach;
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
					
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
									
	</body>
</html>
