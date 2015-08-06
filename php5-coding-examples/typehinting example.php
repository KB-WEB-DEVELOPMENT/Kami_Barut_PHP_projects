<?php

	class Test	{
		

		public function __construct()	{
			
		
		}
		
		public function Write()	{
			
			echo "I am writing from the Test class";
		}
	
	}

	class Foo	{
		
		$newObject;
		
		public function __construct(Test $a)	{
			
			$this->newObject = $a;
			
			$this->newObject->Write(); 
		}
		
		
	
	}

new Foo(new Test); // I am writing from the Test class
	
?>
