<?php
class Family{
		public $_name;
		public $_world;
		public $_pic;
		public $_max;
		
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
?>