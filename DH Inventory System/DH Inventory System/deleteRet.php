<?php

	 require_once 'dbcon.php';

    $retid= $_GET['retId'];
    $result = $conn->prepare("DELETE FROM returns WHERE returnID = '$retid'");
    $result->execute();
    header("location: returns.php");

?>