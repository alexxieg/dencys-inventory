<?php
	require_once 'dbcon.php';

    $usethisid= $_GET['brandID'];
    $result = $conn->prepare("UPDATE brand SET status = 'Active' WHERE brandID = '$usethisid'");
    $result->execute();
	
    header("location: ../brands.php");

?>