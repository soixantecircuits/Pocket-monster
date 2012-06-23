<?php

class Admin{
	public $World;
	public $Monster;
	public $Family;
	
	function __construct(){
		require_once 'family.class.php';
		require_once 'monster.class.php';
		require_once 'world.class.php';
		$this->World = new World();
		$this->Monster = new Monster();
		$this->Family = new Family();
	}
	
	function checkVar($tab){
		return true;
	}
	
	function action($tab){
		$this->checkVar($tab);
		switch ($tab['type']) {
			case 'world':
				switch ($tab['action']) {
					case 'modif':
						$_Action=$this->World->showWorld($tab['id']);
						break;
					case 'add':
						$this->World->addWorld($tab);
						break;
					default:
						return false;
						break;
					}
				break;
			case 'family':
				switch ($tab['action']) {
					case 'modif':
						$_Action=$this->Family->showFamily($tab['id']);
						break;
					case 'add':
						$this->Family->addFamily($tab);
						break;
					default:
						return false;
						break;
					}
				break;
			case 'monster':
				switch ($tab['action']) {
					case 'modif':
						$_Action=$this->Monster->showMonster($tab['id']);
						break;
					case 'add':
						$this->Monster->addMonster($tab);
						break;
					default:
						return false;
						break;
					}
				break;	
			default:	
				return false;
				break;
		}
		return $_Action;
		break;
	}
	
	function listWorld(){
		return $this->World->listWorld();
	}

	function listFamily(){
		return $this->Family->listFamily();
	}
	
	function listMonster(){
		return $this->Monster->listMonster();
	}
	
	function __destruct()
	{
		
	}
}
?>