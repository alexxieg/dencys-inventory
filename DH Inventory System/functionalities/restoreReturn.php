<?php

	require_once 'dbcon.php';

    $retid= $_GET['retId'];
    $result = $conn->prepare("UPDATE returns SET status = 'Active' WHERE returnID = '$retid'");
    $result->execute();
    header("location: ../returns.php");

?>