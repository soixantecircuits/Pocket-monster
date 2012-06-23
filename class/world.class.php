<?php
class World {
	
	function __construct(){
		$this->Db = new mysqli(HOST,USER,PSW,DB);
	}
	
	function listWorld(){
		$_query='SELECT id_world, name, img_url FROM '.PRX.'world ORDER BY name';
		$_result=$this->Db->query($_query);
		$i=0;
		while($_data=$_result->fetch_array(MYSQLI_ASSOC)){
			$_return[$i]['id_world']=$_data['id_world'];
			$_return[$i]['name']=$_data['name'];
			$_return[$i]['img_url']=$_data['img_url'];
			$i++;
		}
		$_result->free();
		return $_return;
	}

	function showWorld($id){
		$_query='SELECT id_world, name, img_url FROM '.PRX.'world WHERE id_world='.$id;
		$_result=$this->Db->query($_query);
		while($_data=$_result->fetch_array(MYSQLI_ASSOC)){
			$_return=$_data;
		}
		$_result->free();
		return $_return;
	}
	
	function addWorld($world){
		$_query='INSERT INTO `'.DB.'`.`'.PRX.'world` (`name`, `img_url`) VALUES ("'.$world["worldname"].'", "'.$world["worldfile"].'");';
		$this->Db->query($_query) or die ($this->_Link->error());
	}

	function updateWorld($world){
		
	}
	
	function deleteWorld($world){
		
	}
	
	function __destruct(){
		
	}
}
?>