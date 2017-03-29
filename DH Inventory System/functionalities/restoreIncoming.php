<?php

	require_once 'dbcon.php';

    $incid= $_GET['incId'];
    $result = $conn->prepare("UPDATE incoming SET status = 'Active' WHERE inid = '$incid'");
    $result->execute();
    header("location: ../incoming.php");

?>