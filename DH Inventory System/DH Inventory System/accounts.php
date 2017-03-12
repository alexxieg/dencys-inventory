<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		function validateForm() {
			if(document.getElementById('adduser').value == "") {
				alert('Please Enter Username');
				document.getElementById('adduser').style.borderColor = "red";
				return false;
			}
			if (document.getElementById('addpass').value == "") {
				alert('Please Enter Password');
				document.getElementById('addpass').style.borderColor = "red";
				return false;
			}
			if(confirm('Are you sure you want to add this account?')) {
				alert("New Account Successfully Added");
				return true;
				
			}
			else {
				return false;		
			}
		}
		</script>
	<title>Accounts</title>
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
		
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="logo.jpg">
    <link rel="stylesheet" media="screen" type ="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
	<body>
		<?php
			$query = $conn->prepare("SELECT userID, userName, password FROM users");
			$query->execute();
			$result = $query->fetchAll();
		?>

		<div class="productHolder" >
			<nav class="navbar navbar-inverse navbar-fixed-top" >
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
		</div>	

	<div id="contents">
		<div class="pages">
			<div id="tableHeader">
				<table class="table table-striped table-bordered">		
					<h1 id="headers">ACCOUNTS</h1>
						<form action="?" method="post">
							<input type="text" class="form-control" placeholder="Search" id="searchBar" name="search">
						</form>
					<button type="button" class="btn btn-info btn-lg btnclr" data-toggle="modal" data-target="#myModal" id="modbutt">Add Account</button>							
				</table>
			</div>
				
			<div class="prodTable">
				<table class="table table-bordered" id="tables">
					<tr>
						<th>Username</th>
						<th>Password</th>
	
						<th></th>
					</tr>
						
						<?php
							foreach ($result as $item):
							$useThisID = $item["userID"];
						?>

						<tr>
							<td><?php echo $item["userName"]; ?></td>
							<td><?php echo $item["password"]; ?></td>
					
							<td>
								<a href="editAccounts.php?useID=<?php echo $useThisID; ?>" target="_blank">
								<button type="button" class="btn btn-default">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</button>
								</a>
								<a href="deleteAcc.php?useId=<?php echo $useThisID; ?>"> 
								<button type="button" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this entry?');">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</button>
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
							  <h4 class="modal-title">Add Account</h4>
							</div>
							<div class="modal-body">
								<form action="" method="POST" onsubmit="return validateForm()">
				<h3>Username</h3>
				<input type="text" class="form-control" id ="adduser" placeholder="Name" name="userName"> <br>
				
				<h3>Password</h3>
				<input type="password" class="form-control" id ="addpass" placeholder="User Password" name="psw"> <br>
				
				<div class="form-group">
					 <h3>User Role</h3>
					  <select class="form-control" id="addEntry" name="user_role">
						<option>admin</option>
						<option>user</option>
					  </select>
				</div>
			
				 <br>
					
				<input type="submit" value="Add" class="btn btn-success" name="addAccnt">
			<input type="submit" value="Cancel" class="btn btn-default" style="width: 100px" data-dismiss="modal" onclick="this.form.reset()">
			</form> 
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-default btnclr" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		<nav class="navbar navbar-inverse navbar-fixed-bottom">
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
					<ul class="nav navbar-nav navbar-right" id="logout">
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<?php
    
    if (isset($_POST["addAccnt"])){
    
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
		$sql = "INSERT INTO users (userName, password, user_role)
		VALUES ('".$_POST['userName']."','".$_POST['psw']."','".$_POST['user_role']."')";
    
		$conn->exec($sql);
		echo "<meta http-equiv='refresh' content='0'>";
	}    

	?>
  </body>
</html>

