<html lang="en">
	<head>
		<meta charset="utf-8">
		<script src="alertboxes/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="alertboxes/sweetalert2.min.css">
		<title> </title>
	</head>
	<body>
<?php
include('dbcon.php');
if (isset($_POST['username'])) {	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = $conn->prepare("Select * FROM users WHERE BINARY userName = BINARY '$username' AND status = 'Active'");
	$count = $query->execute();
	$row = $query->fetch();
	if (password_verify($password, $row['password'])) {
	session_start();
		$_SESSION['id'] = $row['userName'];
		$_SESSION['sess_role'] = $row['user_role'];
		
		echo $_SESSION['sess_role'];
		
    if( $_SESSION['sess_role'] == "admin"){
			header('Location: inventory.php');
 	}elseif ( $_SESSION['sess_role'] == "user"){
			header('Location: userInventory.php');
	} } else {
?>

<body>
<script>
swal({
  title: 'Invalid Username or Password',
  type: 'warning',
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'Ok'
}).then(
  function () {
		window.location.href = "index.php";
  },
  // handling the promise rejection
  function (dismiss) {
    if (dismiss === 'overlay') {
	  window.location.href = "index.php";
    }
  }
)
     
	
</script>
</body>
</html>
<?php 
}
}
?>


		
		