<?php
	include 'libs/setup.class.php';
	$Setup = new Setup();
	$etape = $_GET['etape'];
	$action = $_POST['action'];
	if (!isset($action)){ // si adresse rentrée manuellement
		// $etape=O;
	} else if ($action=='check'){ // si page apellée en Ajax
		$host = trim($_POST['host']);
		$user = trim($_POST['user']);
		$psw = trim($_POST['psw']);
		$bdd = trim($_POST['bdd']);
		$Setup->checkDb($host,$user,$psw,$bdd);
		return false;
	}
	switch ($etape) {
		case '1':
			if( $action=="Retour" ){header('Location: ../index.php');}
			$content= '<h1>Guide d\'installation de Pocket Monster</h1>
			<p>Veuillez renseigner les informations sur la base de donnée que va utiliser Pocket Monster</p>
			<form action="?etape=2" method="post">
				<label for="host">Hôte</label><input type="text" name="host" placeholder="ex: localhost" id="host" value ="'.$_POST['host'].'">
				<label for="user">Utilisateur</label><input type="text" name="user" placeholder="ex: root" id="user" value ="'.$_POST['user'].'">
				<label for="psw">Mot de passe</label><input type="text" name="psw" placeholder="ex: root" id="psw" value ="'.$_POST['psw'].'">
				<label for="bdd">Base de donnée</label><input type="text" name="bdd" placeholder="ex: pocket_monster" id="bdd" value ="'.$_POST['bdd'].'">
				<label for="table">Préfixe des tables</label><input type="text" name="table" placeholder="ex: pm_" id="table" value ="'.$_POST['table'].'">
				
				<input type="submit" name="action" value="Retour" id="retour">
				<input type="submit" name="action" value="Suivant" id="suivant">
			</form>
			<script type="text/javascript">
				$("#bdd").blur(function() {
					var host = $("#host").val();
					var user = $("#user").val();
					var psw = $("#psw").val();
					var bdd = $("#bdd").val();
					$.ajax({
						url:"index.php",
						data:{"action":"check","host":host,"user":user,"psw":psw,"bdd":bdd},
						type:"POST",
						success: function(data) {
							console.log(data);
						}
					})
				})
			</script>';
			break;
		
		case '2':
			if( $action=="Retour" ){header('Location: index.php');}
			$host = trim($_POST['host']);
			$user = trim($_POST['user']);
			$psw = trim($_POST['psw']);
			$bdd = trim($_POST['bdd']);
			$table = trim($_POST['table']);
			$content = '<h1>Guide d\'installation de Pocket Monster</h1>
			<p>Erreur lors de la création de la base de donnée</p>
			<form action="?etape=1" method="post">
				<input type="submit" name="retour" value="Retour" id="retour">
				<input type="hidden" name="host" value="'.$host.'" id="host">
				<input type="hidden" name="user" value="'.$user.'" id="user">
				<input type="hidden" name="psw" value="'.$psw.'" id="psw">
				<input type="hidden" name="bdd" value="'.$bdd.'" id="bdd">
				<input type="hidden" name="table" value="'.$table.'" id="table">
			</form>';
			if($connexion = mysql_connect($host,$user,$psw)){
				if($selectDb = mysql_select_db($bdd)){
					$content= '<h1>Guide d\'installation de Pocket Monster</h1>
					<p>Fini</p>';
					// $Setup->createConf($host,$user,$psw,$bdd,$table);
					// $Setup->createBdd($host,$user,$psw,$bdd,$table);
				}
			}
				break;

		default:
			$content= '<h1>Guide d\'installation de Pocket Monster</h1>
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
		<?php echo $content; ?>
	</body>
</html>