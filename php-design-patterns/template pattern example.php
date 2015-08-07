<?php
include_once('Person.php');  
  
  abstract class TemplateAbstract {
    
 
    public final function greetPersonText(Person $person_in) {
      
	  $fname = $person_in->getFirstName();
      $lname = $person_in->getLastName();
      
	  $processedFirstName = $this->processFirstName($fname);
      $processedLastName = $this->processLastName($lname);
      
	  if (NULL == $processedFirstName) {
	  
        $processed_info = $processedLastName;
      
	  } else {
				$processed_info = $processedFirstName . $processedLastName;
      }
      return $processed_info;
    }

    abstract function processFirstName($fname );
    

    function processLastName($lname) {
	
      return NULL;
    } 
    
  }
  
  class Person {

    private $fname;
    private $lname;

    function __construct($fname_in, $lname_in) {
	
      $this->fname =  $fname_in;
      $this->lname  = $lname_in;
    }

    function getFirstName() {return $this->fname;}

    function getLastName() {return $this->lname;}

  } 

include_once('TemplateAbstract.php');  
  
  class TemplateWithCompliment extends TemplateAbstract {
    
    function processFirstName($fname) {
			
			$fname = "Hello" . $fname; 
	  
			return $fname;
    }
    
    function processLastName($lname) {
      
			$lname .= ",I think you are a great person !";
			
			return $lname;
	  
    }
  }
  
 include_once('TemplateAbstract.php');  
  
  class TemplateNoCompliment extends TemplateAbstract {
    
   function processFirstName($fname) {
			
			$fname = "Hello" . $fname; 
	  
			return $fname;
    }
  }
  
  $person = new Person('Kami','Barut-Wanayo');
  
  $templateWithCompliment = new TemplateWithCompliment();  
  $templateNoCompliment = new TemplateNoCompliment();
  
  echo $templateWithCompliment->greetPersonText($person); // Hello Kami Barut, I think you are a greeat person !
  echo $templateNoCompliment->greetPersonText($person); //	 Hello Kami
  

?>


