<?php
class Monster {
	
	function __construct(){
		$this->Db = new mysqli(HOST,USER,PSW,DB);
	}
	
	function listMonster(){
		$_Query='SELECT id_monster, name, img_url FROM '.PRX.'monster ORDER BY name';
		$_Result=$this->Db->query($_Query);
		$i=0;
		while($_data=$_Result->fetch_array(MYSQLI_ASSOC)){
			$_return[$i]['id_monster']=$_data['id_monster'];
			$_return[$i]['name']=$_data['name'];
			$_return[$i]['img_url']=$_data['img_url'];
			$i++;
		}
		$_Result->free();
		return $_return;
	}

	function showMonster($id){
		$_Query='SELECT id_monster, id_family, taille, poids, `force`, agilite, intelligence, name, img_url FROM '.PRX.'monster WHERE id_monster='.$id;
		$_Result=$this->Db->query($_Query);
		while($_Data=$_Result->fetch_array(MYSQLI_ASSOC)){
			$_Return=$_Data;
		}
		$_Result->free();
		return $_Return;
	}
	
	function addMonster($monster){
		$_Query='SELECT id_monster FROM '.PRX.'monster WHERE id_family='.$monster["monsterfamily"];
		$_Result=$this->Db->query($_Query);
		$_Count=$_Result->num_rows;
		$_Query='SELECT max_monster FROM '.PRX.'family WHERE id_family='.$monster["monsterfamily"];
		$_Result=$this->Db->query($_Query);
		$_Data=$_Result->fetch_array(MYSQLI_NUM);
		if($_Data[0]<=$_Count){echo "Limite de monstre atteinte pour cette famille. ($_Data[0])";return false;}
		$_Query='INSERT INTO `'.DB.'`.`'.PRX.'monster` (`id_family`, `taille`, `poids`, `force`,`agilite`, `intelligence`, `name`, `img_url`) VALUES ("'.$monster["monsterfamily"].'", "'.$monster["taille"].'","'.$monster["poids"].'", "'.$monster["force"].'","'.$monster["agilite"].'", "'.$monster["intelligence"].'","'.$monster["monstername"].'", "'.$monster["monsterfile"].'");';

		$this->Db->query($_Query) or die ($this->Db->error());
	}

	function updateMonster($monster){
		($monster['monsterfile_'])?$img_url=$monster['monsterfile_']:$img_url=$monster['monsterfile'];
		$_query='UPDATE  `'.DB.'`.`'.PRX.'monster`
		SET  `name` =  "'.$monster["monstername"].'",
		`img_url` =  "'.$img_url.'" ,
		`taille` =  "'.$monster["taille"].'",
		`poids` =  "'.$monster["poids"].'",
		`force` =  "'.$monster["force"].'",
		`agilite` =  "'.$monster["agilite"].'",
		`intelligence` =  "'.$monster["intelligence"].'"
		WHERE  '.PRX.'monster.`id_monster` ='.$monster["monsterid"];
		$this->Db->query($_query) or die ($this->_Link->error());
		$_Query='SELECT id_monster FROM '.PRX.'monster WHERE id_family='.$monster["id"];
		$_Result=$this->Db->query($_Query);
		$_Count=$_Result->num_rows;
		$_Query='SELECT max_monster FROM '.PRX.'family WHERE id_family='.$monster["id"];
		$_Result=$this->Db->query($_Query);
		$_Data=$_Result->fetch_array(MYSQLI_NUM);
		if($_Data[0]<=$_Count){echo "Limite de monstre atteinte pour cette famille. ($_Data[0])";return false;}
		$_query='UPDATE  `'.DB.'`.`'.PRX.'monster`
		SET  `id_family` =  "'.$monster["id"].'"
		WHERE  '.PRX.'monster.`id_monster` ='.$monster["monsterid"];
		$this->Db->query($_query) or die ($this->_Link->error());
	}
	
	function deleteMonster($monster){
		
	}
	
	function __destruct(){
		
	}
}
?>