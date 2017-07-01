<?php

$invalid_formats = array("jpg", "png", "gif", "bmp", "html", "php", "js", "swf", "htm", "xhtml", "jhtml", "php4", "php3", "phtml");
$path = "Files/"; // Upload directory

$fileName = $_FILES["files"]["name"]; // The file name
$fileTmpLoc = $_FILES["files"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["files"]["type"]; // The type of file it is
$fileSize = $_FILES["files"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["files"]["error"]; // 0 for false... and 1 for true

if (!$fileTmpLoc) { // if file not chosen
	echo "ERROR: Please browse for a file before clicking the upload button.";
	exit();
}
if ($fileErrorMsg == 1) {
	echo "ERROR: Could not upload file";
	        exit(); // Skip file if any error found
	    }
	    if( in_array(strtolower(pathinfo($fileName, PATHINFO_EXTENSION)), $invalid_formats) ){
	    	echo "($fileName) is a file type that can't be uploaded";
				exit(); // Skip invalid file formats
			}
			else{
				if (file_exists($path.$fileName)) {

					$x = 1; 

					while(file_exists($path.'('.$x.')'.$fileName)) {
						$x++;
					}
					rename($path.$fileName , $path . '('.$x.')' . $fileName);


				}
				if(move_uploaded_file($fileTmpLoc, "$path/$fileName")){
					echo "$Upload Completed";
				} 
				else {
					echo "move_uploaded_file function failed";
				}
			}
			?>
