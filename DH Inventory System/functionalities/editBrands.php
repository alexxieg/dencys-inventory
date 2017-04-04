<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Brands</title>
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
    <!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="../css/test.css" rel="stylesheet">
		<link href="../css/sidebar.css" rel="stylesheet">
  </head>
  
  <body>
		<?php
			$brandThisID = $_GET['brandID'];
			$query = $conn->prepare("SELECT brandID, brandName FROM brand");
			$query->execute();
			$result = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT brandID, brandName FROM brand WHERE brandID='$brandThisID'");
			$query2->execute();
			$result2 = $query2->fetchAll();
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
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><i class="glyphicon glyphicon-user"></i> Admin</a></li>
				</ul>
			</div>
		</div>
    </nav>

    <div class="container-fluid">
		<div class="row">
			<div id="navbar" class="col-sm-3 col-md-2 sidebar collapse">
				<ul class="nav nav-sidebar">
						<img src="../logo.png" alt="" width="100px" height="100px" id="sidebarLogo"/>
					<li><a href="../inventory.php"><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
					<li><a href="../incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
					<li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
					<li><a href="#" data-toggle="collapse" data-target="#returns"><i class="glyphicon glyphicon-sort"></i> Returns <i class="glyphicon glyphicon-menu-right"></i></a>
						<ul class="list-unstyled collapse" id="returns">
							<li><a href="../returns.php"><i class="glyphicon glyphicon-sort"></i>Warehouse Returns</a></li>
							<li><a href="../returnSupplier.php"><i class="glyphicon glyphicon-sort"></i>Supplier Returns</a></li>
						</ul>
					</li>
					<li><a href="#" data-toggle="collapse" data-target="#reports"><i class="glyphicon glyphicon-th-list"></i> Reports <i class="glyphicon glyphicon-menu-right"></i></a>
						<ul class="list-unstyled collapse" id="reports">
							<li><a href="../branchReport.php"><i class="glyphicon glyphicon-list-alt"></i> Branch Report</a></li>
						</ul>
					</li>
					<li class="active"><a href="#" data-toggle="collapse" data-target="#manage"><i class="glyphicon glyphicon-pencil"></i> Manage <i class="glyphicon glyphicon-menu-right"><span class="sr-only">(current)</span</i></a>
						<ul class="list-unstyled collapse" id="manage">
							<li><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i> Accounts</a></li>
							<li><a href="../branches.php"><i class="glyphicon glyphicon-random"></i> Branches</a></li>
							<li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a></li>
							<li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a></li>
							<li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a></li>
							<li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a></li>
						</ul>
					</li>
					<li class="PrintBtn"><a href="../print.php"><i class="glyphicon glyphicon-print"></i> Print</a></li>
					<li class="LogBtn"><a href=../"logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- End of Sidebar -->

	<div class="addInv">
	
	
		<h1 id="headers">Edit Brand Entry</h1>
		<div >
			<form action="" method="POST">
				<?php foreach ($result2 as $row): ?>
				<h3>Brand ID</h3>
				<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["brandID"]; ?>" value="<?php echo $row["brandID"]; ?>" name="branID"> <br>
				<?php endforeach ?>
				
				<?php foreach ($result2 as $row): ?>
				<h3>Brand Name</h3>
				<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["brandName"]; ?>" value="<?php echo $row["brandName"]; ?>" name="branName"> <br>
				<?php endforeach ?>
				<br>
			<input type="submit" value="Update" class="btn btn-success" name="addAccnt" onclick="alert('Brand Entry Successfully Edited');">
			<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
			</form> 
		</div>
	</div>
	   
	<?php
		$braID=(isset($_REQUEST['branID']) ? $_REQUEST['branID'] : null);
		$braName=(isset($_REQUEST['branName']) ? $_REQUEST['branName'] : null);
    if (isset($_POST["addAccnt"])){
    
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
		$sql = "UPDATE brand SET brandID = '$braID', brandName = '$braName' WHERE brandID = '$brandThisID'";
    
		$conn->exec($sql);
	}    

	?>
  </body>
</html>