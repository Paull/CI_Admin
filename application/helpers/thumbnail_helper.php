<?php
function resizeThumbnailImage($image, $width, $height, $start_width, $start_height, $thumb_width, $thumb_height){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	
	$newImage = imagecreatetruecolor($thumb_width,$thumb_height);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image);
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image);
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$thumb_width,$thumb_height,$width,$height);
	return $newImage;
}
