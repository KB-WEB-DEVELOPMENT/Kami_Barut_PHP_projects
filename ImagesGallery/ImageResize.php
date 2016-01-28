<?php

class ImageResize 	{


	private	    $original_image; 
	private	$recreated_image;
	private	$path;	
	private	$filename;	
	private	$set_thumbnail_width;
	private	$set_thumbnail_height;
	private	$original_dimensions();
	private	$final_height;
	private	$final_width;
	private	$Xoffset;
	private	$Yoffset;
	private	$image_size_wanted;



	static function MinimizeImageSize($original_image_file, $path, $filename, $set_thumbnail_width = 100, $set_thumbnail_height = 100)	{
		
		$this->original_image_file = $original_image_file;

		$this->path = $path;

		$this->filename = $filename;
		
		// get rid of image extension
		
		$filename = substr($filename,0,-4);
		
		// stores image dimensions
		
		$original_dimensions = getimagesize($original_image_file);
		
		// create a new image 
		
		if   (substr(strtolower($original_image_file), -4) == ".jpg")    { $recreated_image_file = imagecreatefromjpeg($original_image_file); }
		
		else if  (substr(strtolower($original_image_file), -4) == ".png")  { $recreated_image_file = imagecreatefrompng($original_image_file); }
		
		else if  (substr(strtolower($original_image_file), -4) == ".gif")  { $recreated_image_file = imagecreatefromgif($original_image_file); }
		
		// The image cannot be resized
		
		else { 

			// delete the unsizable image

			unlink($original_image_file); 
			return false;

		}
		
		// create a standard image size
		
		
		$image_size_wanted = imagecreatetruecolor ($set_thumbnail_width, $set_thumbnail_height); 
		
		// resize the bigger into a smaller image and sets an x-offset and y-offset
		
		if ( $original_dimensions[0] > ($set_thumbnail_width / $set_thumbnail_height) * $original_dimensions[1] ) {  $final_height = $set_thumbnail_height; $final_width = $set_thumbnail_height * $original_dimensions[0] / $original_dimensions[1]; $Xoffset = - ($final_width - $set_thumbnail_width) / 2; $Yoffset = 0; }
		
		if ( $original_dimensions[0] < ($set_thumbnail_width / $set_thumbnail_height) * $original_dimensions[1] ) { $final_width = $set_thumbnail_width;  $final_height = $set_thumbnail_width * $original_dimensions[1] / $original_dimensions[0]; $Yoffset = - ( $final_height - $set_thumbnail_height) / 2; $Xoffset = 0; }
		
		if ( $original_dimensions[0] == ($set_thumbnail_width / $set_thumbnail_height) * $original_dimensions[1] ) { $final_width = $set_thumbnail_width;  $final_height = $set_thumbnail_height; $Xoffset = 0; $Yoffset = 0; }
		
		// store a copy of the newly sized and newly positioned image
		
		imagecopyresampled($image_size_wanted, $recreated_image, $Xoffset, $Yoffset, 0, 0, $final_width,  $final_height, $original_dimensions[0], $original_dimensions[1]);
		
		// save the new image
		
		imagejpeg($image_size_wanted, $path ."/" . $filename . ".jpg", 90);
		
		return true;
	}
}

?>
