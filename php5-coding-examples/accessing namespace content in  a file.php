<?php
// lib1.php
namespace App\Lib1;

const MYCONST = 'App\Lib1\MYCONST';

function MyFunction() {
	return __FUNCTION__;
}

class MyClass {
	static function WhoAmI() {
		return __METHOD__;
	}
}

echo MYCONST . "<br/>";                        //    App\Lib1\MYCONST   
var_dump(MYCONST). "<br/>";                    //    string(16) "App\Lib1\MYCONST" 

echo MyFunction() . "<br/>";                   //   App\Lib1\MyFunction
var_dump(MyFunction()). "<br/>";               //   string(19) "App\Lib1\MyFunction"

echo "<br/>" . MyClass::WhoAmI() . "<br/>";   //    App\Lib1\MyClass::WhoAmI
var_dump(MyClass::WhoAmI()). "<br/>";         //    string(24) "App\Lib1\MyClass::WhoAmI"

?>

<?php
//  myapp.php

header('Content-type: text/plain');
require_once('lib1.php');  // calling lib1.php

echo \App\Lib1\MYCONST . "\n";
echo \App\Lib1\MyFunction() . "\n";
echo \App\Lib1\MyClass::WhoAmI() . "\n";

?>
