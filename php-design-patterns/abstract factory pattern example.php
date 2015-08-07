<?php

//AbstractBookFactory.php

abstract class AbstractBookFactory {
  
    abstract function makeFootballBook();
    
    abstract function makeBasketballBook();
 
  }

//KamiPublishingBookFactory.php
include_once('AbstractBookFactory.php');
  
include_once('KamiPublishingFootballBook.php');
include_once('KamiPublishingBasketballBook.php');
  
 class KamiPublishingBookFactory extends AbstractBookFactory {
 
    private $context = "Kami";   
  
    function makeFootballBook() {return new KamiPublishingFootballBook;}
    
    function makeBasketballBook() {return new KamiPublishingBasketballBook;}
 
 }
 
// AbstractBook.php
abstract class AbstractBook {
  
    abstract function getAuthor();
    
    abstract function getTitle();
  
  }

//AbstractFootballBook.php
include_once('AbstractBook.php');
  
    abstract class AbstractFootballBook {
  
		private $subject = "Football"; 
  }

//AbstractBasketballBook.php
include_once('AbstractBook.php');
  
    abstract class AbstractBasketballBook {
  
    private $subject = "Basketball";
  
  }


//KamiPublishingFootballBook.php
include_once('AbstractMySQLBook.php');
  
  class KamiPublishingFootballBook extends AbstractFootballBook {
  
    private $author;
    
    private $title;
    
    function __construct() {
    
      //alternate randomly between 2 books
      
      mt_srand((double)microtime()*10000000);
      $rand_num = mt_rand(0,1);      
      
      if (1 > $rand_num) {
        $this->author = 'Kami Barut-Wanayo';
        $this->title  = 'The greatest football players in the 20th century.';
      } else {
        $this->author = 'Larry Jonhson';
        $this->title  = 'The greatest football players in the 19th century.'; 
      }  
    }
  
    function getAuthor() {return $this->author;}
    
    function getTitle() {return $this->title;}
  
  }

//KamiPublishingBasketballBook.php
include_once('AbstractPHPBook.php');
  
  class KamiPublishingBasketballBook extends AbstractBasketballBook  {
  
    private $author;
    
    private $title;
    
    function __construct() {
    
      //alternate randomly between 2 books
      
      mt_srand((double)microtime()*10000000);
      $rand_num = mt_rand(0,1);      
      
      if (1 > $rand_num) {
        $this->author = 'Kami Barut-Wanayo';
        $this->title  = 'Basketball greatest players in the USA';
      } else {
        $this->author = 'Christian Wenz';
        $this->title  = 'Basketball greatest players in Germany'; 
      }  
    }
  
    function getAuthor() {return $this->author;}
    
    function getTitle() {return $this->title;}
  
  }
  
$newFootballPublication = new KamiPublishingBookFactory();
$newBasketballPublication = new KamiPublishingBookFactory();

$newFootballPublication->makeFootballBook();
$newBasketballPublication->makeBasketballBook();

echo $newFootballPublication->getAuthor(); . $newFootballPublication->getTitle(); 
// Kami Barut-Wanayo Basketball greatest players in the USA
echo $newBasketballPublication->getAuthor(); . $newBasketballPublication->getTitle();
// Christian Wenz Basketball greatest players in Germany
?>
