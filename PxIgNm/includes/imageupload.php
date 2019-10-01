<?php	
$valid_formats = array("jpg", "png", "gif", "zip", "jpeg" , "bmp","JPG", "PNG", "GIF", "ZIP", "BMP", "JPEG");
$max_file_size = 1024*1000; 
$count = 0;

		$ext = explode('.', basename($_FILES['files']['name']));   // Explode file name from dot(.)
		$file_extension = end($ext); // Store extensions in the variable.
		
		/* Removing special characters of the image name */
		$image_name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $_FILES["files"]["name"]);

		/* Add a unique ID and a _ for the image name and Removing space from the image name */
		$image_name = uniqid()."_".$url_for_product;

		/* Adding the extention to the image */
		$upload_path_without_doc_root = $upload_path_without_doc_root.$image_name.".".$file_extension;
		$path = $path.$image_name.".".$file_extension;
		
		$file_type = $_FILES['files']['type'];
		$name = strtolower($_FILES['files']['name']);
	
	    if ($_FILES['files']['error'] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'] == 0) {	           
	        if ($_FILES['files']['size'] > $max_file_size) {
	            $message[] = "$name is too large!.";
				$uploadOk = 0;
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				$uploadOk = 0;
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["files"]["tmp_name"], $path))
				$image_path_to_upload = $path;

	            $count++; // Number of successfully uploaded file
				$uploadOk = 1;
	        }
	    }

?>