<?php

 // NameCommandee.class.php 
  class NameCommandee {

    private $name;

    function __construct($name_in) {
      
	  $this->setName($name_in);
    }

    function getName() {return $this->name;}
	
	function setName($name_in) {$this->name = $name_in;}

    function setUpperCase() {
	
      $this->setName(strtoupper($this->getName()));

    }

    function setLowerCase() {
	
		$this->setName(strtolower($this->getName()));
    }


  }

 // NameCommand.class.php 
  include_once('NameCommandee.class.php');

  abstract class NameCommand {

		protected $nameCommandee;

		function __construct($nameCommandee_in) {
		
		  $this->nameCommandee = $nameCommandee_in;
		}

		abstract function execute();

  }

// NameUpperCaseCommand.class.php
  include_once('NameCommand.class.php');

  class NameUpperCaseCommand extends NameCommand {

		function execute() {$this->NameCommandee->setUpperCase();}

  }

// NameLowerCaseCommand.class.php
  include_once('NameCommand.class.php');

  class NameLowerCaseCommand extends NameCommand {

		function execute() {$this->NameCommandee->setLowerCase();}

  }

  
// TestName.php
  
  include_once('NameCommandee.class.php');
  include_once('NameCommand.class.php');
  include_once('NameUpperCaseCommand.class.php');
  include_once('NameLowerCaseCommand.class.php');

   //the callCommand function demonstrates that a specified
  //  function in BookCommandee can be executed with only 
  //  an instance of BookCommand.
  
  class TestName {
  
  
  function callCommand(NameCommand $nameCommand_in) {
  
    $nameCommand_in->execute();
  }
  
  
 }

  $testName = new TestName();
 
  $name = new NameCommandee("kami barut-wanayo");
  
  echo $name->getName() . "<br/>";
 
  $nameUpperCase = new NameUpperCaseCommand($name);

  $testName->callCommand($nameUpperCase);

  echo $name->getName() . "<br/>";
  
  $nameLowerCase = new NameLowerCaseCommand($name);
  
  $testName->callCommand($nameLowerCase);
  
  echo $name->getName();
  
}  
  
/* output 

kami barut-wanayo 
KAMI BARUT-WANAYO 
kami barut-wanayo

*/
  }

?>
