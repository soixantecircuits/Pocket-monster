<?php
	include 'monster.php';
?>
<?php

/*
this file allow to manage the database that we going to creat on the system memory
so we going to creat three class that can hundle add, delete, get informations from tables of world, Family and Monsters
*/

	if(!class_exists('SQLite3'))
		die("SQLite3 Not Supported");
	
	//this class creat DataBase on Memory
	class MyDB extends SQLite3{
		public $db;
		function __construct(){
			$this->open('mydb.db');
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
				exit("World Table not Created <br/>");		
		}
		
		//this function add a world to the table 
		public function add(MyDB $dataB, World $w){
			//testing the database and the world 
			if(!empty($dataB)&&!empty($w)){
				//in the case we ca
				if(!$this->exists($dataB,$w)){
					$query = 'INSERT INTO world (name,pic) VALUES ("'.$w->_name.'","'.$w->_pic.'")';
					$dataB->exec($query);
				}
			//if it doesn't exist 
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
				$result = array();
				//extracting results of the request
	      		while($data = $q->fetchArray(SQLITE3_NUM));
	      			$result[$data[0]] = new World($data[0],$data[1]);
	     		
	     		return $result;
			}
			exit("Database don't exists <br/>");
		}
		
		public function getAll(MyDB $dataB){
			if(!empty($dataB)){
				echo '<br/>?';
				var_dump($dataB);
				$sqlRes = $dataB->query("SELECT name FROM world"); //preparing the request
				$result = array();
								
				//extracting all results
				while($data = $sqlRes->fetchArray(SQLITE3_NUM))
	   				$result["$data[0]"] = new World($data[0],$data[1]);
	   			
	   			return $result;
	      		
			}
			exit("Database don't exists <br/>");
		}
		
		//return true if the world $w exists on the database, and false if it's not
		public function exists(MyDB $dataB, World $w){
			if(!empty($w)){
				$query = 'SELECT COUNT(*) FROM world WHERE name = "'.$w->_name.'"';
				$sqlRes = $dataB->query($query);
				$result = $sqlRes->numColumns();
				return $result==0;
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
				$dataB->exec('PRAGMA foreign_keys = ON;');
				$query = "CREATE TABLE IF NOT EXISTS family(
							name VARCHAR(20)NOT NULL PRIMARY KEY,
							world_name VARCHAR(20),
							pic TEXT NOT NULL,
							max INTEGER NOT NULL,
							CONSTRAINT FK_family_world FOREIGN KEY (world_name) REFERENCES world(name) ON DELETE CASCADE ON UPDATE CASCADE)";
				$result = $dataB->exec($query);
				
				if(!$result)
					exit("Family Table not Created </br>");
			}else
				exit("Database don't exist <br/>");
		}
		
		public function add(MyDB $dataB, Family $fam){
			if(!empty($dataB)&&!empty($fam)){
				if(!$this->exists($dataB,$fam)){
					$query = 'INSERT INTO family VALUES ("'.$fam->_name.'","'.$fam->_world.'","'.$fam->_pic.'","'.$fam->_max.'")';
					$dataB->exec($query);
				}
			}else
				exit("Database don't exist or family don't exists<br/>");
		}
		
		public function delete(MyDB $dataB,Family $fam){
			if(!empty($dataB) && !empty($fam))
				$dataB->exec('DELETE FROM family WHERE name = "'.$fam->_name.'"');
		}
		
		
		public function getByWorld (MyDB $data, $name_world){
			if(!empty($dataB)){
				$sqlRes = $dataB->query('SELECT name FROM family WHERE world_name = "'.$name_world.'"');
				$result = array();
				$i=0;
	      		while($data = $sqlRes->fetchArray(PDO::FETCH_NUM)){
	      			$result[i] = $data[0];
	      			$i++;
	      		}
	      		return $result;
			}
		}
		
		public function get(MyDB $dataB,$name){
			if(!empty($dataB)){
				$sqlRes = $dataB->query('SELECT * FROM family WHERE name = "'.$name.'"');
				$result = array();
	      		while($data = $sqlRes->fetchArray(PDO::FETCH_NUM))
	      			$result[$data[0]] = new Family($data[0],$data[1],$data[2],$data[3]);
	      		
	      		return $result;
			}
			exit("Database don't exists <br/>");
		}
		
		public function exists(MyDB $dataB, Family $fam){
			if(!empty($dataB) && !empty($fam)){
				$query = 'SELECT COUNT(*) FROM family WHERE name = "'.$fam->_name.'"';
				$sqlRes = $dataB->query($query);
				$result = $sqlRes->numColumns();
				return $result==0;
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
				$dataB->exec('PRAGMA foreign_keys = ON;');
				$query = "CREATE TABLE IF NOT EXISTS monster (
							name VARCHAR(20) NOT NULL PRIMARY KEY,
							age INTEGER,
							pic TEXT,
							family_name VARCHAR(20),
							eyes TEXT,
							hair TEXT,
							skin TEXT,
							CONSTRAINT FK_monster_family FOREIGN KEY (family_name) REFERENCES family(name) ON DELETE CASCADE ON UPDATE CASCADE)";
				
				$result = $dataB->exec($query);
				if(!$result)
					exit("Family Table not Created </br>");
			}else
				exit("Database don't exist <br/>");
		}
		
		//adding
		public function add(MyDB $dataB, Monster $m){
			if(!empty($dataB)&&!empty($m)){
				if(!$this->exists($dataB,$m)){
					$query = 'INSERT INTO monster VALUES ("'.$m->_name.'","'.$m->_age.'","'.$m->_pic.'","'.$m->_family.'","'.$m->_eyes.'","'.$m->_hair.'","'.$m->_skin.'")';
					$dataB->exec($query);
				}
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
				$sqlRes = $dataB->query('SELECT * FROM monster WHERE name = "'.$name.'"');
				$result = array();
	      		while($data = $sqlRes->fetchArray(PDO::FETCH_NUM)){
	      			$result[$data[0]] = new Monster($donnees[0],$donnees[1],$donnees[2],$donnees[3], $donnees[4], $donnees[5], $donnees[6]);
	      		}
	      		return $result;
			}
			exit("Database don't exists <br/>");
		}
		
		//getting monsters by family
		public function getByFamily(MyDB $dataB, $name_family){
			if(!empty($dataB)){
				$sqlRes = $dataB->query('SELECT name FROM monster WHERE family_name = "'.$name_family.'"');	
				$result = array();
				$i=0;
	      		while($data = $sqlRes->fetchArray(PDO::FETCH_NUM)){
	      			$result[i] = $data[0];
	      			$i++;
	      		}
	   			return $result;
			}
			exit("Database don't exists <br/>");
		}
		
		
		//test if the monster exists on the table
		public function exists(MyDB $dataB, Monster $m){
			if(!empty($dataB) && !empty($m)){
				$query = 'SELECT COUNT(*) FROM monster WHERE name = "'.$m->_name.'"';
				$sqlRes = $dataB->query($query);
				$result = $sqlRes->numColumns();
				return $result==0;
			}
			return false;
		}
	}
?>