<?php
 
  include_once('StrategyCaps.class.php');
  include_once('StrategyExclaim.class.php');
  include_once('StrategyStars.class.php');  

   // StrategyContext.class.php
  class StrategyContext {
      
    private $strategy = NULL; 
    
    public function __construct($strategy_ind_id) {
	
      switch ($strategy_ind_id) {
        case "C": 
          $this->strategy = new StrategyCaps();
          break;
        case "E": 
          $this->strategy = new StrategyExclaim();
          break;
        case "S": 
          $this->strategy = new StrategyStars();
          break;
      }
    }
    public function showBookTitle($book) {
	
      return $this->strategy->showTitle($book);
    }


  }

  //Strategy.interface.php
  interface Strategy {      
    public function showTitle($book_in);
  }

  // StrategyCaps.class.php
  include_once('Book.class.php');
  include_once('Strategy.Interface.php');
  
  class StrategyCaps implements StrategyInterface {
    
    public function showTitle($book_in) {
      $title = $book_in->getTitle();
      $this->titleCount++;
      return strtoupper ($title);
    }
  } 
  // StrategyExclaim.class.php
  include_once('Book.class.php');
  include_once('StrategyInterface.php');
  
  class StrategyExclaim implements StrategyInterface {
    
    public function showTitle($book_in) {
      $title = $book_in->getTitle();
      $this->titleCount++;
      return Str_replace(' ','!',$title);
    }
  }

  //StrategyStars.class.php
  include_once('Book.class.php');
  include_once('StrategyInterface.php');  
  
  class StrategyStars implements StrategyInterface {
    
    public function showTitle($book_in) {
      $title = $book_in->getTitle();
      $this->titleCount++;
      return Str_replace(' ','*',$title);
    }
  }
  
 //Book.class.php
  class Book {

    private $author;
    private $title;

    function __construct($title_in, $author_in) {
	
      $this->author = $author_in;
      $this->title  = $title_in;
    }
    function getAuthor() {return $this->author;}

    function getTitle() {return $this->title;}
}

//testFile.php
	include_once('Book.class.php');
	include_once('StrategyContext.class.php');
  
	$book = new Book('This book has a very very long title today.','Larry Johnson');
  
    $strategyContextC = new StrategyContext('C');
    $strategyContextE = new StrategyContext('E');
    $strategyContextS = new StrategyContext('S');

	echo $strategyContextC->showTitle($book); // This book has a very very long title today.
	echo $strategyContextE->showTitle($book); // This!book!!has!!a!!very!!very!!long!!title!!today.
	echo $strategyContextS->showTitle($book); // This book**has**a**very**very**long**title**today.
 
?>
