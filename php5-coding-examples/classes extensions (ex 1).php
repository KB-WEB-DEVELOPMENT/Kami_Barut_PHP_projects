<?php

	class Base {

		const greeting ="Hello<br/>";
	}

	class Derived extends Base {

		const greeting ="Hello World<br/>";
		
		static function func() {

			echo parent::greeting;
		}
		
	}

	echo Base::greeting; // output: Hello
	echo Derived::greeting; // output: Hello World
	Derived::func(); // output: Hello

?>
