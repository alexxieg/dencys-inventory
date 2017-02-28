<?php

	 require_once 'dbcon.php';

    $incid= $_GET['incId'];
    $result = $conn->prepare("DELETE FROM incoming WHERE inid = '$incid'");
    $result->bindParam('itemid', $incid);
    $result->execute();
    header("location: incoming.php");

?>