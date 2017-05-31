<?php
	require_once 'dbcon.php';

    $usethisid= $_GET['useId'];
    $result = $conn->prepare("UPDATE branch SET status = 'Active' WHERE branchID = '$usethisid'");
    $result->execute();
	
	$result2 = $conn->prepare("UPDATE branch SET restoreDate = CURDATE() WHERE branchID = '$usethisid'");
	$result2->execute();
	
    header("location: ../branches.php");

?>