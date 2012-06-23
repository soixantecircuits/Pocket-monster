<?php
require_once 'config/config.inc.php';
if(!defined('HOST') && !defined('USER') && !defined('PSW') && !defined('DB')) header('Location: index.php');
require_once 'class/admin.class.php';
$Admin = new admin();
echo $_POST['modifWorld'];
echo $_POST['modifFamily'];
echo $_POST['modifMonster'];
$content=$Admin->action($_POST);
$_data=$Admin->action($_POST);
var_dump($_POST);
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
		<form action="admin.php" method="post" id="formModifWorld">
			<select name="id" id="modifWorld">
				<?php $_world=$Admin->listWorld();
					$_wLength = count($_world);
					for ($i=0; $i < $_wLength; $i++) { 
						echo "<option value='{$_world[$i]['id_world']}'>{$_world[$i]['name']}</option>";
					}
				?>
			</select>
			<input type="submit" id="modifer" name="modifier" value="Modifier"/>
			<input type="hidden" name="action" value="modif" id="action">
			<input type="hidden" name="type" value="world" id="type">
		</form>
		<section class='resultmodif'>
			<?php if($_POST['type']=='world'){
			echo "<form action='admin.php' method='post' class='modified'>
				<ul>
					<li><label for='worldname'>Nom</label><input type='text' name='worldname' value='{$_data['name']}' id='worldname'/></li>
					<li><img src='img/{$_data['img_url']}' alt='{$_data['name']}'/></li>
					<li><input type='file' name='worldfile' id='worldfile'></li>
				</ul>
				<input type='hidden' name='worldid' value='{$_data['id_world']}' id='worldid'>
				<input type='hidden' name='action' value='modified' id='action'>
				<input type='submit' name='submit' value='Modifier' id='submit'>
			</form>";
			} ?>
		</section>
	</section>
	<section id="famille">
	<form action="admin.php" method="post">
		<h3>Modifier une famille</h3>
			<select name="id" id="modifFamily">
				<?php $_family=$Admin->listFamily(); 
					$_fLength = count($_family);
					for ($i=0; $i < $_fLength; $i++) { 
						echo "<option value='{$_family[$i]['id_world']}'>{$_family[$i]['name']}</option>";
					}
				?>
			</select>
			<input type="submit" id="modifer" name="modifier" value="Modifier"/>
			<input type="hidden" name="action" value="modif" id="action">
			<input type="hidden" name="type" value="family" id="type">
		</form>
		<section class='resultmodif'>
			<?php if($_POST['type']=='family'){
			echo "<form action='admin.php' method='post' class='modified'>
				<ul>
					<li><label for='familyname'>Nom</label><input type='text' name='familyname' value='{$_data['name']}' id='familyname'/></li>
					<li><label for='familylimit'>Limite de monstre</label><input type='text' name='familylimit' value='{$_data['max_monster']}' id='familylimit'/></li>
					<li><img src='img/{$_data['img_url']}' alt='{$_data['name']}'/></li>
					<li><input type='file' name='familyfile' id='familyfile'></li>
					<label for='id'>Monde</label>
					<select name='id' id='modifFamily2'>";
				$_world=$Admin->listWorld();
					$_wLength = count($_world);
					for ($i=0; $i < $_wLength; $i++) { 
						if ($_world[$i]['id_world']==$_data['id_world']) {
							echo "<option value='{$_world[$i]['id_world']}' selected>{$_world[$i]['name']}</option>";
						} else {
							echo "<option value='{$_world[$i]['id_world']}'>{$_world[$i]['name']}</option>";
						}
					}
			echo"
					</select>
				</ul>
				<input type='hidden' name='familyid' value='{$_data['id_family']}' id='familyid'>
				<input type='hidden' name='action' value='modified' id='action'>
				<input type='submit' name='submit' value='Modifier' id='submit'>
			</form>";
			} ?>
		</section>
	</section>
	<section id="monstre">
	<form action="admin.php" method="post">
		<h3>Modifier un monstre</h3>
			<select name="id" id="modifMonster">
				<?php $_monster=$Admin->listMonster(); 
					$_mLength = count($_monster);
					for ($i=0; $i < $_mLength; $i++) { 
						echo "<option value='{$_monster[$i]['id_monster']}'>{$_monster[$i]['name']}</option>";
					}
				?>
			</select>
			<input type="submit" id="modifer" name="modifier" value="Modifier"/>
			<input type="hidden" name="action" value="modif" id="action">
			<input type="hidden" name="type" value="monster" id="type">
		</form>
		<section class='resultmodif'>
			<?php if($_POST['type']=='monster'){
			echo $content;
			echo "<form action='admin.php' method='post' class='modified'>
				<ul>
					<li><label for='monstername'>Nom</label><input type='text' name='monstername' value='{$_data['name']}' id='monstername'/></li>
					<li><label for='taille'>Taille</label><input type='text' name='taille' value='{$_data['taille']}' id='taille'/></li>
					<li><label for='poids'>Poids</label><input type='text' name='poids' value='{$_data['poids']}' id='poids'/></li>
					<li><label for='force'>Force</label><input type='text' name='force' value='{$_data['force']}' id='force'/></li>
					<li><label for='agilite'>Agilité</label><input type='text' name='agilite' value='{$_data['agilite']}' id='agilite'/></li>
					<li><label for='intelligence'>Intelligence</label><input type='text' name='intelligence' value='{$_data['intelligence']}' id='intelligence'/></li>
					<li><img src='img/{$_data['img_url']}' alt='{$_data['name']}'/></li>
					<li><input type='file' name='monsterfile' id='monsterfile'></li>
					<label for='id'>Famille</label><select name='id' id='modifMonster2'>";
			$_family=$Admin->listFamily();
				$_fLength = count($_family);
				for ($i=0; $i < $_fLength; $i++) { 
					if ($_family[$i]['id_family']==$_data['id_family']) {
						echo "<option value='{$_family[$i]['id_family']}' selected>{$_family[$i]['name']}</option>";
					} else {
						echo "<option value='{$_family[$i]['id_family']}'>{$_family[$i]['name']}</option>";
					}
				}
			echo "
					</select>
				</ul>
				<input type='hidden' name='monsterid' value='{$_data['id_monster']}' id='monsterid'>
				<input type='hidden' name='action' value='modified' id='action'>
				<input type='submit' name='submit' value='Modifier' id='submit'>
			</form>";
			} ?>
		</section>
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
				<?php $_world=$Admin->listWorld();
					$_wLength = count($_world);
					for ($i=0; $i < $_wLength; $i++) { 
						echo "<option value='{$_world[$i]['id_world']}'>{$_world[$i]['name']}</option>";
					}
				?>
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
				<?php $_family=$Admin->listFamily(); 
					$_fLength = count($_family);
					for ($i=0; $i < $_fLength; $i++) { 
						echo "<option value='{$_family[$i]['id_world']}'>{$_family[$i]['name']}</option>";
					}
				?>
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
	<script type="text/javascript" charset="utf-8">
		$('#modifWorld,#modifFamily,#modifMonster').change(function() {
			var id = $(this).val();
			var type = $(this).siblings('#type').val();
			var $section = $(this).parents('form').siblings('.resultmodif');
			$section.load('admin.php .modified',{"id":id,'modifier':"Modifier",'action':'modif','type':type},function(e) {console.log(e)})
		})
	</script>
</body>
</html>