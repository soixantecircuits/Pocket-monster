<?php
class Family {
	
	function __construct(){
		$this->Db = new mysqli(HOST,USER,PSW,DB);
	}
	
	function checkFamily($id){
		if($id){
			$_Query='SELECT id_family, name, img_url FROM '.PRX.'family WHERE id_world='.$id;
		}else{
			$_Query='SELECT id_family, name, img_url FROM '.PRX.'family';
		}
		$_Result=$this->Db->query($_Query);
		$_Count=$_Result->num_rows;
		$_Result->free();
		return $_Count;
	}
	
	function listFamily($id){
		if($id){
			$_Query='SELECT id_family, name, img_url FROM '.PRX.'family WHERE id_world='.$id.' ORDER BY name';
		}else{
			$_Query='SELECT id_family, name, img_url FROM '.PRX.'family  ORDER BY name';
		}
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
		$this->Db->query($_Query);
		if (isset($family['annuler'])) {
			echo "Famille restaurée.";
		} else {
			echo 'Famille créée.';
		}
	}

	function updateFamily($family){
		($family['familyfile_'])?$img_url=$family['familyfile_']:$img_url=$family['familyfile'];
		$_Query='UPDATE  `'.DB.'`.`'.PRX.'family` SET  
		`name` =  "'.$family["familyname"].'",
		`id_world` =  "'.$family["idworld"].'",
		`img_url` =  "'.$img_url.'" 
		WHERE  '.PRX.'family.`id_family` ='.$family["familyid"];
		$this->Db->query($_Query) or die ($this->_Link->error());
		$_Query='SELECT id_monster FROM '.PRX.'monster WHERE id_family='.$family["familyid"];
		$_Result=$this->Db->query($_Query);
		$_Count=$_Result->num_rows;
		if($family['familylimit']<$_Count){echo "Il y a trop de monstre dans cette famille pour réduire sa limite. (".$_Count.")";return false;}
		$_Query='UPDATE  `'.DB.'`.`'.PRX.'family`
		SET `max_monster` =  "'.$family["familylimit"].'"
		WHERE  '.PRX.'family.`id_family` ='.$family["familyid"];
		$this->Db->query($_Query);
		$_Result->free();
	}
	
	function deleteFamily($family){
		$_Query='SELECT name FROM '.PRX.'monster WHERE id_family='.$family["familyid"];
		$_Result=$this->Db->query($_Query);
		$_Count=$_Result->num_rows;
		$_Result=$this->Db->query($_Query);
		$echo="(";
		$i=0;
		while($_data=$_Result->fetch_array(MYSQLI_ASSOC)){
			$i++;
			$echo.=$_data['name'];
			if($_Count>$i){$echo.=", ";}
		}
		$echo.=')';
		if($_Count>1){
			echo "Impossible de supprimer cette famille car ".$_Count." monstres y sont référencés. ".$echo;
		} else if($_Count==1){
			echo "Impossible de supprimer cette famille car 1 monstre y est référencé. ".$echo;
		} else {
			$_Query='DELETE FROM '.DB.'.'.PRX.'`family` WHERE id_family='.$family["familyid"];
			$this->Db->query($_Query);
			echo "Famille supprimée !
				<form action='admin.php' method='POST'>
				<input type='hidden' name='familyname' value='".$family["familyname"]."' id='familyname'>
				<input type='hidden' name='familylimit' value='".$family["familylimit"]."' id='familylimit'>
				<input type='hidden' name='idworld' value='".$family["idworld"]."' id='idworld'>
				<input type='hidden' name='familyfile' value='".$family["familyfile"]."' id='familyfile'>
				<input type='hidden' name='action' value='add' id='action'>
				<input type='hidden' name='type' value='family' id='type'>
				<input type='submit' name='annuler' value='Annuler' id='annuler'>
				</form>";
		}
		$_Result->free();
	}
	
	function __destruct(){
		
	}
}
?>