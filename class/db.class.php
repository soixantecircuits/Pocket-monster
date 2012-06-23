<?php
class Db{
	
	private $_Link;
	private $_Bdd;
	private $_Query;
	private $_Status;
	
	function __construct($host,$user,$psw,$db){
		if($this->_Link = mysql_connect($host,$user,$psw)){
			if($this->_Bdd = mysql_select_db($db)){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	function __destruct(){
		if($this->_Link){mysql_close($this->_Link);}
	}
}

?>