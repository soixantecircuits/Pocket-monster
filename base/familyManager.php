<?php
	require_once ('family.php');

	//Same thing for Family's and Monster's Management
	//this Class Manage the Family Table
	class FamilyManager {
		//creat Families table if not exists
		public function __construct(MyDB $dataB){
			if(!empty($dataB)){
				$dataB->exec('PRAGMA foreign_keys = ON;');
				$query = "CREATE TABLE IF NOT EXISTS family(
							name VARCHAR(20)NOT NULL PRIMARY KEY,
							world_name VARCHAR(20) NOT NULL,
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
			if(!empty($dataB) && !empty($fam)){
				if(!$this->exists($dataB, $fam->_name)){
					$query = 'INSERT INTO family VALUES ("'.$fam->_name.'","'.$fam->_world.'","'.$fam->_pic.'","'.$fam->_max.'")';
					$dataB->exec($query);
				}
			}else
				exit("Database don't exist or family don't exists<br/>");
		}
		
		public function delete(MyDB $dataB, $fam_name){
			if(!empty($dataB) && !empty($fam_name) && is_string($fam_name)){
				if($this->exists($dataB, $fam_name))
					$dataB->exec('DELETE FROM family WHERE name = "'.$fam_name.'"');
			}else{
				exit ("Database don\'t exists or invalide parameter");
			}
		}
		
		
		public function getAll(MyDB $dataB){
			if(!empty($dataB)){
				//executing the request
				$sqlRes = $dataB->query("SELECT name FROM family");
				$result = array();
				$i++;
				//extracting all results
				while($data = $sqlRes->fetchArray(SQLITE3_NUM)){
	   				$result[$i] = $data[0];
	   				$i++;
				}
	   			
	   			return $result;
	      		
			}
			exit("Database don't exists <br/>");
		}
		
		
		public function getByWorld (MyDB $dataB, $name_world){
			if(!empty($dataB) && !empty($name_world) && is_string($name_world)){
			
				$sqlRes = $dataB->query('SELECT name FROM family WHERE world_name = "'.$name_world.'"');
				$result = array();
				$i=0;
	      		while($data = $sqlRes->fetchArray()){
	      			$result[i] = $data[0];
	      			$i++;
	      		}
	      		return $result;
			}
		}
		
		public function get(MyDB $dataB,$name){
			if(!empty($dataB) && !empty($name) && is_string($name)){
				$sqlRes = $dataB->query('SELECT * FROM family WHERE name = "'.$name.'"');
				$result = array();
	      		while($data = $sqlRes->fetchArray(SQLITE3_NUM))
	      			$result[$data[0]] = new Family($data[0],$data[1],$data[2],$data[3]);
	      		
	      		return $result;
			}
				exit("Argument problem <br/>");
		}
		
		public function exists(MyDB $dataB, $fam_name){
			if(!empty($dataB) && !empty($fam_name) && is_string($fam_name)){
				$query = 'SELECT COUNT(*) FROM family WHERE name="'.$fam_name.'"';
				$sqlRes = $dataB->query($query);
				$result = $sqlRes->fetchArray(SQLITE3_NUM);
				return $result[0]!=0;
			}
			return false;
		}
	}
?>
