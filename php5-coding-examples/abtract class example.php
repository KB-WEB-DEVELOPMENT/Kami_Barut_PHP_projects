<?php

	abstract class Animal {	// abstract class - also parent class of Dog Class
	  
	  function greeting() { 
	  
		$sound = $this->sound();  
		return strtoupper($sound); 
	  } 
	  
	  abstract function sound(); // abstract method 

	  } 
	 
	class Dog extends Animal {  // child class implements abstract class - mandatory implementation of all abstract methods and properties
	  
	  function sound() {           
		return "i am a dog !"; 
	  } 

	} 
	 
	$dog = new Dog(); 

	echo $dog->greeting();  // output:  I AM A DOG


?>
