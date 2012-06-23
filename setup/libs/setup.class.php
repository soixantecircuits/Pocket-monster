<?php
class Setup{
	
	private $_Link;
	private $_Bdd;
	private $_Query;
	private $_Status;
	
	public	function __construct(){
		
	}
	
	public function checkDb($host,$user,$psw,$db){
		if($this->_Link = mysql_connect($host,$user,$psw)){
			if($this->_Bdd = mysql_select_db($db)){
				$this->_Status = array('success'=> true, 'msg' => 'Ok');
			} else {
				$this->_Status = array('success'=> false, 'msg' => "la base de donnée n'existe pas");
			}
		} else {
			$this->_Status = array('success'=> false, 'msg' => "Impossible de se connecter à la base de données");
		}
		return $this->_Status; 
	}
	
	public function connectDb($host,$user,$psw,$db){
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
	
	public function createConf($host,$user,$psw,$db,$table){
		$this->_Query = 'drop table world';
		mysql_query($this->_Query);
		$this->_Query = 'drop table family';
		mysql_query($this->_Query);
		$this->_Query = 'drop table monster';
		mysql_query($this->_Query);
	}
		
	public function createDb($host,$user,$psw,$db,$table){
		if (isset($table) and !empty($table)){
			$world=$table."_world";
			$family=$table."_family";
			$monster=$table."_monster";
		}else{
			$world="world";
			$family="family";
			$monster="monster";
		}
		
		$this->_Query="
		CREATE TABLE $world (
		`id_world` INT NOT NULL AUTO_INCREMENT,
		`name` VARCHAR( 50 ) NOT NULL,
		`img_url` VARCHAR( 50 ) NOT NULL,
		PRIMARY KEY (`id_world`)
		) ENGINE = INNODB;";
		mysql_query($this->_Query) or die (mysql_error());
		$this->_Query="
		CREATE TABLE $family (
		`id_family` INT NOT NULL AUTO_INCREMENT,
		`id_world` INT NOT NULL,
		`name` VARCHAR( 50 ) NOT NULL,
		`img_url` VARCHAR( 50 ) NOT NULL,
		`max_monster` INT NOT NULL,
		PRIMARY KEY (`id_family`)
		) ENGINE = INNODB;";
		mysql_query($this->_Query) or die (mysql_error());
		$this->_Query="
		CREATE TABLE $monster (
		`id_monster` INT NOT NULL AUTO_INCREMENT,
		`id_family` INT NOT NULL,
		`taille` INT NOT NULL,
		`poids` INT NOT NULL,
		`force` INT NOT NULL,
		`agilite` INT NOT NULL,
		`intelligence` INT NOT NULL,
		`name` VARCHAR( 50 ) NOT NULL,
		`img_url` VARCHAR( 50 ) NOT NULL,
		PRIMARY KEY (`id_monster`)
		) ENGINE = INNODB;
		";
		mysql_query($this->_Query) or die (mysql_error());

		
	}
	
	public function __destruct(){
		if($this->_Link){mysql_close($this->_Link);}
	}
}

?>