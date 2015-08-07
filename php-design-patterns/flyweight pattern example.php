<?php

// FlyweightBook.class.php
class FlyweightBook {
      
    private $author;
    private $title;
    
    function __construct($author_in, $title_in) {
      $this->author = $author_in;
      $this->title  = $title_in;
    }    
  
    function getAuthor() {
      return $this->author;
    }
    
    function getTitle() {
      return $this->title;
    }
  
  }

//FlyweightFactory.class.php 
  include_once('FlyweightBook.class.php');
  
  class FlyweightFactory {
      
    private $books = array(); 
    
    function __construct() {
      $this->books[1] = NULL;   // arbitrary number: in this case 3 books, 3 functions makeBook[i] with i=1,2,3 created
      $this->books[2] = NULL;
      $this->books[3] = NULL;
    }
  
    function getBook($bookKey) {
      if (NULL == $this->books[$bookKey]) {
        $makeFunction = 'makeBook'.$bookKey;
        $this->books[$bookKey] = $this->$makeFunction(); 
      } 
      return $this->books[$bookKey];
    }
    
    function makeBook1() {
      $book = new FlyweightBook('Mariah Johnson','Once in a lifetime'); 
      return $book;
    }


    function makeBook2() {
      $book = new FlyweightBook('Mariah Johnson','Once in a a blue moon'); 
      return $book;
    }


    function makeBook3() {
      $book = new FlyweightBook('Lucien Lefevre','L' histoire du Cosmos'); 
      return $book;
    }


  }

//FlyweightBookShelf.class.php

  include_once('FlyweightBook.class.php');;  
  
  class FlyweightBookShelf {
      
    private $books = array();         
  
    function addBook($book) {
      $this->books[] = $book;
    }
    
    function showBooks() {
      $return_string = NULL;
      foreach ($this->books as $book) {
        $return_string .= 'title: '.$book->getAuthor(). '  author: '.$book->getTitle() . '<br/>';
      };
      return $return_string;
    }
  
  }

//testFlyweight.php

  include_once('FlyweightBook.class.php');
  include_once('FlyweightBookShelf.class.php');
  include_once('FlyweightFactory.class.php');


  $flyweightFactory = new FlyweightFactory();
  
  $flyweightBookShelf1 =  new FlyweightBookShelf();
  
  $flyweightBook1 = $flyweightFactory->getBook(1);
  
  $flyweightBookShelf1->addBook($flyweightBook1);
  
  $flyweightBook2 = $flyweightFactory->getBook(1);
  
  $flyweightBookShelf1->addBook($flyweightBook2);
  
  
  // note: $flyweightBook1 and $flyweightBook1 both got loaded with book[$bookKey] with the same $bookKey = 1  
  
  echo 'test 1 - tests if $flyweightBook1 and $flyweightBook2 have the same book<br/>';
  if ($flyweightBook1 === $flyweightBook2) {
    echo '1 and 2 are the same<br/>';
  } else {
    echo '1 and 2 are not the same<br/>';    
  }
 
  // note: $flyweightBookShelf1 got loaded with $flyweightBook1 and $flyweightBook2 which both only have the book with $bookKey = 1
  echo '<br/>test 2 - prints all $fleightweightBooks[i] with i=1,2 loaded onto $flyweightBookShelf1<br/>';
  
  echo $flyweightBookShelf1->showBooks();


	// creates a second Book Shelf
  $flyweightBookShelf2 =  new FlyweightBookShelf();
  
  $flyweightBookShelf2->addBook($flyweightBook1);

  //  prints books from the first shelf and the second shelf
  echo 'test 3 - book on shelf 1<br/>';
  echo $flyweightBookShelf1->showBooks();
  echo '<br/>';
  echo 'test 3 - book on shelf 2<br/>';
  echo $flyweightBookShelf2->showBooks();
  
/* Output

test 1 - tests if $flyweightBook1 and $flyweightBook2 have the same book

1 and 2 are the same

test 2 - prints all $fleightweightBooks[i] with i=1,2 loaded onto $flyweightBookShelf1

title: Once in a lifetime author: Mariah Johnson
title: Once in a lifetime author: Mariah Johnson

test 3 - book on shelf 1
title: Once in a lifetime author: Mariah Johnson
title: Once in a lifetime author: Mariah Johnson
title: Once in a blue moon author: Mariah Johnson

test 3 - book on shelf 2
title: Once in a blue moon author: Mariah Johnson
*/
?>
