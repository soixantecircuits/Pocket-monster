<?php
class Db{
	
	private $_Link;
	private $_Bdd;
	private $_Query;
	private $_Result;
	private $_Data;
	private $_Status;
	
	function __construct($host,$user,$psw,$db){
		if($this->_Link = new mysqli($host,$user,$psw,$db)){
				return true;
			} else {
				return false;
			}
	}

	function __destruct(){
		if($this->_Link){$this->_Link->close();}
	}
	
	function checkVar($tab){
		return true;
	}
	
	function action($tab){
		$this->checkVar($tab);
		switch ($tab['action']) {
			case 'modif':
				switch ($tab['type']) {
					case 'world':
						$this->updateWorld($tab);
						break;
					case 'family':
						$this->updateFamily($tab);
						break;
					case 'monster':
						$this->updateMonster($tab);
						break;
					
					default:
						return false;
						break;
				}
				break;
			
			case 'add':
				switch ($tab['type']) {
					case 'world':
						$this->addWorld($tab);
						break;
					case 'family':	
						$this->addFamily($tab);
						break;
					case 'monster':	
						$this->addMonster($tab);
						break;
				
					default:
						return false;
						break;
					break;
				}
			default:
				return false;
				break;
		}
	}
	
	function listWorld(){
		$this->_Query='SELECT id_world, name, img_url FROM '.PRX.'world';
		$this->_Result=$this->_Link->query($this->_Query);
		while($this->_Data=$this->_Result->fetch_array(MYSQLI_ASSOC)){
			echo "<option value='{$this->_Data['id_world']}'>{$this->_Data['name']}</option>";
		}
		$this->_Result->free();
	}

	function listFamily(){
		$this->_Query='SELECT id_family, name, img_url FROM '.PRX.'family';
		$this->_Result=$this->_Link->query($this->_Query);
		while($this->_Data=$this->_Result->fetch_array(MYSQLI_ASSOC)){
			echo "<option value='{$this->_Data['id_family']}'>{$this->_Data['name']}</option>";
		}
		$this->_Result->free();
	}

	function listMonster(){
		$this->_Query='SELECT id_monster, name, img_url FROM '.PRX.'monster';
		$this->_Result=$this->_Link->query($this->_Query);
		while($this->_Data=$this->_Result->fetch_array(MYSQLI_ASSOC)){
			echo "<option value='{$this->_Data['id_monster']}'>{$this->_Data['name']}</option>";
		}
		$this->_Result->free();
	}
	
	function updateWorld($world,$data){
		
	}

	function updateFamily($family,$data){
		
	}

	function updateMonster($monster,$data){
		
	}
	
	function addWorld($world){
		$this->_Query='INSERT INTO `'.DB.'`.`'.PRX.'world` (`name`, `img_url`) VALUES ("'.$world["worldname"].'", "'.$world["worldfile"].'");';
		$this->_Link->query($this->_Query) or die ($this->_Link->error());
	}

	function addFamily($family){
		$this->_Query='INSERT INTO `'.DB.'`.`'.PRX.'family` (`id_world`, `name`, `img_url`, `max_monster`) VALUES ("'.$family["familyworld"].'", "'.$family["familyname"].'","'.$family["familyfile"].'", "'.$family["familylimit"].'");';
		// echo $this->_Query;
		$this->_Link->query($this->_Query) or die ($this->_Link->error());
	}

	function addMonster($monster){
		$this->_Query='INSERT INTO `'.DB.'`.`'.PRX.'monster` (`id_family`, `taille`, `poids`, `force`,`agilite`, `intelligence`, `name`, `img_url`) VALUES ("'.$monster["monsterfamily"].'", "'.$monster["taille"].'","'.$monster["poids"].'", "'.$monster["force"].'","'.$monster["agilite"].'", "'.$monster["intelligence"].'","'.$monster["monstername"].'", "'.$monster["monsterfile"].'");';
		// echo $this->_Query;
		$this->_Link->query($this->_Query) or die ($this->_Link->error());
	}

}

?>