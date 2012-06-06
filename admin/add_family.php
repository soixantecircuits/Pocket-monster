<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Pocket-monster</title>
	</head>

	<body>
<?php

$upload_path = '../img_family/';
include 'inc_upload.php';

include 'inc_connec.php';

if (isset($_POST['name']))
{
	$name = $_POST['name'];
	$world = $_POST['world_select'];
	$req = $db->prepare("INSERT INTO family(name, img, world) VALUES(:name, :img, :world)");
	$req->execute(array(
		'name' => $name,
		'img' => $img,
		'world' => $world
		));
		
	echo "Family '" . $name . "' has been successfully added.";
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