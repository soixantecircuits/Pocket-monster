<?php
//this function was imported from the http://www.php.net/manual/fr/function.image-type-to-extension.php
function get_extension($filename, $include_dot = true, $shorter_extensions = true) {
  $image_info = @getimagesize($filename);
  if (!$image_info || empty($image_info[2])) {
    return false;
  }

  if (!function_exists('image_type_to_extension')) {
    /**
     * Given an image filename, get the file extension.
     *
     * @param $imagetype
     *   One of the IMAGETYPE_XXX constants.
     * @param $include_dot
     *   Whether to prepend a dot to the extension or not. Default to TRUE.
     * @param $shorter_extensions
     *   Whether to use a shorter extension or not. Default to TRUE.
     * @return
     *   A string with the extension corresponding to the given image type, or
     *   FALSE on failure.
     */
    function image_type_to_extensiona ($imagetype, $include_dot = true) {
      // Note we do not use the IMAGETYPE_XXX constants as these will not be
      // defined if GD is not enabled.
      $extensions = array(
        1  => 'gif',
        2  => 'jpeg',
        3  => 'png',
        4  => 'swf',
        5  => 'psd',
        6  => 'bmp',
        7  => 'tiff',
        8  => 'tiff',
        9  => 'jpc',
        10 => 'jp2',
        11 => 'jpf',
        12 => 'jb2',
        13 => 'swc',
        14 => 'aiff',
        15 => 'wbmp',
        16 => 'xbm',
      );

      // We are expecting an integer between 1 and 16.
      $imagetype = (int)$imagetype;
      if (!$imagetype || !isset($extensions[$imagetype])) {
        return false;
      }

      return ($include_dot ? '.' : '') . $extensions[$imagetype];
    }
  }

  $extension = image_type_to_extension($image_info[2], $include_dot);
  if (!$extension) {
    return false;
  }

  if ($shorter_extensions) {
    $replacements = array(
      'jpeg' => 'jpg',
      'tiff' => 'tif',
    );
    $extension = strtr($extension, $replacements);
  }
  return $extension;
}

/*===================================================================================================================*/

//this function verify if the file is a real image
function is_image($file){
	if(!empty($file)){
		$type = get_extension($file);
		if($type === ".gif" || $type===".jpg" || $type===".png")
			return true;
		return false;
	}else
		return false;	
}
?>