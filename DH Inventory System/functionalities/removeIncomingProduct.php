<?php
	require_once 'dbcon.php';

    $incomingRemoveID= $_GET['incID'];
    $sql = $conn->prepare("DELETE FROM incoming WHERE inID = $incomingRemoveID");
    $sql->execute();
	
    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>