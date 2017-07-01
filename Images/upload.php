<?php
$valid_formats = array("jpg", "png", "gif", "bmp");
$max_file_size = 1024*100*100*10000; //1000 mb
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
			elseif( !in_array(strtolower(pathinfo($name, PATHINFO_EXTENSION)), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files
            if (file_exists($path.$name)) {
                $_SESSION['rannumb'] =  rand(1, 9999);
                rename($path.$name , $path . $_SESSION['rannumb'] . $name);
                rename($thumb_dir.$name, $thumb_dir . $_SESSION['rannumb'] . $name);
            }
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name)) {
                copy( $path.$name, $thumb_dir.$name );

                $images = $thumb_dir.$name ;
                $new_images = $thumb_dir.$name ;
                $width=250;
                $file_type = strtolower(pathinfo($path.$name, PATHINFO_EXTENSION));

                // Fix Width & Heigh (Auto calculate)

                $size=GetimageSize($images);
                $height=round($width*$size[1]/$size[0]);
                if($file_type == "jpeg") {$images_orig = ImageCreateFromJPEG($images);}
								if($file_type == "jpg") {$images_orig = ImageCreateFromJPEG($images);}
                if($file_type == "png") {$images_orig = ImageCreateFromPNG($images);}
                if($file_type == "gif") {$images_orig = ImageCreateFromGIF($images);}
                $photoX = ImagesX($images_orig);
                $photoY = ImagesY($images_orig);
                $images_fin = ImageCreateTrueColor($width, $height);
                ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
                ImageJPEG($images_fin, $new_images);
                ImageDestroy($images_orig);
                ImageDestroy($images_fin);
                $count++; // Number of successfully uploaded file
	            }
	        }
	    }
	}
}
		# error messages


echo '<div id="Upload-Box">';
		if (isset($message)) {
			foreach ($message as $msg) {
				printf("<p class='status'>%s</p>\n", $msg);
			}
		}
		# success message
		if($count !=0){
			printf("<p class='upload-status'>%d files added successfully!</p>\n", $count);
		}

# Nuker Start
	if( isset($_POST["del-files"])) {
		foreach ($_POST['del-files'] as $dfile) {
			unlink($path.$dfile);
			unlink($thumb_dir.$dfile);
			}
		}
# Nuker End
?>
		<!-- Multiple file upload html form-->
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="files[]" multiple="multiple" accept="image/*">
			<input type="submit" value="Upload">
				</form>
  </div>
