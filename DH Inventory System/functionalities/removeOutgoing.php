<?php

	 require_once 'dbcon.php';

    $outid= $_GET['outsId'];
    $result = $conn->prepare("UPDATE outgoing SET status = 'Inactive' WHERE outID = '$outid'");
    $result->execute();
    header("location: ../outgoing.php");

?>