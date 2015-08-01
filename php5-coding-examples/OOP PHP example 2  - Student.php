<?php

//class.student.php
class Student   {

    private $properties = array();

    function __get($property)   {
        return $this->properties[$property];
    }

    function __set($property, $value)   {
        $this->properties[$property]="AutoSet {$property} as: ".$value;
    }
}

$student = new Student();
$student->car="BMW";
$student->player="Ronaldo";

echo $student->car . "<br/>"; // BMW
echo $student->player;  // Ronaldo


    
?>
