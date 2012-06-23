<?php
class Family {
	
	function __construct(){
		$this->Db = new mysqli(HOST,USER,PSW,DB);
	}
	
	function listFamily(){
		$_Return="";
		$_Query='SELECT id_family, name, img_url FROM '.PRX.'family  ORDER BY name';
		$_Result=$this->Db->query($_Query);
		$i=0;
		while($_data=$_Result->fetch_array(MYSQLI_ASSOC)){
			$_return[$i]['id_family']=$_data['id_family'];
			$_return[$i]['name']=$_data['name'];
			$_return[$i]['img_url']=$_data['img_url'];
			$i++;
		}
		$_Result->free();
		return $_return;
	}

	function showFamily($id){
		require_once 'world.class.php';
		$this->World = new World();
		$_Query='SELECT id_family, id_world, name, img_url, max_monster FROM '.PRX.'family WHERE id_family='.$id;
		$_Result=$this->Db->query($_Query);
		while($_Data=$_Result->fetch_array(MYSQLI_ASSOC)){
			$_Return=$_Data;
		}
		$_Result->free();
		return $_Return;
	}
	
	function addFamily($family){
		$_Query='INSERT INTO `'.DB.'`.`'.PRX.'family` (`id_world`, `name`, `img_url`, `max_monster`) VALUES ("'.$family["familyworld"].'", "'.$family["familyname"].'","'.$family["familyfile"].'", "'.$family["familylimit"].'");';
		// echo $this->_Query;
		$this->Db->query($_Query) or die ($this->_Link->error());
	}

	function updateFamily($family){
		
	}
	
	function deleteFamily($family){
		
	}
	
	function __destruct(){
		
	}
}
?>