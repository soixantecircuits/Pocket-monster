<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>All Monsters on <?php echo $_POST['the_family']; ?> Family !</title>
		<meta name="description" lang="fr" content="contenu" />
		<meta name="keywords" lang="fr" content="cle" />
		<link rel="stylesheet" type="text/css" href="stle.css"/>
	</head>
	
	<body>
		<form method="post" action="showMonster.php" >
			<fieldset> <center>
				<?php
					require_once("formSelecting.php");
					if(isset($_POST['f_delete'])){
						require_once("base/connexion.php");
						Redirect('deletingManage.php?is=family&name='.$_POST["the_family"]);
					}
					monsterSelect();
				?>
			</center></fieldset>
		</form>
			
		<form method="post" action="inscrMonster.php" >
			<fieldset></center>
				<p> <center><input type="submit" name="monster_form" value="Creat Monster"/>
			</center></fieldset>
		</form>
			
		
	</body>
</html>