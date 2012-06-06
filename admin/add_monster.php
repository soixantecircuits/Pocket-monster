<!--
	Add a monster to the database and the photo
	if is uploaded, else use a default photo
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Pocket-monster</title>
	</head>
	<body>
<?php

$upload_path = '../img_monster/';
include 'inc_upload.php';

include 'inc_connec.php';

if (isset($_POST['name']))
{
	$name = $_POST['name'];
	$world = $_POST['world_select'];
	$family = $_POST['family_select'];
	$req = $db->prepare("INSERT INTO monster(name, img, world, family) VALUES(:name, :img, :world, :family)");
	$req->execute(array(
		'name' => $name,
		'img' => $img,
		'world' => $world,
		'family' => $family
		));
		
	echo "Monster '" . $name . "' has been successfully added.";
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