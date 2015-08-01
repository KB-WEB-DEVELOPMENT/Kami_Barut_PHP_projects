<?php
    namespace MyProject; // This line must be the first statement in your file.
     
    const STATUS = 1;
    class User { /* ... */ }
    function create_user() { /* ... */  }

$oUser = new \MyProject\User();

var_dump(\MyProject\STATUS); //output: int(1)
var_dump(\MyProject\create_user()); // output: NULL
var_dump($oUser); // output: object(MyProject\User)#1 (0) { }
 
?>
