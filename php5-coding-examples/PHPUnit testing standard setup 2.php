<?php

//testsuite.wordcount.php

require_once 'PHPUnit/TextUI/TestRunner.php';
require_once "PHPUnit/Framework/TestSuite.php";
require_once "class.WordCounter.php";

$suite = new PHPUnit_Framework_TestSuite();

$suite->addTestSuite("TestWordCount");

PHPUnit_TextUI_TestRunner::run($suite);

?>
