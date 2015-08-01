<?php

class Foo	{

	public $prop;
	
	function Func ($name) {
		echo"Hello $name";
	}
}

ReflectionClass::export('Foo'); 

//output: Class [ class Foo ] { @@ /home/cg/root/main.php 3-10 - Constants [0] { } - Static properties [0] { } - Static methods [0] { } - Properties [1] { Property [ public $prop ] } - Methods [1] { Method [ public method Func ] { @@ /home/cg/root/main.php 7 - 9 - Parameters [1] { Parameter #0 [ $name ] } } } }

ReflectionObject::export(new Foo);

// output: Object of class [ class Foo ] { @@ /home/cg/root/main.php 3-10 - Constants [0] { } - Static properties [0] { } - Static methods [0] { } - Properties [1] { Property [ public $prop ] } - Dynamic properties [0] { } - Methods [1] { Method [ public method Func ] { @@ /home/cg/root/main.php 7 - 9 - Parameters [1] { Parameter #0 [ $name ] } } } }

ReflectionMethod::export('Foo','func');

// output:  Method [ public method Func ] { @@ /home/cg/root/main.php 7 - 9 - Parameters [1] { Parameter #0 [ $name ] } }

ReflectionProperty::export('Foo','prop');

//output: Property [ public $prop ]

ReflectionExtension::export('standard');

//output: Extension [ extension #15 standard version 5.5.18 ] ...

?>
