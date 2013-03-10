<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>All Monsters on <?php echo $_POST['the_world']; ?> Family !</title>
		<meta name="description" lang="fr" content="contenu" />
		<meta name="keywords" lang="fr" content="cle" />
		<link rel="stylesheet" type="text/css" href="stle.css"/>
	</head>


	<body>
			<form method="post" action="creatingManage.php?is=monster">
				<fieldset>
				<legend>Creat Monster</legend>
					<p> <label for="m_name">Monster's Name :</label> <input type="text" name="m_name" required/> </p>
					<p> <label for="m_world">Monster's Family :</label>
						<select name="m_family">
						<?php
							require_once("base/connexion.php");
							$allFamilies = $familyManager->getAll($mydb);
							foreach($allFamilies as $value){
								echo '<option value="'.$value.'">'.$value.'</option>';
							}
						?>
						</select></p>
					<p> <label for="m_pic">Monster's Picture :</label> <input type="file" name="m_pic" required/> </p>
					<p> <label for="m_age">Monster's Age :</label> <input type="number" name="m_age"/> </p>
					<p> <label for="m_eyes">Monster's Eyes Color :</label> <select name="m_eyes">
							<option value="Brown">Brown</option>
							<option value="Blue">Blue</option> 
							<option value="Green">Green</option>
							<option value="Rlack">Black</option>
						</select></p>
			
					<p> <label for="m_hair">Monster's Hair Color :</label> <select name="m_hair">
							<option value="Brown">Brown</option>
							<option value="Black">Black</option> 
							<option value="Yellow">Yellow</option>
							<option value="Red">Red</option>
						</select></p>
			
					<p> <label for="m_skin">Monster's Skin Color :</label> <select name="m_skin">
							<option value="Brown">Brown</option>
							<option value="Black">Black</option> 
							<option value="Yellow">Yellow</option>
							<option value="Red">Red</option>
						</select></p>
					<p> <input type="submit" name="creat_monster" value="Creat This Monster !"/> </p>
				</fieldset>
			</form>
	</body>
</html>
