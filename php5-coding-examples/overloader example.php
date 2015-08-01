<?php

class Overloader    {

    function __call($method, $arguments)    {
        echo "You called a method named {$method} with the following
        arguments <br/>";
        print_r($arguments);
        echo "<br/>";
    }
}

$ol = new Overloader();

$ol->access(2,3,4); // output : You called a method named access with the following arguments Array ( [0] => 2 [1] => 3 [2] => 4 )  

$ol->notAnyMethod("boo"); //output : You called a method named notAnyMethod with the following arguments Array ( [0] => boo )

?>
