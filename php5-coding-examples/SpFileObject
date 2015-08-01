<?php

// reading a formatted file line by line

$fo= new SplFileObject($file);

$fo->setFlags(SplFileObject::DROP_NEWLINE);

$data = array();

foreach ($fo as $l) {
    
	if (!preg_match('/\d,\d/', $l)) {
		
       throw new UnexpectedValueException(); 
    }
    
    $data[] =$l; 
}

/* CHECK DATA

// Checks after the file was read entirely

if (count($data) < 10)throw new UnderflowException();

if (count($data) > 99)throw new OverflowException();

if (count($data) < 10 || count($data) > 99) throw new OutOfBoundsException();

*/

?>
