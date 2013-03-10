<?php
require_once 'base/connexion.php';
if(!$worldManager->is_empty($mydb))
	Redirect('worldPage.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Welcome !</title>
		<meta name="description" lang="fr" content="contenu" />
		<meta name="keywords" lang="fr" content="cle" />
		<link rel="stylesheet" type="text/css" href="stle.css"/>
	</head>
	<body>
		<form method="post" action="worldPage.php" >
			<fieldset>
			<legend> <h1> Introduction </h1> </legend>
				<center><h3>  <b> Hello ! this is the first time you…… </b></h3>
			</fieldset>
			<fieldset>
				<legend><h2>Creat World </h2></legend>
				<p> <label for="w_name">World's Name :</label> <input type="text" name="w_name" required/> </p>
				<p> <label for="w_pic">World's Picture :</label> <input type="file" name="w_pic" requird/> </p>
				<p> <input type="submit" name="creat_world" value="Creat This World !"/> </p>
			</fieldset>
		</form>
	</body>
</html>