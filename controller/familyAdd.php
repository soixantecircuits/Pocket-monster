header("Location: admin?page=success");<?php

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
								$photo_link="photo_family/".$_FILES['photo']['name'];
								$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$photo_link);
							break;
							//sinon on met celle par default
							case 4:
								$photo_link="photo_family/default.png";
							break;
						}
						// si tout c'est bien deroule , on ajoute a la base de donnee
						$family = new family( array(
					        'family_name' => mysql_real_escape_string($_POST["name"]),
					        'world_id' => mysql_real_escape_string($_POST["world"]),
					        'family_photo_link' => mysql_real_escape_string($photo_link),
					        'family_max_number' => mysql_real_escape_string($_POST["max_number"]),
				    	));
				    	 $managerFamily = new familysManager($db); //creation d un manager
	    				 $managerFamily->add($family);
	    				 header("Location: admin.php?page=success");
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
     
    $managerWorld = new WorldsManager($db); //creation d un manager
    $worldList=$managerWorld->getList();
    require_once("visuel/familyAdd_body.php");
?>


