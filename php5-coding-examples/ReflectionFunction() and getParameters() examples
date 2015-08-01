<?php

function foo($a, $b, $c) { }

function bar(Exception $a, &$b, $c) { }

function baz(ReflectionFunction $a, $b = 1, $c = null) { }

function abc() { }// Create an instance of Reflection_Function with the parameter given from the command line.

$reflect1 = new ReflectionFunction("foo");

$reflect2 = new ReflectionFunction("bar");

$reflect3 = new ReflectionFunction("baz");

echo $reflect1 . "<br/>"; // Function [ function foo ] { @@ /home/cg/root/main.php 3 - 3 - Parameters [3] { Parameter #0 [ $a ] Parameter #1 [ $b ] Parameter #2 [ $c ] } } 

echo $reflect2 . "<br/>"; // Function [ function bar ] { @@ /home/cg/root/main.php 5 - 5 - Parameters [3] { Parameter #0 [ Exception $a ] Parameter #1 [ &$b ] Parameter #2 [ $c ] } } 

echo $reflect3 . "<br/>"; // Function [ function abc ] { @@ /home/cg/root/main.php 9 - 9 } 


foreach ($reflect1->getParameters() as $i => $param) {

        printf ("<br/>-- Parameter #%d: %s {  <br/>". 
        
                                         " Class: %s<br/>".
                                         " Allows NULL: %s<br/>".
                                         " Passed to by reference ? %s<br/>".
                                         " Is optional ? %s<br/>".
                                    "}<br/>",  $i, $param->getName(), var_export($param->getClass(), 1), var_export($param->allowsNull(), 1), var_export($param->isPassedByReference(), 1),
        
                  $param->isOptional() ? 'yes' : 'no'
              );
}

/* output $reflect1

-- Parameter #0: a { 
Class: NULL
Allows NULL: true
Passed to by reference ? false
Is optional ? no
}

-- Parameter #1: b { 
Class: NULL
Allows NULL: true
Passed to by reference ? false
Is optional ? no
}

-- Parameter #2: c { 
Class: NULL
Allows NULL: true
Passed to by reference ? false
Is optional ? no
}

*/

/* output $reflect2

-- Parameter #0: a { 
Class: ReflectionClass::__set_state(array( 'name' => 'Exception', ))
Allows NULL: false
Passed to by reference ? false
Is optional ? no
}

-- Parameter #1: b { 
Class: NULL
Allows NULL: true
Passed to by reference ? true
Is optional ? no
}

-- Parameter #2: c { 
Class: NULL
Allows NULL: true
Passed to by reference ? false
Is optional ? no
}

*/

/* output $reflect3

-- Parameter #0: a { 
Class: ReflectionClass::__set_state(array( 'name' => 'ReflectionFunction', ))
Allows NULL: false
Passed to by reference ? false
Is optional ? no
}

-- Parameter #1: b { 
Class: NULL
Allows NULL: true
Passed to by reference ? false
Is optional ? yes
}

-- Parameter #2: c { 
Class: NULL
Allows NULL: true
Passed to by reference ? false
Is optional ? yes
}

*/

?>
