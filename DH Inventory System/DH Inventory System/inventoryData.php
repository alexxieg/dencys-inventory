<?php
	$currQty = $item["initialQty"] + $item["inQty"] - $item["outQty"];
	
	$sql = "INSERT INTO inventory (inQty, outQty)
				VALUES ('".$_POST['incQty']."',CURDATE(),'".$_POST['rcno']."','".$_POST['inRemarks']."','$emp3','$prod3')";
		$result = $conn->query($sql);
?> 