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
else
{
	echo "Incorrect form, please try again.";
}

?>
<br />
<button onclick='document.location.href="../admin.php"'>Go back to the admin page</button>