<html>
<head>
	<title>My Pocket Monster</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

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
			 		$worldManagers=new WorldsManager($db);
			 ?>
			 <div class="hero-unit">
			 	<div class="page-header">
  				<h1>Monde : <?php echo $worldManagers->get($_GET["world_id"])->name();?></h1>
				</div>
			</div>
			<h2> Liste des familles </h2>
			 <?php
			 		$managerFamily = new FamilysManager($db); //creation d'un manager pour les familles
			 		$familyList = $managerFamily->getWorldList($_GET["world_id"]);
			 		$managerMonster = new MonstersManager($db); //creation d un manager pour les monstre
			 		
			 		//création de la liste
					for ($i=0; $i < count($familyList); $i++){ //Tant qu'il n'est pas arrivé à la derniere famille du monde
					echo "<table class='table table-striped table-bordered table-condensed'>";
						$family_id= $familyList[$i]->family_id(); //on incrémente l'id
						echo "<tr><th>".$familyList[$i]->name()."</th></tr>";//on écrit le nom de la famille
						$monsterList=$managerMonster->getListByFamily($family_id); //et on liste les monstres de cet famille
						echo "<tr>";
						for ($j=0; $j<count($monsterList); $j++){
							
								echo "<td>".$monsterList[$j]->name()."<br/><img src='".$monsterList[$j]->photo_link()."'/></td>";
						}		
						if (count($monsterList)<=0) { //Si la famille est vide
							echo "<td>Empty family</td>";
						}
						echo "</tr>";
						echo "</table>";			
					}

					if (count($familyList)<=0){ //Si le monde est vide
						echo "Empty world";
					}
			 }
		 }

	?>
</div>
</body>

</html>