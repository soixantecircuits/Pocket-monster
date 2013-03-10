<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>About <?php echo $_POST['the_monster']; ?></title>
		<meta name="description" lang="fr" content="contenu" />
		<meta name="keywords" lang="fr" content="cle" />
		<link rel="stylesheet" type="text/css" href="stle.css"/>
	</head>
	
	<body>
		<form method="post" action="index.php"> 
			<fieldset><center>
				<?php
					require_once("formSelecting.php");
					if(isset($_POST['m_delete'])){
						require_once("base/connexion.php");
						Redirect('deletingManage.php?is=monster&name='.$_POST["the_monster"]);
					}
					showMonster();
				?>
				<p> <input type="submit" value="Retour au départ"> </p>
			 </center></fieldset>
		</form>
			
			
	</body>
</html>