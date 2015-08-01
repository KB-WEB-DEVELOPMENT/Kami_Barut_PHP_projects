<?php

	class Object	{

		function __construct()	{
			throw new Exception;
		}
	}

	try {
		$o = new Object;
	}

	catch (Exception $e) {
		echo"Object could not be instantiated\n";

	}
	
// output :  Object could not be instantiated	
?>
