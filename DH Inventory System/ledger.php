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
							<li class="active" id="navi"><a href="inventory.php">Inventory</a></li>
							<li><a href="incoming.php">Incoming</a></li>
							<li><a href="outgoing.php">Outgoing</a></li>
							<li><a href="returns.php">Returns</a></li>
							<li><a href="admin.php">Admin</a></li>
						</ul>
					</div>
				</div>
		</nav>
		
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
		?>
		
		<div class="addInv">
			<div>
			<h1 id="headers">Stock Card</h1>
				<table class="table table-striped table-bordered">
					<tr>
						<td colspan="12" style="font-size: 35px;">
							<?php foreach ($res as $row): ?>
								<?php echo $row["prodName"]; break;?>
							<?php endforeach ?>
						</td>
					</tr>
					
					<tr>
						<th>
							Date
						</th>
						
						<th>
							+
						</th>
						
						<th>
							-
						</th>
					</tr>
					
					<?php
						foreach ($res as $item):
					?>
						<tr>	
							<td data-title="Date"><?php echo $item["DATE"]; ?></td>	
							<td data-title="IN"><?php echo $item["Added"];?></td>
							<td data-title="OUT"><?php echo $item["Subracted"]; ?></td>
						</tr>
					<?php
						endforeach;
					?>
				</table>
			</div>
		</div>
		
	</body>
</html>