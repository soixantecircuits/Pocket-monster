<?php

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