<?php

// AbstractCustomer.class.php

  include_once('AbstractProducer.class.php');
  
  abstract class AbstractCustomer {
  
    abstract function update(AbstractProducer $producer_in);

  }

  include_once('AbstractCustomer.class.php');

 // AbstractProducer.class.php
  
  abstract class AbstractProducer {

    abstract function attach(AbstractCustomer $customer_in);
	
    abstract function detach(AbstractCustomer $customer_in);

    abstract function notify();

  }
  
  //  PatternCustomer.class.php

  include_once('AbstractCustomer.class.php');
  include_once('PatternProducer.class.php');

  class PatternCustomer extends AbstractCustomer {

	protected $name;
  
    public function __construct() {
	
	$this->name = $name;
    }

    public function update(AbstractProducer $producer) {

      echo '<br/>ALERT - NEW INFO FOR CUSTOMERS - PRESS RELEASE FROM PRODUCER<br/>';
      echo 'TOP 3 NEW FAVORITE BRANDS: '. $producer->getFavouriteBrands(). '<br/>';
      echo 'END OF ALERT<br/><br/>';      
    }

  }
    
// PatternProducer.class.php

  include_once('AbstractProducer.class.php');
  include_once('PatternCustomer.class.php');

  class PatternProducer extends AbstractProducer {
	
	private $favouriteBrands = NULL;
	
    private $customersArr = array();

    function __construct() {
    }

    function attach(AbstractCustomer $customer_in) {
	
      //could also use array_push($this->customersArr, $customer_in);
      $this->customersArr[] = $customer_in;
    }
	
    function detach(AbstractCustomer $customer_in) {
	
		/*  Alternative to code below:
		
		   $key = array_search($customer_in, $this->customersArr); 
		   
		   if isset($key) {
			
				unset($this->customersArr[$key]);
				
		   }

		 */
      	  
	  foreach($this->customersArr as $ckey => $cval) {
        if ($cval == $customer_in->name) { 
          unset($this->customersArr[$ckey]);
        }
      }
    }

    function notify() {
      foreach($this->customersArr as $customer) {
        $obs->update($this);
      }
    }

    function updateFavouriteBrands($newFavouriteBrands) {
      $this->favouriteBrands = $newFavouriteBrands;
      $this->notify();
    }

    function getFavouriteBrands() {
      return $this->favouriteBrands;
    }


  }

//testCustomer.php

  include_once('PatternProducer.class.php');
  include_once('PatternCustomer.class.php');

  $patternProducer = new PatternProducer();
  $patternCustomer = new PatternCustomer();
  $patternProducer->attach($patternCustomer);

  $patternProducer->updateFavouriteBrands('Zara, Hilfiger, Hugo Boss');

  $patternProducer->updateFavouriteBrands('Ralph Lauren, Tacchini, Channel');
  
  $patternProducer->detach($patternCustomer);

  $patternProducer->updateFavouriteBrands('Bello, Jumpers, Taylor Brand');

/* output of testCustomer.php

ALERT - NEW INFO FOR CUSTOMERS - PRESS RELEASE FROM PRODUCER
TOP 3 NEW FAVORITE BRANDS: Zara, Hilfiger, Hugo Boss
END OF ALERT

ALERT - NEW INFO FOR CUSTOMERS - PRESS RELEASE FROM PRODUCER
TOP 3 NEW FAVORITE BRANDS: Ralph Lauren, Tacchini, Channel
END OF ALERT

*/

?>
