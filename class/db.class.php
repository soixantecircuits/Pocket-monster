<?php
class Db{
	
	private $_Link;
	private $_Bdd;
	
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
						$_Action=$this->showWorld($tab['id']);
						break;
					case 'family':
						$_Action=$this->showFamily($tab['id']);
						break;
					case 'monster':
						$_Action=$this->showMonster($tab['id']);
						break;
					
					default:
						return false;
						break;
				}
				return $_Action;
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
	//////////////// LIST ////////////////////////
	function listWorld(){
		$_Query='SELECT id_world, name, img_url FROM '.PRX.'world';
		$_Result=$this->_Link->query($_Query);
		while($_Data=$_Result->fetch_array(MYSQLI_ASSOC)){
			$_Return.= "<option value='{$_Data['id_world']}'>{$_Data['name']}</option>";
		}
		$_Result->free();
		return $_Return;
	}

	function listFamily($id){
		$_Return="";
		$_Query='SELECT id_family, name, img_url FROM '.PRX.'family';
		$_Result=$this->_Link->query($_Query);
		while($_Data=$_Result->fetch_array(MYSQLI_ASSOC)){
			if ($id==$_Data['id_family']) {
			$_Return.= "<option value='{$_Data['id_family']}' selected>{$_Data['name']}</option>";
			} else {
				$_Return.= "<option value='{$_Data['id_family']}'>{$_Data['name']}</option>";
			}
		}
		$_Result->free();
		return $_Return;
	}

	function listMonster(){
		$_Return="";
		$_Query='SELECT id_monster, name, img_url FROM '.PRX.'monster';
		$_Result=$this->_Link->query($_Query);
		while($_Data=$_Result->fetch_array(MYSQLI_ASSOC)){
			$_Return.="<option value='{$_Data['id_monster']}'>{$_Data['name']}</option>";
		}
		$_Result->free();
		return $_Return;
	}
	
	//////////////// SHOW ////////////////////////	
	function showWorld($id){
		$_Query='SELECT id_world, name, img_url FROM '.PRX.'world WHERE id_world='.$id;
		$_Result=$this->_Link->query($_Query);
		while($_Data=$_Result->fetch_array(MYSQLI_ASSOC)){
			$_Return="<form action='admin.php' method='post' class='modified'>
				<ul>
					<li><label for='worldname'>Nom</label><input type='text' name='worldname' value='{$_Data['name']}' id='worldname'/></li>
					<li><img src='img/{$_Data['img_url']}' alt='{$_Data['name']}'/></li>
					<li><input type='file' name='worldfile' id='worldfile'></li>
				</ul>
				<input type='hidden' name='worldid' value='{$_Data['id_world']}' id='worldid'>
				<input type='submit' name='action' value='Modifier' id='action'>
			</form>";
		}
		$_Result->free();
		return $_Return;
	}

	function showFamily($id){
		$_Query='SELECT id_family, id_world, name, img_url, max_monster FROM '.PRX.'family WHERE id_family='.$id;
		$_Result=$this->_Link->query($_Query);
		while($_Data=$_Result->fetch_array(MYSQLI_ASSOC)){
			$_Return="<form action='admin.php' method='post' class='modified'>
				<ul>
					<li><label for='familyname'>Nom</label><input type='text' name='familyname' value='{$_Data['name']}' id='familyname'/></li>
					<li><label for='familylimit'>Limite de monstre</label><input type='text' name='familylimit' value='{$_Data['max_monster']}' id='familylimit'/></li>
					<li><img src='img/{$_Data['img_url']}' alt='{$_Data['name']}'/></li>
					<li><input type='file' name='familyfile' id='familyfile'></li>
					<label for='id'>Monde</label><select name='id' id='modifFamily2'>";
			$_Return.=$this->listWorld();
			$_Return.="
					</select>
				</ul>
				<input type='hidden' name='familyid' value='{$_Data['id_family']}' id='familyid'>
				<input type='submit' name='action' value='Modifier' id='action'>
			</form>";
		}
		$_Result->free();
		return $_Return;
	}

	function showMonster($id){
		$_Query='SELECT id_monster, id_family, taille, poids, `force`, agilite, intelligence, name, img_url FROM '.PRX.'monster WHERE id_monster='.$id;
		$_Result=$this->_Link->query($_Query);
		while($_Data=$_Result->fetch_array(MYSQLI_ASSOC)){
			$_Return="<form action='admin.php' method='post' class='modified'>
				<ul>
					<li><label for='monstername'>Nom</label><input type='text' name='monstername' value='{$_Data['name']}' id='monstername'/></li>
					<li><label for='taille'>Taille</label><input type='text' name='taille' value='{$_Data['taille']}' id='taille'/></li>
					<li><label for='poids'>Poids</label><input type='text' name='poids' value='{$_Data['poids']}' id='poids'/></li>
					<li><label for='force'>Force</label><input type='text' name='force' value='{$_Data['force']}' id='force'/></li>
					<li><label for='agilite'>Agilité</label><input type='text' name='agilite' value='{$_Data['agilite']}' id='agilite'/></li>
					<li><label for='intelligence'>Intelligence</label><input type='text' name='intelligence' value='{$_Data['intelligence']}' id='intelligence'/></li>
					<li><img src='img/{$_Data['img_url']}' alt='{$_Data['name']}'/></li>
					<li><input type='file' name='monsterfile' id='monsterfile'></li>
					<label for='id'>Famille</label><select name='id' id='modifMonster2'>";
			$_Return.=$this->listFamily($_Data['id_family']);
			$_Return.="
					</select>
				</ul>
				<input type='hidden' name='monsterid' value='{$_Data['id_monster']}' id='monsterid'>
				<input type='submit' name='action' value='Modifier' id='action'>
			</form>";
		}
		$_Result->free();
		return $_Return;
	}
	
	//////////////// UPDATE ////////////////////////
	function updateWorld($world){
		
	}

	function updateFamily($family){
		
	}

	function updateMonster($monster){
		
	}
	
	//////////////// ADD ////////////////////////
	function addWorld($world){
		$_Query='INSERT INTO `'.DB.'`.`'.PRX.'world` (`name`, `img_url`) VALUES ("'.$world["worldname"].'", "'.$world["worldfile"].'");';
		$this->_Link->query($_Query) or die ($this->_Link->error());
	}

	function addFamily($family){
		$_Query='INSERT INTO `'.DB.'`.`'.PRX.'family` (`id_world`, `name`, `img_url`, `max_monster`) VALUES ("'.$family["familyworld"].'", "'.$family["familyname"].'","'.$family["familyfile"].'", "'.$family["familylimit"].'");';
		// echo $this->_Query;
		$this->_Link->query($_Query) or die ($this->_Link->error());
	}

	function addMonster($monster){
		$_Query='SELECT id_monster FROM '.PRX.'monster WHERE id_family='.$monster["monsterfamily"];
		$_Result=$this->_Link->query($_Query);
		$_Count=$_Result->num_rows;
		$_Query='SELECT max_monster FROM '.PRX.'family WHERE id_family='.$monster["monsterfamily"];
		$_Result=$this->_Link->query($_Query);
		$_Data=$_Result->fetch_array(MYSQLI_NUM);
		if($_Data[0]<=$_Count){echo "Limite de monstre atteinte pour cette famille. ($_Data[0])";return false;}
		$_Query='INSERT INTO `'.DB.'`.`'.PRX.'monster` (`id_family`, `taille`, `poids`, `force`,`agilite`, `intelligence`, `name`, `img_url`) VALUES ("'.$monster["monsterfamily"].'", "'.$monster["taille"].'","'.$monster["poids"].'", "'.$monster["force"].'","'.$monster["agilite"].'", "'.$monster["intelligence"].'","'.$monster["monstername"].'", "'.$monster["monsterfile"].'");';

		$this->_Link->query($_Query) or die ($this->_Link->error());
	}

}

?>