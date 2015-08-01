<?php
	// application library 1
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
?>

<?php
	// application library 2
	namespace App\Lib2;

	const MYCONST = 'App\Lib2\MYCONST';

	function MyFunction() {
		return __FUNCTION__;
	}

	class MyClass {
		static function WhoAmI() {
			return __METHOD__;
		}
	}
		
?>


<?php
	namespace App\Lib1;    

	require_once('lib1.php');  // const, functions and classes here will be called
	require_once('lib2.php'); //  const, functions and classes here will not be called

	header('Content-type: text/plain');
	echo MYCONST . "\n";                   //  App\Lib1\MYCONST 
	echo MyFunction() . "\n";			   //  App\Lib1\MyFunction
	echo MyClass::WhoAmI() . "\n";         //  App\Lib1\MyClass::WhoAmI
?>

<?php
	use App\Lib2;

	require_once('lib1.php');
	require_once('lib2.php');

	header('Content-type: text/plain');
	echo Lib2\MYCONST . "\n";			//  App\Lib1\MYCONST   ATTENTION !
	echo Lib2\MyFunction() . "\n";		//  App\Lib2\MyFunction
	echo Lib2\MyClass::WhoAmI() . "\n";	//  App\Lib2\MyClass::WhoAmI 
?>

<?php
	use App\Lib1 as L;
	use App\Lib2\MyClass as Obj;

	header('Content-type: text/plain');
	require_once('lib1.php');
	require_once('lib2.php');

	echo L\MYCONST . "\n";					// App\Lib1\MYCONST
	echo L\MyFunction() . "\n";			    // App\Lib1\MyFunction
	echo L\MyClass::WhoAmI() . "\n";		// App\Lib1\MyClass::WhoAmI
	echo Obj::WhoAmI() . "\n";              // App\Lib2\MyClass::WhoAmI
?>
