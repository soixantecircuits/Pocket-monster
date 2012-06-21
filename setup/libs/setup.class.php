<?php
class Setup{
	
	public	function __construct(){
		
	}
	
	public function checkDb($host,$user,$psw,$bdd){
		if($connexion = mysql_connect($host,$user,$psw)){
			if($selectDb = mysql_select_db($bdd)){
				echo 'Ok';
			} else {
				echo 'la base de donnée n\'existe pas';
			}
		} else {
			echo 'Impossible de se connecter à la base de donnée';
		}
	}
	
	public function createConf($host,$user,$psw,$bdd,$table){
		
	}
		
	public function createBdd($host,$user,$psw,$bdd,$table){
		
	}
}

?>