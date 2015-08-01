<?php
 namespace MyProject;
 
 $sString="Kami Barut";
 
    function strlen() { echo "Hello "; }
     
    $a = \strlen($sString); //output: Hello 10
     
    $b = strlen($sString); // nothing accessed
     
    echo $a . "<br/>";
    echo $b;
?>
