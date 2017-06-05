<?php
	
	$backup_dir		= "D:";
	$server_name   	= "localhost";
	$username      	= "root";
	$password      	= "";
	$database_name 	= "dencys";
	$date_string   	= date("Ymd");
	$filename		= $database_name . "_" . $date_string . ".sql";
	$finalpath 		= $backup_dir . "\\" . $filename;
	$writethis 		= "CREATE DATABASE IF NOT EXISTS `dencys` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci; USE `dencys`;";

	$cmd = "cd C:\Program Files\MySQL\MySQL Workbench 6.3 CE && mysqldump.exe -h {$server_name} -u {$username}  {$database_name} > {$finalpath}";


	exec($cmd);

	$backupcontents = file($finalpath);
	foreach($backupcontents as $lineNumber => &$lineContent) { 
    if($lineNumber == 19) { 
        $lineContent .= $writethis . PHP_EOL; 
        }
    }
    $allContent = implode("", $backupcontents);
	file_put_contents($finalpath, $allContent);


	$target_dir = "D:\\";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	if(isset($_POST["submit"])) {
	    $check = $_FILES["fileToUpload"]["type"];
	    if($check == 'application/sql') {
	        echo "File is not a valid sql database.";
	    } else {
	    	$db = new PDO('mysql:host=localhost', 'root', '');
	    	$res = file_get_contents($target_file);
	    	$qr = $db->exec($res);
	    	echo 'Backup Restored';
			$url='..\\backup.php';
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	    }
	}	
?>