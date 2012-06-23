<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Accueil - Pocket Monster</title>
	</head>
	<body>
<?php
if (file_exists(setup)){
?>
		<h2>Attention</h2>
		<?php
		require_once 'config/config.inc.php';
		if (defined('HOST') && defined('USER') && defined('PSW') && defined('DB')) {
		require_once 'setup/libs/setup.class.php';
		$Setup = new Setup();
		if($Setup->connectDb(HOST,USER,PSW,DB)){
			?>
				<p>Vous devez supprimer le dossier setup avant de pouvoir utiliser cette application.</p>
			<?php }} else {
		?>
		<p>Pocket Monster ne semble pas être installé ou nécessite une réinstallation. Pour se faire, cliquez <a href="setup">ici</a></p>
<?php }} else { ?>
	<nav>
		<ul>
			<li><a href="game.php">Jouer</a></li>
			<li><a href="admin.php">Gérer</a></li>
			<li><a href="credits.php">Crédits</a></li>
		</ul>
	</nav>
<?php
}
?>
	</body>
</html>