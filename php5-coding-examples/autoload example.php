<?php

// __autoload & require_once
// In each script : require_once('<path>/autoload.inc')
// Use INI option: auto_prepend_file=<path>/autoload.inc

function __autoload($class_name)	{

	require_once(dirname(__FILE__) . '/' . $class_name. '.p5c');
	}

?>
