<?php

// clone creates a new object type

class Object {}

$obj=new Object();

$ref =$obj;

$dup =clone $obj;


var_dump($obj); // object(Object)#1 (0) { }
var_dump($ref); // object(Object)#1 (0) { }
var_dump($dup); // object(Object)#2 (0) { }

?>
