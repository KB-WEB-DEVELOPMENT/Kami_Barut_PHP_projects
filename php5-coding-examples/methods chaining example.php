<?php

Class xyz	{

	function xyz_function()	{
	
		return 1;
	}
}

Class test	{

	function test_function()	{

	$a = new xyz();

	return $a;
	
	}
}

$newstuf = new test();

echo $newstuff->test_function()->xyz_function(); // output: 1

?>
