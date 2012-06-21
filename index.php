<?php
if (file_exists(setup) && !file_exists("config/config.conf.php")){
	// header('Location: setup/index.php');
	echo '<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Accueil - Pocket Monster</title>
	</head>
	<body>
		<h2>Attention</h2>
		<p>Pocket Monster ne semble pas être installé. Pour ce faire, cliquez <a href="setup">ici</a></p>
	</body>
	</html>';
} else { ?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Accueil - Pocket Monster</title>
</head>
<body>
	<nav>
		<ul>
			<li><a href="game.php">Jouer</a></li>
			<li><a href="admin.php">Gérer</a></li>
			<li><a href="credits.php">Crédits</a></li>
		</ul>
	</nav>
</body>
</html>

<?php
}
?>