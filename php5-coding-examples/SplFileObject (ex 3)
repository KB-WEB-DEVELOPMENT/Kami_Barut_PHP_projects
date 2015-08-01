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

if (count($data) < 10) throw new UnderflowException();

maybe more precessing code

foreach($dataas &$v)  {

	if (count($v) == 2) {

		throw new DomainException();
	}
}
	
$v= $v[0] * $v[1]; };

*/

?>
