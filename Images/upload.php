<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*100*100*10; //1000 mb
$path = "p/"; // Upload directory
$thumb_dir = "thumb/";
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to execute all files
	foreach ($_FILES['files']['name'] as $f => $name) {
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }
	    if ($_FILES['files']['error'][$f] == 0) {
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files
            if (file_exists($path.$name)) {
                $_SESSION['rannumb'] =  rand(1, 9999);
                rename($path.$name , $path . $_SESSION['rannumb'] . $name);
                rename($thumb_dir.$name, $thumb_dir . $_SESSION['rannumb'] . $name);
                echo "Note:: File found renamed old file";
            }
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name)) {
                copy( $path.$name, $thumb_dir.$name );

                $images = $thumb_dir.$name ;
                $new_images = $thumb_dir.$name ;
                $width=250;
                $file_type = strtolower(pathinfo($path.$name, PATHINFO_EXTENSION));
                echo $file_type;

                // Fix Width & Heigh (Auto calculate)

                $size=GetimageSize($images);
                $height=round($width*$size[1]/$size[0]);
                if($file_type == "jpeg" || $file_type == "jpg" ) {$images_orig = ImageCreateFromJPEG($images);}
                if($file_type == "png") {$images_orig = ImageCreateFromPNG($images);}
                if($file_type == "gif") {$images_orig = ImageCreateFromGIF($images);}
                $photoX = ImagesX($images_orig);
                echo "<br>photoX<br>".$photoX;
                $photoY = ImagesY($images_orig);
                echo "<br>photoY<br>".$photoX;
                $images_fin = ImageCreateTrueColor($width, $height);
                ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                ImageJPEG($images_fin, $new_images);
                ImageDestroy($images_orig);
                ImageDestroy($images_fin);


                echo "The file ". $name. " has been uploaded.";
                $count++; // Number of successfully uploaded file
	            }
	        }
	    }
	}
}
		# error messages
		if (isset($message)) {
			foreach ($message as $msg) {
				printf("<p class='status'>%s</p></ br>\n", $msg);
			}
		}
		# success message
		if($count !=0){
			printf("<p class='status'>%d files added successfully!</p>\n", $count);
		}
		?>
		<br />
		<br />
		<!-- Multiple file upload html form-->
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="files[]" multiple="multiple" accept="image/*">
			<input type="submit" value="Upload">
		</form>
</div>
</body>
</html>
