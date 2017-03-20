<?php
	require_once 'dbcon.php';

    $brandID = $_GET['brandId'];
    $result = $conn->prepare("DELETE FROM brand WHERE brandID = '$brandid'");
    $result->execute();
    header("location: brands.php");

?>