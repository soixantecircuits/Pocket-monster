<?php
	//we going to creat the monster's class with methods and arguments
	class Monster{
		public $_name;
		public $_age;
		public $_pic;
		public $_family;
		public $_eyes;
		public $_hair;
		public $_skin;
		
		//constructor taking all the arguments
		public function __construct ($name, $age, $pic, $family, $eyes, $hair, $skin){
			$this->_name = $name;
			$this->_age = $age;
			$this->_pic = $pic;
			$this->_family = $family;
			$this->_eyes = $eyes;
			$this->_hair = $hair;
			$this->_skin = $skin;
		}
		
		//the monster can introduce himself
		public function presentation(){
			return "my name is ".$this->_name." ".$this->_name." </br>I'm ".$this->_age."</br>My eyes are ".$this->_eyes.", my hair color is ".$this->_hair." and my skin color is ".$this->_skin;
		}
	}
	
	
	class Family{
		public $_name;
		public $_world;
		public $_pic;
		private $_max;
		
		//constructor
		public function __construct($name, $world, $pic, $max){
			$this->_name = $name;
			$this->_world = $world;
			$this->_pic = $pic;
			//if the maximum number is 0 we put 1
			if($max == 0){
				$this->_max = $max+1;
			}
			else{
				$this->_max = $max;
			}
			
		}
		
		//function returning a string
		public function presentation(){
			return $this->_world." World <br/>".$this->_name." Family<br/>";
		}
	}
	
	class World{
		public $_name;
		public $_pic;
		
		//constructor
		public function __construct($name, $pic){
			$this->_name = $name;
			$this->_pic = $pic;
		}
		
		public function presentation(){
			return $this->_name." World <br/>";
		}
	}
	
?>