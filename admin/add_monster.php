<?php

try
{
	$db = new PDO('mysql:host=localhost;dbname=pocket-monster', 'root', '');
}
catch(Exception $e)
{
	die('Error : '.$e->getMessage());
}

if (isset($_POST['name']) && isset($_POST['world_select']) && isset($_POST['familly_select']))
{
	$name = $_POST['name'];
	$world = $_POST['world_select'];
	$familly = $_POST['familly_select'];
	if (isset($_POST['img']))
	{
		$img = $_POST['img'];
	}
	else
	{
		$img = NULL;
	}
	
	$req = $db->prepare("INSERT INTO monster(name, img, world, familly) VALUES(:name, :img, :world, :familly)");
	$req->execute(array(
		'name' => $name,
		'img' => $img,
		'world' => $world,
		'familly' => $familly
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