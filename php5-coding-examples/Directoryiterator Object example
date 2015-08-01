<?php

	// use of DirectoryIterator Object;

	$path = "C:\Users\admin\Desktop\music";

	$directories = array();

	$files = array();

	$pathObj = new DirectoryIterator($path);

	echo "List of files in C:\Users\admin\Desktop\music directory<br/><br/>";

	foreach ($pathObj as $arr) {
	  
		if (!$arr->isDir()) echo $arr . "</br>";
		
	}

	/* Output

	List of files in C:\Users\admin\Desktop\music directory

	Concious Mix.mp3
	lebavar1.mp3
	lebavar2.mp3
	mrjl1.mp3
	mrjl2.mp3


	*/	
	
	
?>
