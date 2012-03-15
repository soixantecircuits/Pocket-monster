<?php
		$monsterManager = new MonstersManager($db);
		$monsterDetails= $monsterManager->getDetails(mysql_real_escape_string($_GET["monster_id"]));
		$familyRatio= new FamilysManager($db);
		$familyRatio=$familyRatio->getRatio($monsterDetails["family_id"]);
		$worldFamilyNumbers=new WorldsManager($db);
		$worldFamilyNumbers=$worldFamilyNumbers->getFamilysNumber($monsterDetails["world_id"]);

		require_once("visuel/monsterCard_body.php");
?>