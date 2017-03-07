<?php

	 require_once 'dbcon.php';

    $incid= $_GET['incId'];
    $result = $conn->prepare("DELETE FROM incoming WHERE inid = '$incid'");
    $result->execute();
    header("location: userincoming.php");

?>