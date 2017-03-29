<?php
	require_once 'dbcon.php';

    $usethisid= $_GET['useId'];
    $result = $conn->prepare("UPDATE users SET status = 'Active' WHERE userID =  '$usethisid'");
    $result->execute();
    header("location: ../accounts.php");

?>