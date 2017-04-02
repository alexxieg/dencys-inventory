<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Accounts</title>

		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="../logo.jpg">
		<link rel="stylesheet" media="screen" type ="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" media="screen" type ="text/css" href="../css/responsive.css">
		
		<script src="../accounts.js"></script>
		<script src="../js/bootstrap.js"></script>
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
	<?php
		$useThisID = $_GET['useID'];
		$query = $conn->prepare("SELECT userID, userName, password, user_role FROM users");
		$query->execute();
		$result = $query->fetchAll();
		
		$query2 = $conn->prepare("SELECT userID, userName, password, user_role FROM users WHERE userID=$useThisID");
		$query2->execute();
		$result2 = $query2->fetchAll();
	?>
			<!-- Page Header and Navigation Bar -->
		<nav class="navbar navbar-inverse navbar-fixed-top" >
		<!-- Header -->
		  <div class="container-fluid" id="navFix">
		    <div class="navbar-header">
			<div id="dencysname"><h2>Dency's Hardware and General Merchandise</h2></div>
		      <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse" id="togBtn">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
		      </button>
				<div class="dropdown">
				  <button class="dropbtn"><i class="glyphicon glyphicon-user"></i> Admin</button>
				  <div class="dropdown-content">
					<a href="../logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
					<a href="#"><button class="btn btn-success btn-md" onclick="myFunction()" id="printBtn">
					<i class="glyphicon glyphicon-print"></i> Print</button></a>
					</div>
				</div>
   			</div>
		  </div><!-- /container -->
		</nav>

		<!-- Side bar -->
		<div class="row row-offcanvas row-offcanvas-left">
			<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
			<div class="collapse navbar-collapse">	
				<ul class="nav nav-pills nav-stacked affix">
				      <div id="sidelogo"><img src="../logo.png" alt=""/></div>
		        <li><a href="../inventory.php" ><i class="glyphicon glyphicon-list-alt"></i> Inventory</a></li>
		        <li><a href="../incoming.php"><i class="glyphicon glyphicon-import"></i> Incoming</a></li>
		        <li><a href="../outgoing.php"><i class="glyphicon glyphicon-export"></i> Outgoing</a></li>
		        <li><a href="../returns.php"><i class="glyphicon glyphicon-sort"></i> Returns</a></li>	
		        <li><a href="../reports.php"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>					
		        <li class="nav-header">
		        	<a href="#" data-toggle="collapse" data-target="#menu2">
		          		<i class="glyphicon glyphicon-pencil"></i>Manage<i class="glyphicon glyphicon-chevron-down"></i>
		          	</a>
		            	<ul class="list-unstyled collapse affix" id="menu2">
		                <li class="active"><a href="../accounts.php"><i class="glyphicon glyphicon-lock"></i>Accounts</a>
		                </li>
		                <li><a href="../employees.php"><i class="glyphicon glyphicon-user"></i> Employees</a>
		                </li>
		                <li><a href="../product.php"><i class="glyphicon glyphicon-folder-open"></i> Products</a>
		                </li>
		                <li><a href="../brands.php"><i class="glyphicon glyphicon-sort-by-attributes"></i> Product Brands</a>
		                </li>
		                <li><a href="../category.php"><i class="glyphicon glyphicon-book"></i> Product Categories</a>
		                </li>
		                <li><a href="../branches.php"><i class="glyphicon glyphicon-random"></i> Branches</a>
		                </li>
		                </ul>
		          </li>                              
		          </ul>
		 	 </div><!--/span-->	
		   </div>
		<!-- end of side  bar -->

	<div class="addInv">
	
	
		<h1 id="headers">Edit Account</h1>
		<div id="contents">
			<form action="" method="POST">
				<?php foreach ($result2 as $row): ?>
				<h3>Username</h3>
				<input type="text" class="form-control" id ="addEntry" placeholder="<?php echo $row["userName"]; ?>" value="<?php echo $row["userName"]; ?>" name="userName"> <br>
				<?php endforeach ?>
				
				<?php foreach ($result2 as $row): ?>
				<h3>Password</h3>
				<input type="password" class="form-control" id ="addEntry" placeholder="<?php echo $row["password"]; ?>" value="<?php echo $row["password"]; ?>" name="psw"> <br>
				<?php endforeach ?>
				
				<?php foreach ($result2 as $row): ?>
				<div class="form-group">
					 <h3>User Role</h3>
					  <select class="form-control" id="addEntry" name="user_role">
						<option>admin</option>
						<option>user</option>
					  </select>
				</div>
				<?php endforeach ?>
				<br>
			<input type="submit" value="Update" class="btn btn-success" name="addAccnt" onclick="alert('New Account Successfully Added');">
			<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px">
			</form> 
		</div>
	</div>
	   
	<?php
		$useThisID= $_GET['useID'];
		$useName=(isset($_REQUEST['userName']) ? $_REQUEST['userName'] : null);
		$passW=(isset($_REQUEST['psw']) ? $_REQUEST['psw'] : null);
		$urole=(isset($_REQUEST['user_role']) ? $_REQUEST['user_role'] : null);
    if (isset($_POST["addAccnt"])){
    
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
		$sql = "UPDATE users SET userName = '$useName', password = '$passW' WHERE userID = '$useThisID'";
    
		$conn->exec($sql);
	}    

	?>
  </body>
</html>