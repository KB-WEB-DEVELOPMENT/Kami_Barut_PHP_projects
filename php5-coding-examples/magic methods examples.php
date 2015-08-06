<?php

class test  {
    
	function __construct()
	{
		echo 1;
	}
	
	function __destruct()
	{
		echo 2;
	}
		
    function __get($name)
    {
        echo "__get executed with name $name ";
    }
    
    function __set($name , $value)
    {
        echo "__set executed with name $name , value $value";
    }
    
    function __call($name , $parameter)
    {
        $a = print_r($parameter , true); 
        echo "__call executed with name $name , parameter $a";
    }
    
    static function __callStatic($name , $parameter)
    {
        $a = print_r($parameter , true); 
        echo "__callStatic executed with name $name , parameter $a";
    }

    function __isset($name)
    {
        echo "__isset is called for $name";
    }
    
    function __unset($name)
    {
        echo "__unset is called for $name";
    }

}
	
$a = new test();

// output 1 

unset($a);

//output 2

$a = new test();

// output 1 

$a->abc = 3; // __set executed with name abc , value 3

$app = $a->pqr // __get executed with name pqr

$a->getMyName('Kami' , 'Barut-Wanayo', 'Munich'); // __call executed with name getMyName , parameter Array ( [0] => Kami [1] => Barut-Wanayo [2] => Munich )

test::xyz('Kami' , 'Barut-Wanayo' , 'Munich');  // __callStatic executed with name xyz , parameter Array ( [0] => Kami [1] => Barut-Wanayo [2] => Munich )

isset($a->x); // __isset is called for x
unset($a->c); // __unset is called for c 

?>
