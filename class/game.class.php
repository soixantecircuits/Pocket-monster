<?php
class game {
	
	function __construct(){
		require_once 'family.class.php';
		require_once 'monster.class.php';
		require_once 'world.class.php';
		$this->World = new World();
		$this->Monster = new Monster();
		$this->Family = new Family();
	}
	
	function getMonster($id){
		return $this->Monster->listMonster($id);
	}

	function getFamily($id){
		return $this->Family->listFamily($id);
	}
	
	function getWorld(){
		return $this->World->listWorld();	
	}
	
	function checkMonster($id){
		return $this->Monster->checkMonster($id);
	}
	
	function checkFamily($id){
		return $this->Family->checkFamily($id);
	}
	
	function checkWorld(){
		return $this->World->checkWorld();
	}
}
?>