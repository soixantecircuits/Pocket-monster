<form action="add_world.php" method="post" enctype="multipart/form-data">
	<label for='file'>Select a file to upload : </label><input type="file" name="userfile" id="file"><br />
	<button>Upload File</button>
	<?php
	
	////////////////////////////////////////////////////// MOVE TO ADD_WORLD.PHP
	$allowed_filetypes = array('.jpg','.gif','.bmp','.png');
    $max_filesize = 1048576; // ~1MB
    $upload_path = '../img_world/';
 
	$filename = $_FILES['userfile']['name'];
	$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
 
	// Check if the filetype is allowed, if not DIE and inform the user.
	if(!in_array($ext,$allowed_filetypes))
		die('The file you attempted to upload is not allowed.');
 
	if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
		die('The file you attempted to upload is too large.');
 
	if(!is_writable($upload_path))
		die('You cannot upload to the specified directory, please CHMOD it to 777.');
 
	if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
        echo 'Your file upload was successful, view the file <a href="' . $upload_path . $filename . '" title="Your File">here</a>';
    else
		echo 'There was an error during the file upload.  Please try again.';
 ////////////////////////////////////////////////////////////////
	if (isset($_POST['name']))
	{
		echo "<input type='hidden' name='name' value='' />";
	}
	else
	{
		echo "Incorrect form, please try again.";
	}
	?>
</form>

<?php

try
{
	$db = new PDO('mysql:host=localhost;dbname=pocket-monster', 'root', '');
}
catch(Exception $e)
{
	die('Error : '.$e->getMessage());
}

if (isset($_POST['name']))
{
	$name = $_POST['name'];
	if (isset($_POST['img']))
	{
		$img = $_POST['img'];
	}
	else
	{
		$img = NULL;
	}

	$req = $db->prepare("INSERT INTO world(name, img) VALUES(:name, :img)");
	$req->execute(array(
		'name' => $name,
		'img' => $img
		));
		
	echo "World '" . $name . "' has been successfully added.";
}


?>
<br />
<button onclick='document.location.href="../admin.php"'>Go back to the admin page</button>