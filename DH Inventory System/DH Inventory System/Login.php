<?php
include('dbcon.php');
if (isset($_POST['username'])) {	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = $conn->prepare("Select * FROM users WHERE userName = '$username' AND password = '$password'");
	$count = $query->execute();
	$count = $query->fetch();
	if ($count > 0) {
	session_start();
		$_SESSION['id'] = $row['username'];
		header("location: inventory.php");
	} else {
?>
<script>
	alert("Invalid Username or Password")
	window.location="index.php";
</script>
<?php 
}
}
?>

		
		