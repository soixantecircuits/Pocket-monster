<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Pocket-monster</title>
	</head>

	<body>
<?php
try
{
	// On se connecte � MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=pocket-monster', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arr�te tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On r�cup�re tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM world');

// On affiche chaque entr�e une � une
while ($donnees = $reponse->fetch())
{
?>
    <p>
	Id : <?php echo $donnees['id']; ?><br />
    Name : <?php echo $donnees['name']; ?><br />
	Img : <?php echo $donnees['img']; ?><br />
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requ�te

?>
	</body>
</html>