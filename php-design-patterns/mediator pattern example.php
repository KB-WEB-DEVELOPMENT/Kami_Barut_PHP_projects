<?php

 include_once('BookColleague.class.php');
 include_once('BookAuthorColleague.class.php');
 include_once('BookTitleColleague.class.php');

// BookMediator.class.php

  class BookMediator {


    private $authorObject;
    private $titleObject;


    function __construct($author_in, $title_in) {
	
      $this->authorObject = new BookAuthorColleague($author_in,$this);
      $this->titleObject  = new BookTitleColleague($title_in,$this);
    }


    function getAuthor() {return $this->authorObject;}
    function getTitle() {return $this->titleObject;}


    // sets Book author and/or book title to uppercase or lowercase only if it isn't already set that way.
	
    function change(BookColleague $changingClassIn) {
	
      if ($changingClassIn instanceof BookAuthorColleague) {
	  
        if ('upper' == $changingClassIn->getState()) {
		
          if ('upper' != $this->getTitle()->getState()) { // optional: checks if state is not already set to upper 
		  
            $this->getTitle()->setTitleUpperCase();
          }
        } elseif ('lower' == $changingClassIn->getState()) {
		
          if ('lower' != $this->getTitle()->getState()) { // optional: checks if state is not already set to lower
		  
            $this->getTitle()->setTitleLowerCase();
          }
        }
      } elseif ($changingClassIn instanceof BookTitleColleague) {
	  
        if ('upper' == $changingClassIn->getState()) {
		
          if ('upper' != $this->getAuthor()->getState()) {	// optional: checks if state is not already set to upper 
		  
            $this->getAuthor()->setAuthorUpperCase();
          }
        } elseif ('lower' == $changingClassIn->getState()) {
		
          if ('lower' != $this->getAuthor()->getState()) {  // optional: checks if state is not already set to lower
		  
            $this->getAuthor()->setAuthorLowerCase();
          }
        }
      }
    }


  }

//BookColleague.class.php - this abstract class acts as a relay between the classes BookAuthorColleague ,BookTitleColleague and the mediator   

  include_once('BookMediator.class.php');


  abstract class BookColleague {


    private $mediator;


    function __construct($mediator_in) {
	
      $this->mediator = $mediator_in;
    }


    function getMediator() {return $this->mediator;}


    function change($changingClassIn) {
	
      getMediator()->titleChanged($changingClassIn);
    }


  }

// BookAuthorColleague.class.php  
include_once('BookColleague.class.php');


  class BookAuthorColleague extends BookColleague {


    private $author;
    private $state;


    function __construct($author_in, $mediator_in) {
      $this->author = $author_in;
      parent::__construct($mediator_in);
    }


    function getAuthor() {return $this->author;}
    function setAuthor($author_in) {$this->author = $author_in;}


    function getState() {return $this->state;}
    function setState($state_in) {$this->state = $state_in;}


    function setAuthorUpperCase() {
	
      $this->setAuthor(strtoupper($this->getAuthor()));
      $this->setState('upper');
      $this->getMediator()->change($this); // change method in BookColleague class called, BookAuthorColleague object passed as parameter
    }


    function setAuthorLowerCase() {
	
      $this->setAuthor(strtolower($this->getAuthor()));
      $this->setState('lower');
      $this->getMediator()->change($this); // change method in BookColleague class called, BookAuthorColleague object passed as parameter
    }


  }

// BookTitleColleague.class.php
include_once('BookColleague.class.php');

  class BookTitleColleague extends BookColleague {


    private $title;
    private $state;


    function __construct($title_in, $mediator_in) {
	
      $this->title = $title_in;
	  
	  parent::__construct($mediator_in);
    }


    function getTitle() {return $this->title;}
	
    function setTitle($title_in) {$this->title = $title_in;}


    function getState() {return $this->state;}
	
    function setState($state_in) {$this->state = $state_in;}


    function setTitleUpperCase() {
	
      $this->setTitle(strtoupper($this->getTitle()));
      $this->setState('upper');
      $this->getMediator()->change($this); // change method in BookColleague class called, BookTitleColleague object passed as parameter
    }


    function setTitleLowerCase() {
	
      $this->setTitle(strtolower($this->getTitle()));
      $this->setState('lower');
      $this->getMediator()->change($this); // change method in BookColleague class called,  BookTitleColleague object passed as parameter
    }

  }
  
 //testMediator.php

  include_once('BookColleague.class.php');
  include_once('BookAuthorColleague.class.php');
  include_once('BookTitleColleague.class.php');
  include_once('BookMediator.class.php');

  $mediator = new BookMediator('KAMI BARUT-WANAYO AND JOHN RIVEIRA SALSADO HARRIS', 'this is the title of our book');
							   
  $author = $mediator->getAuthor();
  $title = $mediator->getTitle();
  
  echo 'Original Author and Title:' . $author->getAuthor() . "with" . $title->getTitle()) . '<br/>';

  $author->setAuthorLowerCase();
  
  echo 'Set Author to Lower Case - changed Author and Title :' . $author->getAuthor() . "with" . $title->getTitle()) . '<br/>';

  $title->setTitleUpperCase();
  
  echo 'Set Title to Lower Case - changed Author and Title :' . $author->getAuthor() . "with" . $title->getTitle()) . '<br/>';

/* output

Original Author and Title: KAMI BARUT-WANAYO AND JOHN RIVEIRA SALSADO HARRIS with this the title of our book

Set Author to Lower Case - changed Author and Title : kami barut-wanayo and jon riveira salsado harris with this is the title of our book

Set Title to Lower Case - changed Author and Title : kami barut-wanayo and jon riveira salsado harris with THIS IS THE TITLE OF OUR BOOK
*/

?>
