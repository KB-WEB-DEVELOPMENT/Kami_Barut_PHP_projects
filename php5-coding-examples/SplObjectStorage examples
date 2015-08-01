<?php

$os = new SplObjectStorage();

$person = new stdClass();

$person->name = "Kami Barut";

$person->age = "41";

$os->attach($person); 

foreach ($os as $object)    {

    print_r($object);
    echo "<br/>"; // output: stdClass Object ( [name] => Kami Barut [age] => 41 ) 
}                                         

$person->name = "Adis Barut"; 

echo str_repeat("-",30)."<br/>"; 

foreach ($os as $object)    {
    print_r($object); // output: stdClass Object ( [name] => Adis Barut [age] => 41 )  
    echo "<br/>";
}

$person2 = new stdClass();

$person2->name = "Raya Barut";

$person2->age = "71";

$os->attach($person2);

echo str_repeat("-",30)."<br/>";

foreach ($os as $object)    {
    print_r($object); // output: stdClass Object ( [name] => Adis Barut [age] => 41 )  stdClass Object ( [name] => Raya Barut [age] => 71 )
    echo "<br/>";
}

echo "<br/>".$os->contains($person); // output: 1 (true)

$os->rewind();  

echo "<br/>".$os->current()->name; // output: Adis Barut , i.e: pointer to previous, in this case first StdClass Object 

$os->detach($person);  

echo "<br/>".str_repeat("-",30)."<br/>";

foreach ($os as $object)    {
    print_r($object); // output: stdClass Object ( [name] => Raya Barut [age] => 71 ) 
    echo "<br/>";
}

?>
