<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>All Your Worlds !</title>
		<meta name="description" lang="fr" content="contenu" />
		<meta name="keywords" lang="fr" content="cle" />
		<link rel="stylesheet" type="text/css" href="stle.css"/>
	</head>
	
	<body>
		<form method="post" action="familyPage.php" >
			<fieldset>
				<center> 
				<legend> All your Worlds </legend>
				<?php
					require_once ("formSelecting.php");
					worldSelect();
				?>	
				</center>
			</fieldset>
		</form>
		
		
		<form method="post" action="inscrWorld.php" >
			<fieldset> <center>
				<p> <input type="submit" name="world_form" value="Creat World !"/> </p>
			</center></fieldset>
		</form>
	</body>
</html>