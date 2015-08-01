<?php

//class.statictester.php

class StaticTester  {

    private static $id=0;

    function __construct()  {
        self::$id +=1;
    }

    public static function checkIdFromStaticMethod() {
        echo "Current Id From Static Method is ".self::$id."<br/>";
    }

    public function checkIdFromNonStaticMethod()    {
        echo "Current Id From Non Static Method is ".self::$id."<br/>";
    }
}

$st1 = new StaticTester();

StaticTester::checkIdFromStaticMethod(); // output: Current Id From Static Method is 1

$st2 = new StaticTester();

$st1->checkIdFromNonStaticMethod();  // output: Current Id From Non Static Method is 2

$st1->checkIdFromStaticMethod(); // output: Current Id From Static Method is 2

$st2->checkIdFromNonStaticMethod(); // output: Current Id From Non Static Method is 2

$st3 = new StaticTester();

StaticTester::checkIdFromStaticMethod(); // output: Current Id From Static Method is 3

// CONCLUSION: id increases by 1 only when a new instance of StaticTester is instantiated
?>
