<?php

class SimpleImage {
	
	private $image;
	private $image_type;
	public function load($filename) {
		$image_info = getimagesize($filename);
		$this->image_type = $image_info[2];
		if( $this->image_type == IMAGETYPE_JPEG ) {
			$this->image = imagecreatefromjpeg($filename);
		} elseif( $this->image_type == IMAGETYPE_GIF ) {
			$this->image = imagecreatefromgif($filename);
		} elseif( $this->image_type == IMAGETYPE_PNG ) {
			$this->image = imagecreatefrompng($filename);
		}
	}
	
	public function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
		if( $image_type == IMAGETYPE_JPEG ) {
			imagejpeg($this->image,$filename,$compression);
		} elseif( $image_type == IMAGETYPE_GIF ) {
			imagegif($this->image,$filename);			
		} elseif( $image_type == IMAGETYPE_PNG ) {
			imagepng($this->image,$filename);
		}	
		if( $permissions != null) {
			chmod($filename,$permissions);
		}
	}
	public function output($image_type=IMAGETYPE_JPEG) {
		if( $image_type == IMAGETYPE_JPEG ) {
			imagejpeg($this->image);
		} elseif( $image_type == IMAGETYPE_GIF ) {
			imagegif($this->image);			
		} elseif( $image_type == IMAGETYPE_PNG ) {
			imagepng($this->image);
		}	
	}
	public function getWidth() {
		return imagesx($this->image);
	}
	public function getHeight() {
		return imagesy($this->image);
	}
	public function resizeToHeight($height) {
		$ratio = $height / $this->getHeight();
		$width = $this->getWidth() * $ratio;
		$this->resize($width,$height);
	}
	public function resizeToWidth($width) {
		$ratio = $width / $this->getWidth();
		$height = $this->getheight() * $ratio;
		$this->resize($width,$height);
	}
	public function scale($scale) {
		$width = $this->getWidth() * $scale/100;
		$height = $this->getheight() * $scale/100; 
		$this->resize($width,$height);
	}
	public function resize($width,$height) {
		$new_image = imagecreatetruecolor($width, $height);		
		if( $this->image_type == IMAGETYPE_GIF || $this->image_type == IMAGETYPE_PNG ) {
			$current_transparent = imagecolortransparent($this->image);
			if($current_transparent != -1) {
				$transparent_color = imagecolorsforindex($this->image, $current_transparent);
				$current_transparent = imagecolorallocate($new_image, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
				imagefill($new_image, 0, 0, $current_transparent);
				imagecolortransparent($new_image, $current_transparent);
			} elseif( $this->image_type == IMAGETYPE_PNG) {
				imagealphablending($new_image, false);
				$color = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
				imagefill($new_image, 0, 0, $color);
				imagesavealpha($new_image, true);
			}
		}
		imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
		$this->image = $new_image;	
	}		
}

$img=new SimpleImage();
if (file_exists($_GET['url'])) {
    $img->load($_GET['url']);
} else {
    $img->load('images/avatar_default.png');
}
$img->resize($_GET['size'],$_GET['size']);
$img->output(IMAGETYPE_PNG);
?>