<?php

	class CarStore	{
		
		public function __construct() 	{
				
			$this->CarFactory = new CarFactory();
		}	

		public function buyCar($brand) 	{
				
			$this->CarFactory->create($brand);
			
			$this->fillGas();
			$this->washCar();
			$this->payMoney();
		}
		
		public function fillGas() 	{
				
			echo "You filled up the gas tank.<br/>";
		}
		
		public function washCar() 	{
				
			echo "You washed the car.<br/>";
		}
		
		public function payMoney() 	{
				
			echo "You paid money.<br/>";
		}
	
	}

?>
