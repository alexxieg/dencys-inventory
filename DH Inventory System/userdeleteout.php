<?php

	 require_once 'dbcon.php';

    $outid= $_GET['outsId'];
    $result = $conn->prepare("DELETE FROM outgoing WHERE outID = '$outid'");
    $result->execute();
    header("location: userOutgoing.php");

?>