<!--
	Include that handle upload test
-->
<?php

	$img = null;
	
	$path = '../img_' . $type . '/';
	
	if ((($_FILES['file']['type'] == "image/gif")
		|| ($_FILES['file']['type'] == "image/png")
		|| ($_FILES['file']['type'] == "image/jpg")
		|| ($_FILES['file']['type'] == "image/jpeg")
		|| ($_FILES['file']['type'] == "image/pjpeg")
		&& ($_FILES['file']['size'] < 8388608))) // 8MB
	{
		if ($_FILES['file']["error"] > 0)
		{
			echo "Return Code: " . $_FILES['file']['error'] . "<br />";
		}
		else
		{
			echo "Upload: " . $_FILES['file']['name'] . "<br />";
			echo "Type: " . $_FILES['file']['type'] . "<br />";
			echo "Size: " . ($_FILES['file']['size'] / 1024) . " Kb<br />";

			if (file_exists($path . $_FILES['file']['name']))
			{
				echo $_FILES['file']["name"] . " already exists. ";
			}
			else
			{
				move_uploaded_file($_FILES['file']['tmp_name'],
				$path . $_FILES['file']['name']);
				echo "Stored in: " . $path . $_FILES['file']['name'];
			}
			
			$img = $_FILES['file']['name'];
		}
	}
	else
	{
		echo "No file to upload or error while uploading. The default file will be use.";
	}
	
	echo '<br /><br />';
?>