<?php
    //class.factorial.php
    class Factorial     {

        private $result = 1;
        private $number;

        function __construct($number)  {
            $this->number = $number;
            for($i=2; $i<=$number; $i++) {
                $this->result*=$i;
            }
            echo "__construct() executed. <br/>";
        }

        function factorial($number)  {
            $this->number = $number;
            for($i=2; $i<=$number; $i++)  {
                $this->result*=$i;
            }
            echo "factorial() executed. <br/>";
        }

        public function showResult() {
         echo "Factorial of {$this->number} is {$this->result}. <br/>";
        }
    }
    
$number = new Factorial(6);  //output:  __construct() executed.
$number->showResult();		   //output: Factorial of 6 is 720.
$number->factorial(3);		   //output: factorial() executed. 


?
