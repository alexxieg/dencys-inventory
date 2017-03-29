<?php

	 require_once 'dbcon.php';

    $outid= $_GET['outsId'];
    $result = $conn->prepare("UPDATE outgoing SET status = 'Active' WHERE outID = '$outid'");
    $result->execute();
    header("location: ../outgoing.php");

?>