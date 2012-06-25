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
						$_Action=$this->World->showWorld($tab['id_world']);
						break;
					case 'add':
						$this->World->addWorld($tab);
						break;
					case 'update':
						switch ($tab['submit']) {
							case 'Modifier':
								$this->World->updateWorld($tab);
								break;
							case 'Supprimer':
								$this->World->deleteWorld($tab);
								break;
							default:
								return false;
								break;
						}
					default:
						return false;
						break;
					}
				break;
			case 'family':
				switch ($tab['action']) {
					case 'modif':
						$_Action=$this->Family->showFamily($tab['id_family']);
						break;
					case 'add':
						$this->Family->addFamily($tab);
						break;
					case 'update':
						switch ($tab['submit']) {
							case 'Modifier':
								$this->Family->updateFamily($tab);
								break;
							case 'Supprimer':
								$this->Family->deleteFamily($tab);
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
				break;
			case 'monster':
				switch ($tab['action']) {
					case 'modif':
						$_Action=$this->Monster->showMonster($tab['id_monster']);
						break;
					case 'add':
						$this->Monster->addMonster($tab);
						break;
					case 'update':
						switch ($tab['submit']) {
							case 'Modifier':
								$this->Monster->updateMonster($tab);
								break;
							case 'Supprimer':
								$this->Monster->deleteMonster($tab);
								break;
							default:
								return false;
								break;
						}
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
	
	function checkWorld(){
		return $this->World->checkWorld();
	}

	function listFamily(){
		return $this->Family->listFamily(false);
	}
	
	function checkFamily(){
		return $this->Family->checkFamily(false);
	}
	
	function listMonster(){
		return $this->Monster->listMonster(false);
	}
	
	function checkMonster(){
		return $this->Monster->checkMonster(false);
	}
	
	function __destruct()
	{
		
	}
}
?>