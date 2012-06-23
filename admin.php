<?php
require_once 'config/config.inc.php';
if(!defined('HOST') && !defined('USER') && !defined('PSW') && !defined('DB')) header('Location: index.php');
require_once 'class/db.class.php';
$Db = new DB(HOST,USER,PSW,DB);
echo $_POST['modifWorld'];
echo $_POST['modifFamily'];
echo $_POST['modifMonster'];
$Db->action($_POST);
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Administration - Pocket Monster</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<section id="monde">
		<h3>Modifier un monde</h3>
		<form action="admin.php" method="post">
			<select name="modifWorld" id="modifWorld">
				<?php $Db->listWorld(); ?>
			</select>
			<input type="submit" id="modifer" name="modifier" value="Modifier"/>
			<input type="hidden" name="action" value="modif" id="action">
			<input type="hidden" name="type" value="world" id="action">
		</form>
	</section>
	<section id="famille">
	<form action="admin.php" method="post">
		<h3>Modifier une famille</h3>
			<select name="modifFamily" id="modifFamily">
				<?php $Db->listFamily(); ?>
			</select>
			<input type="submit" id="modifer" name="modifier" value="Modifier"/>
			<input type="hidden" name="action" value="modif" id="action">
			<input type="hidden" name="type" value="family" id="action">
		</form>
	</section>
	<section id="monstre">
	<form action="admin.php" method="post">
		<h3>Modifier un monstre</h3>
			<select name="modifMonster" id="modifMonster">
				<?php $Db->listMonster(); ?>
			</select>
			<input type="submit" id="modifer" name="modifier" value="Modifier"/>
			<input type="hidden" name="action" value="modif" id="action">
			<input type="hidden" name="type" value="monster" id="action">
		</form>
	</section>
	<section id="addworld">
		<h3>Ajouter un monde</h3>
		<form action="admin.php" method="post">
			<input type="text" name="worldname" placeholder="Nom" id="worldname" required>
			<input type="file" name="worldfile" id="worldfile" required>
			<input type="submit" name="submitworld" value="Ajouter le monde" id="submitworld">
			<input type="hidden" name="action" value="add" id="action">
			<input type="hidden" name="type" value="world" id="action">
		</form>
	</section><!-- end of #addworld -->
	<section id="addfamily">
		<h3>Ajouter une famille</h3>
		<form action="admin.php" method="post">
			<select name="familyworld" id="familyworld">
				<?php $Db->listWorld(); ?>
			</select>
			<input type="text" name="familyname" placeholder="Nom" id="familyname" required>
			<input type="text" name="familylimit" placeholder="Monstre maximum dans cette famille" id="familylimit" required>
			<input type="file" name="familyfile" id="familyfile" required>
			<input type="submit" name="submitfamily" value="Ajouter la famille" id="submitfamily">
			<input type="hidden" name="action" value="add" id="action">
			<input type="hidden" name="type" value="family" id="action">
		</form>
	</section><!-- end of #addfamily -->
	<section id="addmonster">
		<h3>Ajouter un monstre</h3>
		<form action="admin.php" method="post">
			<select name="monsterfamily" id="monsterfamily">
				<?php $Db->listFamily(); ?>
			</select>
			<input type="text" name="monstername" placeholder="Nom" id="monstername" required>
			<input type="text" name="taille" placeholder="Taille" id="taille" required>
			<input type="text" name="poids" placeholder="Poids" id="poids" required>
			<input type="text" name="force" placeholder="Force" id="force" required>
			<input type="text" name="agilite" placeholder="Agilité" id="agilite" required>
			<input type="text" name="intelligence" placeholder="Intelligence" id="intelligence" required>
			<input type="file" name="monsterfile" id="monsterfile" required>
			<input type="submit" name="submitmonster" value="Ajouter le monstre" id="submitmonster">
			<input type="hidden" name="action" value="add" id="action">
			<input type="hidden" name="type" value="monster" id="action">
		</form>
	</section><!-- end of #addmonster -->
</body>
</html>