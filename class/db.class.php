<?php
class Db{
	
	public $_Link;
	public $_Bdd;
	
	function __construct($host,$user,$psw,$db){
		if($this->_Link = new mysqli($host,$user,$psw,$db)){
				return $this->_Link;
			} else {
				return false;
			}
	}

	function __destruct(){
		if($this->_Link){$this->_Link->close();}
	}
	

	//////////////// LIST ////////////////////////




	
	//////////////// SHOW ////////////////////////	





	
	//////////////// UPDATE ////////////////////////


	function updateFamily($family){
		
	}

	function updateMonster($monster){
		
	}
	
	//////////////// ADD ////////////////////////






}

?>