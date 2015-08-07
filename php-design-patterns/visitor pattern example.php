<?php

//Visitee.php

abstract class Visitee {

  abstract function accept(Visitor $visitorIn);

  }

//FrenchVisitee.php
include_once('Visitee.php');
include_once('Visitor.php')

class FrenchVisitee extends Visitee{

	private $lastName;
	private $passportId;

	function __construct($lastName_in, $passportId_in) {
		  
		  $this->lastName = $lastName_in;
		  $this->passportId  = $passportId_in;
		}

		function getLastName() {return $this->lastName;}

		function getPassportId() {return $this->passportId;}
		
		function accept(Visitor $visitorIn) {
		 
		  $visitorIn->visitFrench($this);
		}
}

//USVisitee.php

class USVisitee extends Visitee	{

	private $lastName;
	private $socialSecurityId;

	function __construct($lastName_in, $socialSecurityId_in) {
		  
		  $this->lastName = $lastName_in;
		  $this->socialSecurityId  = $socialSecurityId_in;
		}

		function getLastName() {return $this->lastName;}

		function getsocialSecurityId() {return $this->socialSecurityId;}
		
		function accept(Visitor $visitorIn) {
		 
		  $visitorIn->visitUS($this);
		}
}


//Visitor.php

	abstract class Visitor {


		abstract function visitFrench(FrenchVisitee $frenchVisitee_In);


		abstract function visitUS(USVisitee $usVisitee_In);


  }

include_once('FrenchVisitee.php');
include_once('USVisitee.php');
include_once('Visitor.php');  
//FrenchDescriptionVisitor.php

class FrenchDescriptionVisitor {

	private $description = NULL;

    function getDescription() { return $this->description; }
	
    function setDescription($descriptionIn) { 
	
      $this->description = $descriptionIn;
    }
	
	function visitFrench(FrenchVisitee $frenchVisiteeIn) {
	
      $this->setDescription('Bonjour ' . $frenchVisiteeIn->getLastName() . ', votre numéro de passport: ' .  $frenchVisiteeIn->getpassportId() . '<br/>');
	}
	
	function visitUS(USVisitee $usVisiteeIn) {
	
      $this->setDescription('Bonjour ' . $usVisiteeIn->getLastName() . ', votre numéro de de sécurité social: ' .  $usVisiteeIn->getsocialSecurityId() . '<br/>');
	}
	

}

//EnglishDescriptionVisitor.php

class EnglishDescriptionVisitor {

	private $description = NULL;

    function getDescription() { return $this->description; }
	
    function setDescription($descriptionIn) { 
	
      $this->description = $descriptionIn;
    }
	
	function visitFrench(FrenchVisitee $frenchVisiteeIn) {
	
      $this->setDescription('Hello Mr. ' . $frenchVisiteeIn->getLastName() . ', your passport number: ' .  $frenchVisiteeIn->getpassportId() . '<br/>');
	}
	
	function visitUS(USVisitee $usVisiteeIn) {
	
      $this->setDescription('Hello Mr. ' . $usVisiteeIn->getLastName() . ', your social security number: ' .  $usVisiteeIn->getsocialSecurityId() . '<br/>');
	}

}

//testVisitor.php

include_once('Visitee.php');
include_once('FrenchVisitee.php');
include_once('USVisitee.php');
include_once('Visitor.php');
include_once('FrenchDescriptionVisitor.php');
include_once('EnglishDescriptionVisitor.php'); 

$frenchVisitee = new FrenchVisitee("Hollande","12344-99734");
					
$usVisitee = new USVisitee("Obama","50349385-32");

$frenchDescriptionVisitor = new FrenchDescriptionVisitor();

acceptVisitor($frenchVisitee,$frenchDescriptionVisitor);

echo "French text 1: " . $frenchDescriptionVisitor->getDescription() . '<br/>';

acceptVisitor($usVisitee,$frenchDescriptionVisitor);

echo "French text 2: ". $frenchDescriptionVisitor->getDescription() . '<br/>';

$englishDescriptionVisitor = new EnglishDescriptionVisitor();

acceptVisitor($frenchVisitee,$englishDescriptionVisitor);

echo "English text 1: " . $englishDescriptionVisitor->getDescription() . '<br/>';

acceptVisitor($usVisitee,$englishDescriptionVisitor);

echo "English text 2: ". $englishDescriptionVisitor->getDescription() . '<br/>';

/* output

French  text 1: Bonjour Mr. Hollande,  votre numéro de passport: 12344-99734
French  text 2: Bonjour Mr. Obama,  votre numéro de sécurité social: 50349385-3
English text 1: Hello Mr. Hollande,  your passport number:  12344-99734
English text 2: Hello Mr. Obama,  your social security number: 50349385-3
*/
  
  
?>  

					
