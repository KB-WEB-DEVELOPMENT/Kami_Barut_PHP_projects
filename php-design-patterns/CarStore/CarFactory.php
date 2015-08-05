<?php

	class Factory {

		public function buyCar($brand) 	{
			

				switch($brand)	{
					
					case "jeep":
						$this->car = new Jeep();
						break;
						
					case "dodge":
						$this->car = new Dodge();
						break;
						
					case "ford":
						$this->car = new Ford();
						break;
						
					default:
					    echo "No car of this type exists.";
				}
			
			
		  }

    }
?>
