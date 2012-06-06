<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Pocket-monster</title>
	</head>

	<body>
<?php

$upload_path = '../img_world/';
include 'inc_upload.php';

include 'inc_connec.php';

if (isset($_POST['name']))
{
	$name = $_POST['name'];
	$req = $db->prepare("INSERT INTO world(name, img) VALUES(:name, :img)");
	$req->execute(array(
		'name' => $name,
		'img' => $img
		));
		
	echo "World '" . $name . "' has been successfully added.";
}
else
{
	echo "Incorrect form, please try again.";
}

?>
<br />
<button onclick='document.location.href="../admin.php"'>Go back to the admin page</button>
	</body>
</html>