<?php
require_once 'config/config.inc.php';
require_once 'class/db.class.php';
$Db = new DB(HOST,USER,PSW,DB);
echo $_POST['modifWorld'];
echo $_POST['modifFamily'];
echo $_POST['modifMonster'];
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Administration - Pocket Monster</title>
</head>
<body>
	<section id="monde">
		<h3>Modifier un monde</h3>
		<form action="admin.php" method="post">
			<select name="modifWorld" id="modifWorld">
				<option value="world">world</option>
			</select>
	</section>
	<section id="famille">
		<h3>Modifier une famille</h3>
			<select name="modifFamily" id="modifFamily">
				<option value="family">family</option>
			</select>
	</section>
	<section id="monstre">
		<h3>Modifier un monstre</h3>
			<select name="modifMonster" id="modifMonster">
				<option value="monster">monster</option>
			</select>	
			<input type="submit" id="modifer" name="action" value="Modifier"/>
		</form>
	</section>
</body>
</html>