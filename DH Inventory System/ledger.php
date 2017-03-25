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
		    </div>
		   	<h4 id="moduleIdent"><i class="glyphicon glyphicon-user"></i> Admin </h4>		    
		    <img src="logohead.png" id="logohead"/>
		    <form action="?" method="post">
					<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
			</form>
		  </div><!-- /container -->



		<!-- Side bar -->
		<div class="row row-offcanvas row-offcanvas-left">
			<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="collapse navbar-collapse">
				<ul class="nav nav-pills nav-stacked affix">
		        <li><a href="inventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
		        <li><a href="incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
		        <li><a href="outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
		        <li><a href="returns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>
		   	

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
		            <br>	
		            <br>	
		            <br>	
		            <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
		    	</ul>
		 	 </div><!--/span-->	
		   </div>
		<!-- end of side  bar -->
		 </nav><!-- /Header -->
		
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