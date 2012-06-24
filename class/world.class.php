<?php
class World {
	
	function __construct(){
		$this->Db = new mysqli(HOST,USER,PSW,DB);
	}
	
	function checkWorld(){
		$_Query='SELECT id_world, name, img_url FROM '.PRX.'world';
		$_result=$this->Db->query($_Query);
		$_Count=$_result->num_rows;
		return $_Count;
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
		echo "Monde ajouté.";
	}

	function updateWorld($world){
		($world['worldfile_'])?$img_url=$world['worldfile_']:$img_url=$world['worldfile'];
		$_query='UPDATE  `'.DB.'`.`'.PRX.'world` SET  `name` =  "'.$world["worldname"].'",
		`img_url` =  "'.$img_url.'" WHERE  '.PRX.'world.`id_world` ='.$world["worldid"];
		$this->Db->query($_query) or die ($this->_Link->error());
		if (isset($monster['annuler'])) {
			echo "Monde restauré.";
		} else {
			echo 'Monde crée.';
		}
	}
	
	function deleteWorld($world){
		$_Query='SELECT name FROM '.PRX.'family WHERE id_world='.$world["worldid"];
		$_result=$this->Db->query($_Query);
		$_Count=$_result->num_rows;
		$_result=$this->Db->query($_Query);
		$echo="(";
		$i=0;
		while($_data=$_result->fetch_array(MYSQLI_ASSOC)){
			$i++;
			$echo.=$_data['name'];
			if($_Count>$i){$echo.=", ";}
		}
		$echo.=')';
		if($_Count>1){
			echo "Impossible de supprimer ce monde car ".$_Count." familles y sont référencées. ".$echo;
		} else if($_Count==1){
			echo "Impossible de supprimer ce monde car 1 famille y est référencée. ".$echo;
		} else {
			$_Query='DELETE FROM '.DB.'.'.PRX.'`world` WHERE id_world='.$world["worldid"];
			$this->Db->query($_Query) or die ($this->_Link->error());
			echo "Monde supprimé !
				<form action='admin.php' method='POST'>
				<input type='hidden' name='worldname' value='".$world["worldname"]."' id='worldname'>
				<input type='hidden' name='worldfile' value='".$world["worldfile"]."' id='worldfile'>
				<input type='hidden' name='worldid' value='".$world["worldid"]."' id='worldid'>
				<input type='hidden' name='action' value='add' id='action'>
				<input type='hidden' name='type' value='world' id='type'>
				<input type='submit' name='annuler' value='Annuler' id='annuler'>
				</form>";
		}
		$_result->free();
	}
	
	function __destruct(){
		
	}
}
?>