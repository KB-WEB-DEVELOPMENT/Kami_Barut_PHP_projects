<?php

	class Test  {

		function __construct($x, $y= NULL) {  // $x and $y will be array keys
		
			$this->x= $x; 
			$this->y= $y;
		}

	}

	class Test2  {

		function __construct(int $a, int $b) {
		
			$this->x= $a;
			$this->y= $b;
		}

	}

	function new_object_array($cls, $args= NULL) {  
		
		var_dump(call_user_func_array(array(new ReflectionClass($cls),'newInstance'),$args));
	}
	
// note: $cls is a class name and $args are array values
		
// echo call_user_func_array(array(new ReflectionClass($cls),'newInstance'),$args);  output: PHP Catchable fatal error: Object of class Test could not be converted to string in /home/cg/root/main.php on line 25

	echo new_object_array('Test', array(1)) . '</br>';     // output: object(Test)#2 (2) { ["x"]=> int(1) ["y"]=> NULL } 

	echo new_object_array('Test', array('a',-2,-3));     // output: object(Test)#1 (2) { ["x"]=> string(1) "a" ["y"]=> int(-2) }

?>
