<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Category</title>
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
		<?php
			$catThisID = $_GET['useID'];
			$query = $conn->prepare("SELECT categoryID, categoryName FROM category");
			$query->execute();
			$result = $query->fetchAll();
			
			$query2 = $conn->prepare("SELECT categoryID, categoryName FROM category WHERE categoryID = '$catThisID'");
			$query2->execute();
			$result2 = $query2->fetchAll();
		?>
		<nav class="navbar navbar-inverse navbar-static-top" >
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1>Dency's Hardware and General Merchandise</h1>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right" id="categories">
							<li><a href="inventory.php">Inventory</a></li>
							<li><a href="incoming.php">Incoming</a></li>
							<li><a href="outgoing.php">Outgoing</a></li>
							<li><a href="returns.php">Returns</a></li>
							<li><a href="admin.html">Admin</a></li>
						</ul>
				</div>
			</div>
		</nav>

	<div class="addInv">
	
	
		<h1 id="headers">Edit Category Entry</h1>
		<div >
			<form action="" method="POST">
				<?php foreach ($result2 as $row): ?>
				<h3>Category ID</h3>
				<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["categoryID"]; ?>" value="<?php echo $row["categoryID"]; ?>" name="catID"> <br>
				<?php endforeach ?>
				
				<?php foreach ($result2 as $row): ?>
				<h3>Category Name</h3>
				<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["categoryName"]; ?>" value="<?php echo $row["categoryName"]; ?>" name="catName"> <br>
				<?php endforeach ?>
				<br>
			<input type="submit" value="Update" class="btn btn-success" name="addAccnt" onclick="alert('Brand Entry Successfully Edited');">
			<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
			</form> 
		</div>
	</div>
	   
	<?php
		$cateID=(isset($_REQUEST['catID']) ? $_REQUEST['catID'] : null);
		$cateName=(isset($_REQUEST['catName']) ? $_REQUEST['catName'] : null);
    if (isset($_POST["addAccnt"])){
    
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
		$sql = "UPDATE category SET categoryID = '$cateID', categoryName = '$cateName' WHERE categoryID = '$catThisID'";
    
		$conn->exec($sql);
	}    

	?>
  </body>
</html>