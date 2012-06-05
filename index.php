<html>
<head>
	<title>My Pocket Monster</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
	<?php
	    function chargerClasse ($classe)
	    {
	        require "model/".$classe . '.class.php'; // On inclu la classe
	    }
	 	
	    spl_autoload_register ('chargerClasse'); // On apellera la fonction si la classe n'est pas instanciee
	     $db = new PDO('mysql:host=localhost;dbname=pocket_monster_schobbent', 'root', ''); //connexion a la bdd

		if (!isset($_GET["page"])){
			$managerWorld = new WorldsManager($db); //creation d un manager pour le monde
			$worldList=$managerWorld->getList();
			require_once("visuel/world_list.php");
		}

		 else {
			 switch ($_GET["page"])
			 {
			 	//quand il sagit d'afficher les monstres
			 	case "family": 
					require_once("controller/family.php");
				break;
				case "monster":
					require_once("controller/monsterCard.php");
				break;
			 }
		 }



	?>
</div>
<a id="footer" class="btn-large btn-success" href="admin.php">Admin Panel</a>
</body>

</html>