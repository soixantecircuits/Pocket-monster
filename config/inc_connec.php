<!--
	Include for the connection 
	to the database
-->

<?php

$database = 'pocket-monster';
$user = 'root';
$password = '';

try
{
	$db = new PDO('mysql:host=localhost;dbname='.$database, $user, $password);
}
catch(Exception $e)
{
	die('Error : '.$e->getMessage());
}

?>