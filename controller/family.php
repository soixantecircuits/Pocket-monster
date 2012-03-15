 			<?php
 			$worldManagers=new WorldsManager($db);
 			if (!isset($_GET["world_id"])){
 				header("Location: index.php");
 				exit();
 			}
			 ?>
			 <div class="hero-unit">
			 	<div class="page-header">

  				<h1>World : <?php $world=$worldManagers->get($_GET["world_id"]);
  								  if (!empty($world)) {
  								  	echo $world->world_name();
  								  }
  							?></h1>
				</div>
			</div>
			<h2> Family List </h2>
			 <?php
			 		$managerFamily = new FamilysManager($db); //creation d'un manager pour les familles
			 		$familyList = $managerFamily->getWorldList($_GET["world_id"]);
			 		$managerMonster = new MonstersManager($db); //creation d un manager pour les monstre
			 		
			 		//creation de la liste
					for ($i=0; $i < count($familyList); $i++){ //Tant qu'il n'est pas arrivé à la derniere famille du monde
					echo "<table class='table table-striped table-bordered table-condensed'>";
						$family_id= htmlentities($familyList[$i]->family_id()); //on incrémente l'id
						echo "<tr><th><h3>".htmlentities($familyList[$i]->family_name())."<h3></th></tr>";//on écrit le nom de la famille
						$monsterList=$managerMonster->getListByFamily($family_id); 
						echo "<tr>";
							//et on liste les monstres de cet famille
						for ($j=0; $j<count($monsterList); $j++){
							
								echo ("<td>
										<a href='?page=monster&&monster_id=".htmlentities($monsterList[$j]->monster_id())."'>
											<p>".htmlentities($monsterList[$j]->monster_name())."<p/>
											<img src='".$monsterList[$j]->monster_photo_link()."'/>
										</a>
										</td>
									");
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
			?>
			<script>
			document.body.background="<?php echo $worldManagers->get($_GET['world_id'])->world_photo_link();?>"
			</script>