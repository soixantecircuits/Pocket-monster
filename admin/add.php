<!--
	Add a world/familly/monster to the database and the photo
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


if (isset($_POST['type']))
{
	$type = $_POST['type'];

	include 'inc_upload.php';
	include '../config/inc_connec.php';
	
	$name = $_POST['name'];
	
	if ($type == 'family' || $type == 'monster')
		$world = $_POST['world_select'];
		
	if ($type == 'monster')
		$family = $_POST['family_select'];
	
	if ($type == 'world')
	{
		$req = $db->prepare("INSERT INTO world(name, img) VALUES(:name, :img)");
		$req->execute(array(
			'name' => $name,
			'img' => $img
			));
	}
	
	if ($type == 'family')
	{
		$req = $db->prepare("INSERT INTO family(name, img, world) VALUES(:name, :img, :world)");
		$req->execute(array(
			'name' => $name,
			'img' => $img,
			'world' => $world
			));
	}
	
	if ($type == 'monster')
	{
		$req = $db->prepare("INSERT INTO monster(name, img, world, family) VALUES(:name, :img, :world, :family)");
		$req->execute(array(
			'name' => $name,
			'img' => $img,
			'world' => $world,
			'family' => $family
			));
	}
		
	echo $type . " '" . $name . "' has been successfully added.";
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