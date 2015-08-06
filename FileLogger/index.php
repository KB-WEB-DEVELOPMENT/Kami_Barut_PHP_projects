<?php

	require_once('Log.class.php');

	$log = new Log();
	$log->Write('test.txt', 'My name is Kami');

	echo $log->read('test.txt');

	// output: 'My name is Kami in test.txt

?>
