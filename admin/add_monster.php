<?php

try
{
	$db = new PDO('mysql:host=localhost;dbname=pocket-monster', 'root', '');
}
catch(Exception $e)
{
	die('Error : '.$e->getMessage());
}

if (isset($_POST['name']) && isset($_POST['world_select']) && isset($_POST['family_select']))
{
	$name = $_POST['name'];
	$world = $_POST['world_select'];
	$family = $_POST['family_select'];
	if (isset($_POST['img']))
	{
		$img = $_POST['img'];
	}
	else
	{
		$img = NULL;
	}
	
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