<?php
	
	$backup_dir		= "..\\datastorage";
	$server_name   	= "localhost";
	$username      	= "root";
	$password      	= "";
	$database_name 	= "dencys";
	$date_string   	= date("Ymd");
	$filename		= $database_name . "_" . $date_string . ".sql";
	$finalpath 		= $backup_dir . "\\" . $filename;

	$cmd = "cd C:\wamp64\bin\mysql\mysql5.7.9\bin && mysqldump.exe -h {$server_name} -u {$username}  {$database_name} > {$finalpath}";
	exec($cmd);

	$writethis 		= "CREATE DATABASE IF NOT EXISTS `dencys` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci; USE `dencys`;";
	$backupcontents = file($finalpath);
	foreach($backupcontents as $lineNumber => &$lineContent) {
    if($lineNumber == 19) {
        $lineContent .= $writethis . PHP_EOL; 
        }
    }
    $allContent = implode("", $backupcontents);
	file_put_contents($finalpath, $allContent);
	$url='..\\backup.php';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
?>