<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Creat Family</title>
		<meta name="description" lang="fr" content="contenu" />
		<meta name="keywords" lang="fr" content="cle" />
		<link rel="stylesheet" type="text/css" href="stle.css"/>
	</head>
				
	<body>	
		
			<form method="post" action="creatingManage.php?is=family">
				<fieldset>
					<legend>Creat Family </legend>
					<p> <label for="f_name">Family's Name :</label> <input type="text" name="f_name" required/> </p>
					<p> <label for="f_world">Family's World :</label>
					<select name="f_world">
					<?php
						require_once("base/connexion.php");
						//we get all worlds names
						$allWorlds = $worldManager->getAll($mydb);
						foreach($allWorlds as $value){
							echo '<option value="'.$value.'">'.$value.'</option>';
						}
					?>
					</select></p>
					<p> <label for="f_pic">Family's Picture :</label> <input type="file" name="f_pic" required/> </p>
					<p> <label for="f_max">Family's Maximum Number :</label> <input type="number" name="f_max"/> </p>
					<p> <input type="submit" name="creat_family" value="Creat This Family !"/> </p>
				</fieldset>
			</form>
		
	</body>
</html>
				
