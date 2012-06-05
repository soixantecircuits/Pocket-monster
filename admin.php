<html>
<head>
	<title>My Pocket Monster</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<div id="popup"><p id="popuptext"> <p></div>
<script type="text/javascript" src="js/popup.js"></script>

<div class="container">

	<?php
	    function chargerClasse ($classe)
    {
        require "model/".$classe . '.class.php'; // On inclu la classe
    }
 
    spl_autoload_register ('chargerClasse'); // On apellera la fonction si la classe n'est pas instanciee

 	$db = new PDO('mysql:host=localhost;dbname=pocket_monster_schobbent', 'root', ''); //connexion a la bdd
	if (isset($_GET["page"])){
		switch ($_GET["page"])
		{
			case "monster":
				require_once("controller/monsterAdd.php");
			break;
			case "family":
				require_once("controller/familyAdd.php");
			break;
			case "world":
				require_once("controller/worldAdd.php");
			break;
			case "success":
				echo ("<script>
						document.getElementById('popuptext').innerHTML='All have been saved with success';
						popupgrowup();
					  </script>"
					);
			break;
		}
	}
	else {
?>		
		<div class="hero-unit">
			<h1> Choose something to create </h1>
		</div>
			<div class="span6 offset3">
			<a class="btn-large btn-primary" href="?page=monster">Create a monster</a>
			<a class="btn-large btn-success" href="?page=family">Create a Family</a>
			<a class="btn-large btn-warning" href="?page=world">Create a World</a>
		</div>

<?php
	}
?>
<a id="footer" class="btn-large btn-info" href="index.php">My pocket monster</a>


</body>
</html>