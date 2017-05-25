<?php
	require_once 'dbcon.php';

    $usethisid= $_GET['useId'];
    $result = $conn->prepare("UPDATE branch SET status = 'Active' WHERE branchID = '$usethisid'");
    $result->execute();
	
    header("location: ../branches.php");

?>