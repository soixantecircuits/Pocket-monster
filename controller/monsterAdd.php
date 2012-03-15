<?php

if (isset($_POST["name"])){
	if (!empty($_POST["name"])){ //verification du nom
				
				if (isset($_FILES['photo']['name']))//Verifications lors de l'envoi de la photo
				{
					$maxsize=500000;

					//Si il n'y a pas d'erreur lors du transfert et si le fichier n'est pas trop volumineux
					if (($_FILES["photo"]["error"]==0||$_FILES["photo"]["error"]==4)
						&&$_FILES["photo"]["size"]<=$maxsize)
					{
						switch ($_FILES["photo"]["error"])
						{
							//si l'utilisateur a upload une photo on la transfert
							case 0:
								$photo_link="photo_monstre/".$_FILES['photo']['name'];
								$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$photo_link);
							break;
							//sinon on met celle par default
							case 4:
								$photo_link="photo_monstre/default.png";
							break;
						}
						// si tout c'est bien deroule , on ajoute a la base de donnee
						$monstre = new Monster( array(
					        'monster_name' => mysql_real_escape_string($_POST["name"]),
					        'family_id' => mysql_real_escape_string($_POST["family"]),
					        'monster_photo_link' => $photo_link,
					        'monster_hair_color' => mysql_real_escape_string($_POST["hair_color"]),
					        'monster_skin_type' => mysql_real_escape_string($_POST["skin_type"]),
					        "monster_blood_type"=> mysql_real_escape_string($_POST["blood_type"]),
					        "monster_teeth"=> mysql_real_escape_string($_POST["teeth"]),
				    	));
				    	 $managerMonster = new MonstersManager($db); //creation d un manager
	    				 $managerMonster->add($monstre);
	    				 echo "Your monster has been created";
					}

					else{
						echo "Your photo size is too large, 500 Mo max.";
					}
				}
	}
	else {
		echo "You forgot to enter a name";
	}
}
     
    $managerFamily = new FamilysManager($db); //creation d un manager
    $familyList=$managerFamily->getList();
    require_once("visuel/monsterAdd_body.php");
?>


