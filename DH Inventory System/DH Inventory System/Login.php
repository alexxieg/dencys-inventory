<?php
include('dbcon.php');
if (isset($_POST['username'])) {	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = $conn->prepare("Select * FROM users WHERE userName = '$username' AND password = '$password'");
	$count = $query->execute();
	$row = $query->fetch();
	if ($query->rowCount() > 0) {
	session_start();
		$_SESSION['id'] = $row['userName'];
		$_SESSION['sess_role'] = $row['user_role'];
		
		echo $_SESSION['sess_role'];
		
     if( $_SESSION['sess_role'] == "admin"){
			header('Location: inventory.php');
   } elseif ( $_SESSION['sess_role'] == "user"){
			header('Location: userinventory.php');
	} } else {
?>
<script>
	alert("Invalid Username or Password")
	window.location="index.php";
</script>
<?php 
}
}
?>

		
		