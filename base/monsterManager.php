<?php
	require_once ('monster.php');
/*
this file allow to manage the database that we going to creat on the system memory
so we going to creat three class that can hundle add, delete, get informations from tables of world, Family and Monsters
*/

	//this Class Manage the monster table
	class MonsterManager {
		//creat monster's table if not exists
		public function __construct(MyDB $dataB){
			if(!empty($dataB)){
				$dataB->exec('PRAGMA foreign_keys = ON;');
				$query = "CREATE TABLE IF NOT EXISTS monster(
							name VARCHAR(20) NOT NULL PRIMARY KEY,
							age INTEGER,
							pic TEXT NOT NULL,
							family_name VARCHAR(20) NOT NULL,
							eyes TEXT,
							hair TEXT,
							skin TEXT,
							CONSTRAINT FK_monster_family FOREIGN KEY (family_name) REFERENCES family(name) ON DELETE CASCADE ON UPDATE CASCADE)";
				$result = $dataB->exec($query);
				if(!$result)
					exit("Monster Table not Created </br>");
			}else
				exit("Database don't exist <br/>");
		}
		
		//adding
		public function add(MyDB $dataB, Monster $m){
			if(!empty($dataB) && !empty($m->_name)){
				if(!$this->exists($dataB, $m->_name)){
					$query = 'INSERT INTO monster VALUES ("'.$m->_name.'","'.$m->_age.'","'.$m->_pic.'","'.$m->_family.'","'.$m->_eyes.'","'.$m->_hair.'","'.$m->_skin.'")';
					$dataB->exec($query);
				}
			}else
				exit("Database don't exist or Monster don't exists<br/>");
		}
		
		
		//deleting
		public function delete(MyDB $dataB, $m_name){
			if(!empty($dataB) && is_string($m_name)){
				if($this->exists($dataB, $m_name)){
					$dataB->exec('DELETE FROM monster WHERE name="'.$m_name.'"');
				}
			}else{
				exit ("Database don\'t exists or invalide parameter");
			}
					
		}
		
		//getting
		public function get(MyDB $dataB, $name){
			if(!empty($dataB) && !empty($name) && is_string($name)){
				$sqlRes = $dataB->query('SELECT * FROM monster WHERE name = "'.$name.'"');
				$result = array();
				$i=0;
	      		while($data = $sqlRes->fetchArray(SQLITE3_NUM)){
	      			$result[$i] = new Monster($data[0],$data[1],$data[2],$data[3], $data[4], $data[5], $data[6]);
	      			$i++;
	      		}
	      		return $result;
			}
			else if(empty($name) || !is_string($name)){
			 exit("Invalide parametre in fonction MonsterManager::get()<br/>");
			}
			exit("Database don't exists in fonction MonsterManager::get() <br/>");
		}
		
		//getting monsters by family
		public function getByFamily(MyDB $dataB, $name_family){
			if(!empty($dataB) && !empty($name_family) && is_string($name_family)){
				$sqlRes = $dataB->query('SELECT name FROM monster WHERE family_name="'.$name_family.'"');	
				$result = array();
				$i=0;
	      		while($data = $sqlRes->fetchArray(SQLITE3_NUM)){
	      			$result[$i] = $data[0];
	      			$i++;
	      		}
	   			return $result;
			}
			exit("Database don't exists <br/>");
		}
		
		
		//test if the monster exists on the table
		public function exists(MyDB $dataB,  $m_name){
			if(!empty($dataB) && !empty($m_name) && is_string($m_name)){
				$query = 'SELECT COUNT(*) FROM monster WHERE name = "'.$m_name.'"';
				$sqlRes = $dataB->query($query);
				$result = $sqlRes->fetchArray(SQLITE3_NUM);
				return $result[0]!=0;
			}
			return false;
		}
	}
?>