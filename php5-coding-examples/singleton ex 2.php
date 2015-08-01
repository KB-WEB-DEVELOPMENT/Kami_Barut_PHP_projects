<?php

// singleton pattern

	class MySQLManager		{

		private static $instance;

		public function __construct()		{
			
			if (!self::$instance)	{               // this is the first crucial line. 
			
				self::$instance = $this;           // this is the second crucial line. $instance is instantiated as the object MySQLManager
				echo "New Instance<br/>" ;
				return self::$instance;
				
			}	else	{
			
					echo "Old Instance<br/>";
					return self::$instance;
				}
		}
			//keep other methods same
	}
	
$a   = 	new MySQLManager(); //output:  New Instance
$b   = 	new MySQLManager(); //output:  Old Instance
$c   = 	new MySQLManager(); //output:  Old Instance
$d   = 	new MySQLManager(); //output:  Old Instance
$e   = 	new MySQLManager(); //output:  Old Instance

?>
