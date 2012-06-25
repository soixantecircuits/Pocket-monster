<?php
require_once 'config/config.inc.php';
if(!defined('HOST') && !defined('USER') && !defined('PSW') && !defined('DB')) header('Location: index.php');
require_once 'class/game.class.php';
$Game = new game();
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Jouer - Pocket Monster</title>
</head>
<body>
<?php if ($Game->checkWorld()) {?>
	<section id="monde">
		<h3>Afficher un monde</h3>
		<form action="game.php" method="post">
			<select name="id_world" id="listWorld">
				<?php $_world=$Game->getWorld();
					$_wLength = count($_world);
					for ($i=0; $i < $_wLength; $i++) {
						if ($_world[$i]['id_world']==$_POST['id_world']) {
							echo "<option value='{$_world[$i]['id_world']}' selected>{$_world[$i]['name']}</option>";
						} else {
							echo "<option value='{$_world[$i]['id_world']}'>{$_world[$i]['name']}</option>";
						}
					}
				?>
			</select>
			<input type="submit" id="afficher" name="afficher" value="Afficher"/>
		</form>
	</section>
<?php } else { ?>
	<p>Il n'y à pas de monde créée.</p>
<?php } ?> <!-- fin checkWorld -->
<?php if($_POST['id_world'] || $_POST['id_family']) {
	 if ($Game->checkFamily($_POST['id_world'])) {?>
	<section id="famille">
	<form action="game.php" method="post">
		<h3>Afficher une famille</h3>
			<select name="id_family" id="listFamily">
				<?php $_family=$Game->getFamily($_POST['id_world']); 
					$_fLength = count($_family);
					for ($i=0; $i < $_fLength; $i++) { 
						if ($_family[$i]['id_family']==$_POST['id_family']) {
							echo "<option value='{$_family[$i]['id_family']}' selected>{$_family[$i]['name']}</option>";
						} else {
							echo "<option value='{$_family[$i]['id_family']}'>{$_family[$i]['name']}</option>";
						}
					}
				?>
			</select>
			<input type="submit" id="afficher" name="afficher" value="Afficher"/>
		</form>
	</section>
<?php } else { ?>
<p>Il n'y à pas de famille dans ce monde.</p>
<?php }} ?> <!-- fin checkFamily -->
<?php if($_POST['id_family']) {
	 if ($Game->checkMonster($_POST['id_family'])) {?>
	<section id="monstre">
	<form action="game.php" method="post">
		<h3>Afficher un monstre</h3>
			<select name="id_monster" id="listMonster">
				<?php $_monster=$Game->getMonster($_POST['id_family']); 
					$_mLength = count($_monster);
					for ($i=0; $i < $_mLength; $i++) { 
						if ($_monster[$i]['_monster']==$_POST['_monster']) {
							echo "<option value='{$_monster[$i]['_monster']}' selected>{$_monster[$i]['name']}</option>";
						} else {
							echo "<option value='{$_monster[$i]['_monster']}'>{$_monster[$i]['name']}</option>";
						}
					}
				?>
			</select>
			<input type="submit" id="afficher" name="afficher" value="Afficher"/>
		</form>
	</section>
<?php } else { ?>
<p>Il n'y à pas de monstre dans cette famille.</p>
<?php }} ?> <!-- fin checkMonster -->
	
</body>
</html>