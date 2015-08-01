<?php

// NoRewindIterator -> can only read the collection once

    $arr = array(
    array("name"=>"John Abraham", "sex"=>"M", "age"=>27),
    array("name"=>"Lily Bernard", "sex"=>"F", "age"=>37),
    array("name"=>"Ayesha Siddika", "sex"=>"F", "age"=>26),
    array("name"=>"Afif", "sex"=>"M", "age"=>2)
    );
    
    $persons = new ArrayObject($arr);
    
    $LI = new NoRewindIterator($persons->getIterator());
    
    foreach ($LI as $person) {
        echo $person['name']."<br/>";
        //$LI->rewind();
    }

    foreach ($LI as $person) {
        echo $person['name']."<br/>";
        $LI->rewind();
    }
	
/* output:

John Abraham
Lily Bernard
Ayesha Siddika
Afif

*/
	
?>
