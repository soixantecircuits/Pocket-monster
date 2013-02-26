<?php
	include 'operations.php';
?>
<?php
	$GLOBALS["mybd"] = new MyDB(); //our DB
	$GlOBALS["worldM"] = new WorldManager($GLOBALS["mybd"]); //the world manager
	$GlOBALS["familyM"] = new FamilyManager($GLOBALS["mybd"]); //the family manager
	$GlOBALS["monsterM"] = new MonsterManager($GLOBALS["mybd"]); //the monster manager
	
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
		<form method="post" action="world.php" >
			<fieldset>
				<center><h3>  <b> Hello ! this is the first time you…… </b></h3>
			</fieldset>
			<fieldset>
				<legend>Creat World </legend>
				<p> <label for="w_name">World's Name :</label> <input type="text" name="w_name" required/> </p>
				<p> <label for="w_pic">World's Picture :</label> <input type="text" name="w_pic"/> </p>
				<p> <input type="submit" name="creat_world" value="Creat This World !"/> </p>
			</fieldset>
		</form>
	</body>
</html>