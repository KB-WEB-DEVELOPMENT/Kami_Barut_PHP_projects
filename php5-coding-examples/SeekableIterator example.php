<?php

// implementing SeekableIterator to iterate a specific sub-array

$arr = array(
    array("name"=>"John Abraham", "sex"=>"M", "age"=>27),
    array("name"=>"Lily Bernard", "sex"=>"F", "age"=>37),
    array("name"=>"Ayesha Siddika", "sex"=>"F", "age"=>26),
    array("name"=>"Afif", "sex"=>"M", "age"=>2)
    );
    
$persons = new ArrayObject($arr);

$it = $persons->getIterator();

$it->seek(3);

while ($it->valid())    {
    print_r($it->current());
    $it->next();
}

    
/* output:

Array ( [name] => Afif [sex] => M [age] => 2 )

*/

?>
