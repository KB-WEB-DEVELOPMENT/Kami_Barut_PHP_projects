<?php

	class Stringify	{
		
	
		public function __construct($str)	{

				$this->str = $str;
				$this->_AddText();
				$this->_AddDigits();
				$this->_AddObject(new Stuff);
				
				echo $this->str;
		}
		
		private function _AddText()   {
		
				$this->str .= ' | Adding Text';
		
		}
		
		private function _AddDigits()   {
		
				$this->str .= ' | Adding Digits: 500';
		
		}
		
		private function _AddObject(Stuff $stuff)   {
		
				$this->str .= $stuff->WriteCrap();
		
		}
		
	}

	class Stuff	{
				
		public function WriteCrap()   {
		
			return __CLASS__ . "writing stuff";
		}
		
	}

$x = new Stringify("Initial Input"); //output: Initial Input | Adding Text  | Adding Digits: 500 WriteCrap writing stuff

	
?>
