<?php
	require_once 'dbcon.php';

    $usethisid= $_GET['brandID'];
    $result = $conn->prepare("UPDATE brand SET status = 'Active' WHERE brandID = '$usethisid'");
    $result->execute();
	
	$result2 = $conn->prepare("UPDATE branch SET restoreDate = CURDATE() WHERE branchID = '$usethisid'");
	$result2->execute();
	
    header("location: ../brands.php");

?>