<?php

/*
this file allow to manage the database that we going to creat on the system memory
so we going to creat three class that can hundle add, delete, get informations from tables of world, Family and Monsters
*/

	if(!class_exists('SQLite3'))
		die("SQLite3 Not Supported");
	
	//this class creat DataBase on Memory
	class MyDB extends SQLite3{
		function __construct(){
			$this->open(':memory:');
		}
	}
	
/*============================================================================================*/
	
	//this Class Manage the World table
	class WorldManager {
		
		public function __construct(MyDB $dataB){
			$query = "CREATE TABLE IF NOT EXISTS world ( 
					name VARCHAR(20) NOT NULL PRIMARY KEY,
					pic TEXT NOT NULL)";
			$result = $dataB->exec($query);
			if(!$result)
				exit("Table not Created <br/>");		
		}
		
		//this function add a world to the table 
		public function add(MyDB $dataB, World $w){
			if(!empty($dataB)&&!empty($w)){
				$query = 'INSERT INTO world (name,pic) VALUES ("'.$w->_name.'","'.$w->_pic.'")';
				$dataB->query($query);
			}else
				exit("Database don't exist or world don't exists<br/>");
		}
		
		//deleting
		public function delete(MyDB $dataB,World $w){
			$dataB->exec('DELETE FROM world WHERE name = "'.$w->_name.'"');
		}
		
		//extract the information with the name
		public function get(MyDB $dataB,$name){
			if(!empty($dataB)){
				$q = $dataB->query('SELECT * FROM world WHERE name = "'.$name.'"');
	      		$donnees = $q->fetchArray(PDO::FETCH_ASSOC);
	      		if(!empty($donnees))
	      			return new World($donnees[0],$donnees[1]);
	      		else
	      			return NULL;
			}
			exit("Database don't exists <br/>");
		}
		
		//return true if the world $w exists on the database, and false if it's not
		public function exists(MyDB $dataB, World $w){
			if(!empty($w)){
				$query = 'SELECT COUNT(*) FROM world WHERE name = "'.$w->_name.'"';
				return (bool) $dataB->exec($query);
			}
			return false;
		}
	}
	
/*============================================================================================*/
	
	//Same thing for Family's and Monster's Management
	//this Class Manage the Family Table
	class FamilyManager {
		
		//creat Families table if not exists
		public function __construct(MyDB $dataB){
			if(!empty($dataB)){
				$query = "CREATE TABLE IF NOT EXISTS family(
								name VARCHAR(20) NOT NULL PRIMARY KEY,
								world TEXT NOT NULL,
								pic TEXT NOT NULL,
								max INTEGER NOT NULL,
								CONSTRAINT FK_family_world FOREIGN KEY (world) REFERENCES world(name)
								)";
				
				$dataB->exec($query);
				if(!$result)
					exit("Table not Created </br>");
			}else
				exit("Database don't exist <br/>");
		}
		
		public function add(MyDB $dataB, Family $fam){
			if(!empty($dataB)&&!empty($fam)){
				$query = 'INSERT INTO family VALUES ("'.$fam->_name.'","'.$fam->_world.'","'.$fam->_pic.'","'.$fam->_max.'")';
				$dataB->query($query);
			}else
				exit("Database don't exist or family don't exists<br/>");
		}
		
		public function delete(MyDB $dataB,Family $fam){
			if(!empty($dataB) && !empty($fam))
				$dataB->exec('DELETE FROM family WHERE name = "'.$fam->_name.'"');
		}
		
		public function get(MyDB $dataB,$name){
			if(!empty($dataB)){
				$q = $dataB->query('SELECT * FROM family WHERE name = "'.$name.'"');
	      		$donnees = $q->fetchArray(PDO::FETCH_ASSOC);
	      		if(!empty($donnees))
	      			return new World($donnees[0],$donnees[1],$donnees[2],$donnees[3]);
	      		else
	      			return NULL;
			}
			exit("Database don't exists <br/>");
		}
		
		public function exists(MyDB $dataB, Family $fam){
			if(!empty($dataB) && !empty($fam)){
				$query = 'SELECT COUNT(*) FROM family WHERE name = "'.$fam->_name.'"';
				return (bool) $dataB->exec($query);
			}
			return false;
		}
	}
	
/*============================================================================================*/

	//this Class Manage the monster table
	class MonsterManager {
		//creat monster's table if not exists
		public function __construct(MyDB $dataB){
			if(!empty($dataB)){
				$query = "CREATE TABLE IF NOT EXISTS monster (
							name VARCHAR(20) NOT NULL PRIMARY KEY,
							age INTEGER,
							pic TEXT,
							family TEXT NOT NULL,
							eyes TEXT ,
							hair TEXT,
							skin TEXT,
							CONSTRAINT FK_monster_family FOREIGN KEY (family) REFERENCES family(name)
							)";
				
				$result = $dataB->exec($query);
				if(!$result)
					exit("Table not Created </br>");
			}else
				exit("Database don't exist <br/>");
		}
		
		//adding
		public function add(MyDB $dataB, Monster $m){
			if(!empty($dataB)&&!empty($m)){
				$query = 'INSERT INTO monster VALUES ("'.$m->_name.'","'.$m->_age.'","'.$m->_pic.'","'.$m->_family.'","'.$m->_eyes.'","'.$m->_hair.'","'.$m->_skin.'")';
				$dataB->query($query);
			}else
				exit("Database don't exist or Monster don't exists<br/>");
		}
		
		//deleting
		public function delete(MyDB $dataB, Monster $m){
			if(!empty($dataB) && !empty($fam))
				$dataB->exec('DELETE FROM monster WHERE name = "'.$m->_name.'"');
		}
		
		//getting
		public function get(MyDB $dataB,$name){
			if(!empty($dataB)){
				$q = $dataB->query('SELECT * FROM monster WHERE name = "'.$name.'"');
	      		$donnees = $q->fetchArray(PDO::FETCH_ASSOC);
	      		if(!empty($donnees))
	      			return new World($donnees[0],$donnees[1],$donnees[2],$donnees[3], $donnees[4], $donnees[5], $donnees[6]);
	      		else
	      			return NULL;
			}
			exit("Database don't exists <br/>");
		}
		
		//test if the monster exists on the table
		public function exists(MyDB $dataB, Monster $m){
			if(!empty($dataB) && !empty($m)){
				$query = 'SELECT COUNT(*) FROM monster WHERE name = "'.$m->_name.'"';
				return (bool) $dataB->exec($query);
			}
			return false;
		}
	}
?>