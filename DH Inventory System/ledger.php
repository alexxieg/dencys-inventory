<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Ledger</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="logo.jpg">

		<!-- Custom styles for this template -->
		<link href="css/test.css" rel="stylesheet">
		<link href="css/sidebar.css" rel="stylesheet">

		<!-- Javascript Files -->
		<script src="js/bootstrap.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">

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
	</head>
	  
	<body>
	  
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
                                    <a href="logout.php" class="active"><i class="glyphicon glyphicon-log-out"></i> LOGOUT</a>
								</li>
                            </ul>
                     </li>
				</ul>
			</div>


    <div class="container-fluid">
		<div class="row navbar-collapse">
			<div id="sidebarCol" class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
						<img src="logo.png" alt="" width="100px" height="100px" id="sidebarLogo"/>
					<li class="active">
						<a href="inventory.php">
							<i class="glyphicon glyphicon-list-alt"></i> Inventory<span class="sr-only">(current)</span>
						</a>
					</li>
					<li><a href="incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
					<li><a href="outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
					<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-retweet"></i> Returns <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
						<ul class="list-unstyled collapse" id="returns">
							<li><a href="returns.php"><i class="glyphicon glyphicon-home"></i> Warehouse Returns</a></li>
							<li><a href="returnSupplier.php"><i class="glyphicon glyphicon-shopping-cart"></i> Supplier Returns</a></li>
						</ul>
					</li>
					<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
						<ul class="list-unstyled collapse" id="reports">
							<li><a href="branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
						</ul>
					</li>
					<li><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-menu-down" id="dropDownArrow"></i></a>
						<ul class="list-unstyled collapse" id="manage">
							<li><a href="accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
							<li><a href="branches.php"><i class="glyphicon glyphicon-home"></i> Branches</a></li>
							<li><a href="employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
							<li><a href="product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
							<li><a href="brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
							<li><a href="category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
						</ul>
					</li>
				</ul>
			</div>
			</div>
			</div>
		</div>
	</nav>	
		<!-- End of Sidebar -->
	
		<!-- Retrieve Ledger Data -->
		<?php
			$incID= $_GET['incId'];
			$query = $conn->prepare("
									SELECT MAX(sameDate) AS 'DATE', SUM(inQuant) AS 'Added', SUM(outQuant) AS 'Subracted', prodName, GROUP_CONCAT(receiptNo SEPARATOR ', ') AS 'Receipt' 
									FROM (SELECT DISTINCT incoming.inDate AS sameDate, incoming.inQty AS inQuant, null AS outQuant, GROUP_CONCAT(incoming.receiptNo) AS receiptNo
									FROM incoming
									WHERE prodID = '$incID'
									GROUP BY inDate, inQty
									UNION
									SELECT DISTINCT outgoing.outDate, null, outgoing.outQty, GROUP_CONCAT(outgoing.receiptNo)
									FROM outgoing
									WHERE prodID = '$incID'
									GROUP BY outDate, outQty
									ORDER BY sameDate ) AS ledgerResult JOIN product 
									WHERE product.prodID = '$incID'
									GROUP BY sameDate
									");
			$query->execute();
			$res = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT physicalQty, prodID FROM inventory WHERE prodID = '$incID'");										
			$query2->execute();
			$resul = $query2->fetchAll();
		
			$request = current($conn->query("SELECT beginningQty FROM inventory WHERE prodID = '$incID'")->fetch());
			$base = $request;
			
			$query3 = $conn->prepare("SELECT remarks FROM inventory WHERE prodID = '$incID'");										
			$query3->execute();
			$invRemark = $query3->fetchAll();	
		?>

	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">		
		<div id="contents">
			<div class="pages no-more-tables">
				<div id="tableHeader">
					<table class="table table-striped table-bordered">
						<h1 id="headers">Stock Card</h1>
						<tr>
							<td>
								Product ID:
								<?php echo $incID;?>
							</td>
							<td>
							Product Name: 
								<?php foreach ($res as $row): ?>
									<?php echo $row["prodName"]; break;?>
								<?php endforeach ?>
							</td>
							
							<td>
								Beginning Quantity: 
								<?php echo $request ?>
							</td>
							<td> 
								Physical Count:
							</td>
						</tr>									
					</table>
					<table class="table table-striped table-bordered">			
						<tr>
							<th>
								Date
							</th>
							
							<th>
								Receipt No.
							</th>
							
							<th>
								+
							</th>
							
							<th>
								-
							</th>
							
							<th>
								Remarks
							</th>
							
							<th>
								Balance
							</th>
						</tr>
						<?php
							foreach ($res as $item):
							
							if ($request == $base){
								$currQty = $request + $item["Added"] - $item["Subracted"];
								$base = 0;
							}
							else {
								$currQty = $currQty + $item["Added"] - $item["Subracted"];
							}
						?>
						
						<tr>	
							<td data-title="Date"><?php echo $item["DATE"]; ?></td>	
							<td data-title="Receipt"><?php echo $item["Receipt"]; ?></td>
							<td data-title="IN"><?php echo $item["Added"];?></td>
							<td data-title="OUT"><?php echo $item["Subracted"]; ?></td>
							<td></td>
							<td data-title="BALANCE"><?php echo $currQty ?></td>
						</tr>
						<?php
							endforeach;
						?>
					</table>
					
					<hr>
				
					<br>
					
					<form action="" method="POST">
					
					<h4>Adjustment</h4>
						<label>Physical Count: </label>
										
						<?php foreach ($resul as $item): ?>							
						<input type="text" id="adjustment" name="adjustUpdate" value="<?php echo $item["physicalQty"]; ?>" placeholder="<?php echo $item["physicalQty"]; ?>">
						<?php endforeach; ?>
						
						<label>Remarks: </label>
						<?php foreach ($invRemark as $forRemark): ?>
						<input type="text" name="additionalRemarks" value="<?php echo $forRemark["remarks"]; ?>" placeholder="<?php echo $forRemark["remarks"]; ?>">
						<?php endforeach; ?>
						
						<button type="submit" name="adjust">Submit</button>

					</form>
				</div>
			</div>
		</div>
	</div>
					
		<?php 

			$incID= $_GET['incId'];
			$quant=(isset($_REQUEST['adjustUpdate']) ? $_REQUEST['adjustUpdate'] : null);
			$remark=(isset($_REQUEST['additionalRemarks']) ? $_REQUEST['additionalRemarks'] : null);
			
			if (isset($_POST["adjust"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "UPDATE inventory SET physicalQty=$quant, remarks='$remark' WHERE prodID = '$incID'";
				$conn->exec($sql);

				
				echo "<meta http-equiv='refresh' content='0'>";
			}

		?>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
