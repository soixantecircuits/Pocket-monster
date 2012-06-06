<!--
	Include that handle upload test
-->
<?php

	$allowed_filetypes = array('.jpg','.gif','.bmp','.png');
    $max_filesize = 8388608; // 8MB
 
	$filename = $_FILES['userfile']['name'];
	$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
	$img = null;
 
	// Check if the filetype is allowed, if not DIE and inform the user.
	if ($filename != '')
	{
		
		if(!in_array($ext,$allowed_filetypes))
			die('The file you attempted to upload is not allowed.');
	 
		if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
			die('The file you attempted to upload is too large.');
	 
		if(!is_writable($upload_path))
			die('You cannot upload to the specified directory, please CHMOD it to 777.');
	 
		if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
		{
			echo 'Your file upload was successful';
			$img = $filename;
		}
		else
		{
			echo 'There was an error during the file upload. Please try again.';
		}
	}
	else
	{
		echo 'No file was uploaded. The default image will be use.';
	}
	echo '<br />';
?>