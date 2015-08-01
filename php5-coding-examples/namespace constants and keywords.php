<?php
	// __NAMESPACE__ constant
	namespace App\Lib1;
	echo __NAMESPACE__; // outputs: App\Lib1
?>

<?php
// __NAMESPACE__ constant
namespace App\Lib1;

class MyClass {
	public function WhoAmI() {
		return __METHOD__;
	}
}

$c = __NAMESPACE__ . '\\MyClass';  

$m = new $c;

echo $m->WhoAmI() . '<br/>'; // output: App\Lib1\MyClass::WhoAmI
var_dump($m->WhoAmI());      // output: string(24) "App\Lib1\MyClass::WhoAmI"

?>

<?php
// namespace keyword
namespace App\Lib1;

class MyClass {
	public function WhoAmI() {
		return __METHOD__;
	}
}

$m = new namespace\MyClass;

echo $m->WhoAmI() . '<br/>'; // output: App\Lib1\MyClass::WhoAmI
var_dump($m->WhoAmI());      // output: string(24) "App\Lib1\MyClass::WhoAmI"

?>
