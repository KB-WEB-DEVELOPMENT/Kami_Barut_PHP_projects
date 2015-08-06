<?php

require_once('interface/Parsed.interface.php');
require_once('interface/Compiled.interface.php');
require_once('interface/DotSyntax.interface.php');

require_once('PHP.class.php');
require_once('Java.class.php');
require_once('Python.class.php');

$php = new PHP(); // I am the function parsed in the PHP class coming from the Parsed interface
$java = new Java(); // Java was created during java times
$python = new Python(); // Python was created and the method UsesDotSyntax is called from within the Python class.
?>
