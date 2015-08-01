<?php

// accessing specfic values or keys of subarrays within multidimensional arrays with LimitIterator Object and ArrayObject

    $arr = array(
                  array("name"=>"John Abraham", "sex"=>"M", "age"=>27),
                  array("name"=>"Lily Bernard", "sex"=>"F", "age"=>37),
                  array("name"=>"Ayesha Siddika", "sex"=>"F", "age"=>26),
                  array("name"=>"Afif", "sex"=>"M", "age"=>2)
           );
            
    $persons = new ArrayObject($arr);
    
    $LI = new LimitIterator($persons->getIterator(),1,2);
    
    foreach ($LI as $person) {
    
        echo "NAME: " . $person['name'] .  " " . "SEX: " . $person['sex'] . " " . "AGE: " . $person['age'] ."<br/><br/>";
    }
    
/* output:

NAME: Lily Bernard SEX: F AGE: 37

NAME: Ayesha Siddika SEX: F AGE: 26

*/

?>
