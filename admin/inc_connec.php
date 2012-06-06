<?php

try
{
	$db = new PDO('mysql:host=localhost;dbname=pocket-monster', 'root', '');
}
catch(Exception $e)
{
	die('Error : '.$e->getMessage());
}

?>