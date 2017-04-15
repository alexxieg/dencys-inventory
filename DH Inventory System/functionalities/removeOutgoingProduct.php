<?php
	require_once 'dbcon.php';

    $outgoingRemoveID= $_GET['outID'];
    $sql = $conn->prepare("DELETE FROM outgoing WHERE outID = $outgoingRemoveID");
    $sql->execute();
	
    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>