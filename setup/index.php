<?php
	require_once 'libs/setup.class.php';
	$etape = $_GET['etape'];
	$action = $_POST['action'];
	if (!isset($action)){ // si adresse rentrée manuellement
		// $etape=O;
	} else if ($action=='check'){ // si page apellée en Ajax
		$Setup = new Setup();
		$host = trim($_POST['host']);
		$user = trim($_POST['user']);
		$psw = trim($_POST['psw']);
		$db = trim($_POST['db']);
		$status = $Setup->checkDb($host,$user,$psw,$db);
		echo $status['msg'];
		return false;
	}
	switch ($etape) {
		case '1':
			if( $action=="Retour" ){header('Location: ../index.php');}
			$content= '
			<p>Veuillez renseigner les informations sur la base de donnée que va utiliser Pocket Monster</p>
			<form action="?etape=2" method="post">
				<label for="host">Hôte</label><input type="text" name="host" placeholder="ex: localhost" id="host" value ="'.$_POST['host'].'" required>
				<label for="user">Utilisateur</label><input type="text" name="user" placeholder="ex: root" id="user" value ="'.$_POST['user'].'" required>
				<label for="psw">Mot de passe</label><input type="text" name="psw" placeholder="ex: root" id="psw" value ="'.$_POST['psw'].'" required>
				<label for="db">Base de donnée</label><input type="text" name="db" placeholder="ex: pocket_monster" id="db" value ="'.$_POST['db'].'" required>
				<label for="table">Préfixe des tables</label><input type="text" name="table" placeholder="ex: pm_" id="table" value ="'.$_POST['table'].'">
				
				<input type="submit" name="action" value="Retour" id="retour">
				<input type="submit" name="action" value="Suivant" id="suivant">
			</form>
			<span id="status"></span>
			<script type="text/javascript">
				$("#db").blur(function() {
					var host = $("#host").val();
					var user = $("#user").val();
					var psw = $("#psw").val();
					var db = $("#db").val();
					$.ajax({
						url:"index.php",
						data:{"action":"check","host":host,"user":user,"psw":psw,"db":db},
						type:"POST",
						success: function(data) {
							$("#status").html(data);
						}
					})
				})
			</script>';
			break;
		
		case '2':
			$Setup = new Setup();
			if( $action=="Retour" ){header('Location: index.php');}
			$host = trim($_POST['host']);
			$user = trim($_POST['user']);
			$psw = trim($_POST['psw']);
			$db = trim($_POST['db']);
			$table = trim($_POST['table']);
			$content = '
			<p>Erreur lors de la création de la base de donnée</p>
			<form action="?etape=1" method="post">
				<input type="submit" name="retour" value="Retour" id="retour">
				<input type="hidden" name="host" value="'.$host.'" id="host">
				<input type="hidden" name="user" value="'.$user.'" id="user">
				<input type="hidden" name="psw" value="'.$psw.'" id="psw">
				<input type="hidden" name="db" value="'.$db.'" id="db">
				<input type="hidden" name="table" value="'.$table.'" id="table">
			</form>';
			$status = $Setup->checkDb($host,$user,$psw,$db);
			if ($status['success']){
				$Setup->createDb($host,$user,$psw,$db,$table);
				require_once 'libs/conf.class.php';
				$Conf = new AddConfToFile('../config/config.inc.php','w');
				$Conf->writeInFile("HOST", $host);
				$Conf->writeInFile("USER", $user);
				$Conf->writeInFile("PSW", $psw);
				$Conf->writeInFile("DB", $db);
				(empty($table))?$Conf->writeInFile("PRX", $table):$Conf->writeInFile("PRX", '_'.$table);
				$Conf->writeEndTagPhp();
				$content= '
				<p>Installation effectuée avec succès ! N\'oubliez pas de supprimer le dossier "setup" avant de continuer.</p>
				<form action="?etape=1" method="post">
					<input type="submit" name="action" value="Retour" id="retour">
				</form>';
			} else {
				$status['msg'];
			}
				break;

		default:
			$content= '
			<p>Nous allons vous guider dans le processus d\'installation de Pocket Monster. Pour continuer, cliquez sur suivant.</p>
			<form action="?etape=1" method="post">
				<input type="submit" name="action" value="Retour" id="retour">
				<input type="submit" name="action" value="Suivant" id="suivant">
			</form>';
			break;
	}
?>
<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Guide d'installation - Pocket Monster</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<h1>Guide d'installation de Pocket Monster</h1>
		<?php echo $content; ?>
	</body>
</html>