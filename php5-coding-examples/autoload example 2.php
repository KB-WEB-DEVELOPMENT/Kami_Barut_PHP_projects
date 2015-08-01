<?php
	$obj1 = new MyClass1(); // classes/MyClass1.php is auto-loaded
	$obj2 = new MyClass2(); // classes/MyClass2.php is auto-loaded

	// autoload function
	function __autoload($class_name) {
		require_once("classes/$class_name.php");
	}
?>
