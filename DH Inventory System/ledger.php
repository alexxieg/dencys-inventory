<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ledger</title>
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
		        <li><a href="inventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
		        <li><a href="incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
		        <li><a href="outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
		        <li><a href="returns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>
				<li><a href="reports.php"><i class="glyphicon glyphicon-sort"></i> Reports</a></li>
		   	
		        <li class="nav-header">  	
		        	<a href="#" data-toggle="collapse" data-target="#menu2">
		          		<i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-chevron-right"></i>
		          	</a>
		            <ul class="list-unstyled collapse" id="menu2">
		                <li><a href="accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a>
		                </li>
		                <li><a href="employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a>
		                </li>
		                <li><a href="product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a>
		                </li>
		                <li><a href="brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a>
		                </li>
		                <li><a href="category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a>
		                </li>
		                <li><a href="branches.php"><i class="glyphicon glyphicon-random"></i> Branches</a>
		                </li>                              
		            </ul>
		    	</ul>
		 	 </div><!--/span-->	
		   </div>
		<!-- end of side  bar -->
		 </nav><!-- /Header -->
	
		<!-- Retrieve Ledger Data -->
		<?php
			$incID= $_GET['incId'];
			$query = $conn->prepare("
									SELECT MAX(SamDate) AS 'DATE', SUM(inQuant) AS 'Added', SUM(outQuant) AS 'Subracted', prodName FROM (SELECT DISTINCT incoming.inDate AS SamDate, incoming.inQty AS inQuant, null AS outQuant
									FROM incoming
									WHERE prodID='$incID'
									UNION
									SELECT DISTINCT outgoing.outDate, null, outgoing.outQty
									FROM outgoing
									WHERE prodID='$incID'
									ORDER BY SamDate) AS SHYT JOIN product 
									WHERE product.prodID='$incID'
									GROUP BY SamDate
									");
			$query->execute();
			$res = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT phyCount, prodID FROM inventory WHERE prodID = '$incID'");										
			$query2->execute();
			$resul = $query2->fetchAll();
		
			$request = current($conn->query("SELECT initialQty FROM inventory WHERE prodID = '$incID'")->fetch());
			$base = $request;
			
			$query3 = $conn->prepare("SELECT remarks FROM inventory WHERE prodID = '$incID'");										
			$query3->execute();
			$thisRemark = $query3->fetchAll();	
		?>
		
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
								Transaction ID
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
							<td data-title="TransID"></td>
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
						<input type="text" id="adjustment" name="adjustUpdate" value="<?php echo $item["phyCount"]; ?>" placeholder="<?php echo $item["phyCount"]; ?>">
						<?php endforeach; ?>
						
						<label>Remarks: </label>
						<?php foreach ($thisRemark as $forRemark): ?>
						<input type="text" name="additionalRemarks" value="<?php echo $forRemark["remarks"]; ?>" placeholder="<?php echo $forRemark["remarks"]; ?>">
						<?php endforeach; ?>
						
						<button type="submit" name="adjust">Submit</button>

					</form>
				</div>
			</div>
		</div>
					
		<?php 

			$incID= $_GET['incId'];
			$quant=(isset($_REQUEST['adjustUpdate']) ? $_REQUEST['adjustUpdate'] : null);
			$remark=(isset($_REQUEST['additionalRemarks']) ? $_REQUEST['additionalRemarks'] : null);
			
			if (isset($_POST["adjust"])){
			
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				$sql = "UPDATE inventory SET phyCount=$quant, remarks='$remark' WHERE prodID = '$incID'";
				$conn->exec($sql);

				
				echo "<meta http-equiv='refresh' content='0'>";
			}

		?>
	</body>
</html>
