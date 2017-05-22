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
if (isset($_POST['password'])) {	
	$password = $_POST['password'];
	$query = $conn->prepare("Select * FROM users WHERE password = '$password' AND user_role = 'admin'");
	$count = $query->execute();
	$row = $query->fetch();
	if ($query->rowCount() > 0) {
	session_start();
		header("Location: viewAccounts.php");
		
	} else {
?>
<body>
<script>
swal({
  title: 'Wrong Password!',
  type: 'warning',
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'Ok'
}).then(
  function () {
		window.location.href = "accounts.php";
  },
  // handling the promise rejection
  function (dismiss) {
    if (dismiss === 'overlay') {
	  window.location.href = "accounts.php";
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


		
		