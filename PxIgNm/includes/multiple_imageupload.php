<?php	
$valid_formats = array("jpg", "png", "gif", "zip", "jpeg" , "bmp","JPG", "PNG", "GIF", "ZIP", "BMP", "JPEG");
$max_file_size = 1024*1000; 
$count = 0;
$image_path_to_attach_multiple_images_variable ="";
	
	// Loop $_FILES to execute all files
	foreach ($_FILES['additionalfiles']['name'] as $f => $name) {

		$ext = explode('.', basename($_FILES['additionalfiles']['name'][$f]));
		$file_extension = end($ext); // Store extensions in the variable.

		/* Removing special characters of the image name */
		$image_name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $_FILES["additionalfiles"]["name"][$f]);

		/* Removing space from the image name */
		$image_name =  uniqid()."_".$url_for_product;

		/* Adding the extention to the image */
		$path_multiple_without_docroot_2 = $path_multiple_without_docroot.$image_name.".".$file_extension;
		$path = $path_multiple.$image_name.".".$file_extension;

		$file_type = $_FILES['additionalfiles']['type'][$f];

	    if ($_FILES['additionalfiles']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['additionalfiles']['error'][$f] == 0) {	           
	        if ($_FILES['additionalfiles']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
				$uploadOk_for_multiple_for_multiple = 0;
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				$uploadOk_for_multiple = 0;
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["additionalfiles"]["tmp_name"][$f], $path))
				$image_path_to_attach_multiple_images[] = $path_multiple_without_docroot_2;

				if($image_path_to_attach_multiple_images_variable==""){
					$image_path_to_attach_multiple_images_variable = $path_multiple_without_docroot_2;
				}
				else {
					$image_path_to_attach_multiple_images_variable .= ",".$path_multiple_without_docroot_2;
				}

	            $count++; // Number of successfully uploaded file
				$uploadOk_for_multiple_for_multiple = 1;
	        }
	    }
	}

?>