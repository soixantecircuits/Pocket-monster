<?php
	require_once("world.php");
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
		
		public function is_empty(MyDB $dataB){
			$arr = $this->getAll($dataB);
			return empty($arr);
		}
		
		//this function add a world to the table 
		public function add(MyDB $dataB, World $w){
			//testing the database and the world 
			if(!empty($dataB)&&!empty($w)){
				//in the case we ca
				if(!$this->exists($dataB, $w->_name)){
					$query = 'INSERT INTO world (name,pic) VALUES ("'.$w->_name.'","'.$w->_pic.'")';
					$dataB->exec($query);
				}
			//if it doesn't exist 
			}else
				exit("Database don't exist or world don't exists<br/>");
		}
		
		//deleting
		public function delete(MyDB $dataB,$w_name){
			if(!empty($dataB) && !empty($w_name) && is_string($w_name))
				if($this->exists($dataB,$w_name))
					$dataB->exec('DELETE FROM world WHERE name = "'.$w_name.'"');
		}
		
		//extract the information with the name
		public function get(MyDB $dataB, $name){
			if(!empty($dataB) && is_string($name) && !empty($name)){
				$q = $dataB->query('SELECT * FROM world WHERE name = "'.$name.'"');
				$result = array();
				$i=0;
				//extracting results of the request
	      		while($data = $q->fetchArray(SQLITE3_NUM)){
	      			$result[$i] = new World($data[0],$data[1]);
	      			$i++;
	      		}
	     		
	     		return $result;
			}
			exit("Database don't exists <br/>");
		}
		
		//give all the worlds in the worlds table
		public function getAll(MyDB $dataB){
			if(!empty($dataB)){
				//executing the request
				$sqlRes = $dataB->query("SELECT name FROM world");
				$result = array();
				$i=0;
				//extracting all results
				while($data = $sqlRes->fetchArray(SQLITE3_NUM)){
	   				$result[$i] = $data[0];
	   				$i++;
				}
	   			
	   			return $result;
	      		
			}
			exit("Database don't exists <br/>");
		}
		
		//return true if the world $w exists on the database, and false if it's not
		public function exists(MyDB $dataB, $w_name){
			if(!empty($w_name) && is_string($w_name) && !empty($dataB)){
				$query = 'SELECT COUNT(*) FROM world WHERE name = "'.$w_name.'"';
				$sqlRes = $dataB->query($query);
				$result = $sqlRes->fetchArray(SQLITE3_NUM);
				return $result[0]!=0;
			}
			return false;
		}
	}
	


?>