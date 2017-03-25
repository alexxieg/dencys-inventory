<?php

	 require_once 'dbcon.php';

    $usethisid= $_GET['useId'];
    $result = $conn->prepare("DELETE FROM users WHERE userID = '$usethisid'");
    $result->execute();
    header("location: accounts.php");

?>