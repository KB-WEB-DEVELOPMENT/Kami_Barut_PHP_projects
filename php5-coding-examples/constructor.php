<?php

class Base {

		protected function__construct() {
		
		}
	}

	class Derived extends Base {

		// constructor is still protected, Base construct is run. 
		static function getBase() {
			return new Base; // Factory pattern
		}

	}

	class Three extends Derived	{
	
		// constructor is still protected, Three construct is run and Base construct not run  
		public function__construct() {
	
		}
	}

?>
