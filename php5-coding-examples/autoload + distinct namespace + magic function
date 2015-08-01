<?php
//  file: \classes\App\Lib1\MyClass.php
namespace App\Lib1;

class MyClass {
	public function WhoAmI() {
		return __METHOD__;
	}
}

?>


<?php
use App\Lib1\MyClass as MC;

$obj = new MC();
echo $obj->WhoAmI();

// autoload function

function  _autoload($class) {

	//  *************   convert namespace to full file path - require_once($class) will load classes/App/Lib1/MyClass.php   *************************
	$class = 'classes\' . str_replace('\\', '/', $class) . '.php';
	require_once($class);  
	
}

?>
