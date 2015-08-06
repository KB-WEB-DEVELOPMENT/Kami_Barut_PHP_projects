<?php

	class Character	{
		
		protected $hp = 100;;
		protected $dmg = 10;;
		protected $mp = 5;
		protected $armor = 2;
		
		
		protected function __construct()	{
		
		echo "The character was created.";
		
		}
		
		public function attack()	{
	
			echo "we attacked for " . $this->dmg;
		}
	}
?>
