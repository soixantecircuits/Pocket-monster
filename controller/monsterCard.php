<?php
if (!isset($_GET["monster_id"])){
	header("Location: index.php");
	exit();
}
		$monsterManager = new MonstersManager($db);
		$monsterDetails= $monsterManager->getDetails(mysql_real_escape_string($_GET["monster_id"]));
		$familyRatio= new FamilysManager($db);
		$familyRatio=$familyRatio->getRatio($monsterDetails["family_id"]);
		$worldManagers=new WorldsManager($db);
		$worldFamilyNumbers=$worldManagers->getFamilysNumber($monsterDetails["world_id"]);
		$world_id=$monsterDetails["world_id"];

		require_once("visuel/monsterCard_body.php");
?>

<script>
			document.body.background="<?php echo $worldManagers->get($world_id)->world_photo_link();?>";
</script>