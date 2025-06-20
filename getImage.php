<?php
	//Parameter check
	if (!isset($_GET['name']) || !isset($_GET['size'])) {
		echo 'Error: Name and size required.';
		exit();
	}
	
	//Construct the image path and file name based on parameters
	$filename = './images-' . $_GET['size'] . '/' . $_GET['name'] . '.png';

	if (file_exists($filename)) {
		//If the file exist, just return the file with appropriate header
		header("Content-Type: image/png");
		readfile($filename);
		
	} else {
		//If it doesn't exist, read our base image first
		$source = './images-xxxhdpi/' . $_GET['name'] . '.png';
		$images = imagecreatefrompng($source);
		
		//Then find target image size
		$pixels = array(88, 132, 176, 264, 352);
		$size = array('mdpi', 'hdpi', 'xxxhdpi', 'xxhdpi', 'xxxhdpi');
		$i = array_search($_GET['size'], $size);
		
		//Here we resize the image
		$result = imagecreatetruecolor($pixels[$i], $pixels[$i]);
		imagealphablending($result, false);
		imagesavealpha($result, true);
		$transparent = imagecolorallocatealpha($result, 255, 255, 255, 127);
		imagefilledrectangle($result, 0, 0, $pixels[$i], $pixels[$i], 
								$transparent);
		imagecopyresampled($result, $images, 0, 0, 0, 0, 
							$pixels[$i], $pixels[$i], $pixels[4], $pixels[4]);
		
		//Save the image
		imagepng($result, $filename);

		//Save it as cache
		header("Content-Type: image/png");
		imagepng($result);
		
		//Output it
		imagedestroy($image);
		imagedestroy($result);
		
		//Finally, free images from memory
		
	}
?>