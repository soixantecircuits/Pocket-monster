<?php
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
			return "my name is ".$this->_name." </br>I'm ".$this->_age."</br> I belong to the ".$this->_family." family <br/>My eyes are ".$this->_eyes.", my hair color is ".$this->_hair." and my skin color is ".$this->_skin;
		}
	}

?>