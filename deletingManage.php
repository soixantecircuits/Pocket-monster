<?php
	
	function deleteMonster ($name){
		require_once("base/connexion.php");
		$monsterManager->delete($mydb,$name);
	}
	
	
	//if we delete a world
	function deleteFamily($name){
		require_once("base/connexion.php");
		$familyManager->delete($mydb, $name);
	}
	
	
	function deleteWorld($name){
		require_once("base/connexion.php");
		$worldManager->delete($mydb, $name);
	}
	
	if(isset($_GET["is"])){
		if($_GET["is"] == "monster"){
			if(!empty($_GET["name"])){
				deleteMonster($_GET["name"]);
			}
		}
		if($_GET["is"] == "family"){
			if(!empty($_GET["name"])){
				deleteFamily($_GET["name"]);
			}
		}
		if($_GET["is"] == "world"){
			if(!empty($_GET["name"])){
				deleteWorld($_GET["name"]);
			}
		}
	}
	require_once("base/connexion.php");
	Redirect("index.php");
?>