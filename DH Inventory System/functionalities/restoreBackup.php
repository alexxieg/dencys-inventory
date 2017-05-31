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
	foreach($backupcontents as $lineNumber => &$lineContent) { //Loop through the array (the "lines")
    if($lineNumber == 19) { //Remember we start at line 0.
        $lineContent .= $writethis . PHP_EOL; //Modify the line. (We're adding another line by using PHP_EOL)
        }
    }
    $allContent = implode("", $backupcontents); //Put the array back into one string
	file_put_contents($finalpath, $allContent);


	$target_dir = "../datastorage";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
?>