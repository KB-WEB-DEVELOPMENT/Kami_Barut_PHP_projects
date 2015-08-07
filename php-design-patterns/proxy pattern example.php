<?php
// ProxyBookList.class.php
 
  include_once('Book.php');
  include_once('BookList.php');

  class ProxyBookList {
      
    private $bookList = NULL; 
    
    // NOTE 1: bookList is not instantiated at construct time
    function __construct() {
    }
	
	 /* NOTE 2: notice that Booklist() is instantiated when any of all the class methods getBookCount(),addBook($book),getBook($bookNum), 
	 removeBook($book) call this method when $this->bookList = NULL */
    function makeBookList() {
      $this->bookList = new bookList();
    }
	
    function getBookCount() {
      if (NULL == $this->bookList) {
        $this->makeBookList(); 
      }
      return $this->bookList->getBookCount();
    }
	
	// $book here is the object type
    function addBook($book) {
      if (NULL == $this->bookList) {
        $this->makeBookList(); 
      }
      return $this->bookList->addBook($book);
    }  
	
	// note: assumes the book number is known
    function getBook($bookNum) {
      if (NULL == $this->bookList) {
        $this->makeBookList();
      } 
      return $this->bookList->getBook($bookNum);
    }
	// $book here is the object type
    function removeBook($book) {
      if (NULL == $this->bookList) {
        $this->makeBookList();
      } 
      return $this->bookList->removeBook($book);
    }   
   
  }

//BookList.class.php
  include_once('Book.php');

  class BookList {
	
    private $books = array();
	private $bookCount = 0;

    public function __construct() {
    }

    public function getBookCount() {
      return $this->bookCount;
    }

    private function setBookCount($newCount) {
      $this->bookCount = $newCount;
    }

	// could have int $bokNumberToGet - typehinting
    public function getBook($bookNumberToGet) {
	  // checks for number and smaller than total amount or returns BULL
	  if ((is_numeric($bookNumberToGet)) &&  ($bookNumberToGet <= $this->getBookCount())) {
           return $this->books[$bookNumberToGet];
         } else {
           return NULL;
         }
	}

    public function addBook(Book $book_in) {
      $this->setBookCount($this->getBookCount() + 1);
      $this->books[$this->getBookCount()] = $book_in;
	  
	  // returns the total number of books available so far
      return $this->getBookCount();
    }

    public function removeBook(Book $book_in) {
      
	  $counter = 0;
      
	  // goes through all arrays keys of $book[i] for i=0,1...$this->getBookCount() and sets $books[i]=$books[i+1]
	  // lowers BookCount by 1
	  while (++$counter <= $this->getBookCount()) {
	  
        if ($book_in->getAuthorAndTitle() == 
          
		  $this->books[$counter]->getAuthorAndTitle())
		  {
      
			for ($x = $counter; $x < $this->getBookCount(); $x++) {
              $this->books[$x] = $this->books[$x + 1];
          }
		  
          $this->setBookCount($this->getBookCount() - 1);
        }
      }
	  // returns the total number of books available so far
      return $this->getBookCount();
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

    function getAuthorAndTitle() {
      return $this->getTitle() . ' by ' . $this->getAuthor();
    }
  }

//testProxy.php

  include_once('ProxyBookList.class.php');
  include_once('Book.class.php');

  $proxyBookList = new ProxyBookList();
  
  $inBook = new Book('The life of Alice in Wonderland','Someone');
  
  $proxyBookList->addBook($inBook);
  
  echo 'Total number of books added:' . $proxyBookList->getBookCount() . '<br/>';
    
  $outBook = $proxyBookList->getBook(1);
  
  echo 'Displaying books(s) details:' . $outBook->getAuthorAndTitle() . '<br/>'; 
  
  $proxyBookList->removeBook($outBook);
  
  echo 'Total number of books available after removal operation:' . $proxyBookList->getBookCount() . '<br/>';

/* output
Total number of books added:1
Displaying books(s) details:The life of Alice in Wonderland by Someone
Total number of books available after removal operation:0
*/
?>
