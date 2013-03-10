<?php
	require_once ("imageVerify.php");
	
	
	function creatMonster (){
		require_once ("imageVerify.php");
		require_once("base/connexion.php");
		if(is_image($_POST['m_pic']))
			$image = $_POST['m_pic'];
		else
			$image = "doc/monster.jpg";
		$monster = new Monster($_POST['m_name'], $_POST['m_age'], $image,$_POST['m_family'], $_POST['m_eyes'], $_POST['m_hair'], $_POST['m_skin']);
		$monsterManager->add($mydb, $monster);
		
	}
	
	function creatWorld(){
		require_once("base/connexion.php");
		//setting the picture 
		if(is_image($_POST['w_pic']))
			$image = $_POST['w_pic'];
		else
			$image = "doc/world.png"; //default image
		
		$world = new World($_POST['w_name'], $image);
		$worldManager->add($mydb, $world);
	}
	
	function creatFamily(){
		require_once ("imageVerify.php");
		require_once("base/connexion.php");
		if(is_image($_POST['f_pic']))
			$image = $_POST['f_pic'];
		else
			$image = "doc/family.jpg";
		$family = new Family($_POST['f_name'], $_POST['f_world'], $image, $_POST['f_max']);
		$familyManager->add($mydb, $family);
		
	}
	
	
	if (isset($_GET["is"])){
		if($_GET["is"] == "monster"){
			creatMonster();
		}
		if($_GET["is"] == "family"){
			creatFamily();
		}
		if($_GET["is"] == "world"){
			creatWorld();
		}
	}
	
	require_once("base/connexion.php");
	Redirect('index.php');
?>