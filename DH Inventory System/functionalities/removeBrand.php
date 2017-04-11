<?php
	require_once 'dbcon.php';

    $brandRemoveID= $_GET['brandID'];
    $result = $conn->prepare("UPDATE brand SET status = 'Inactive' WHERE brandID = '$brandRemoveID'");
    $result->execute();
	
    header("location: ../brands.php");

?>