<?php

include_once("model/Book.php");

class Model {
    
    public function getBookList()   {
        
	$servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT title, author, description FROM books";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
                    
            while($row = $result->fetch_assoc()) {

                $booksListDetailsArr["title"]= $row["title"];   
                $booksListDetailsArr["author"]= $row["author"];  
                $booksListDetailsArr["description"]= $row["description"];                  

                return $booksListDetailsArr;

            }                                       
        } else {
            
                    $booksListDetailsArr["title"]= "The database id empty: no title, author nor description.";   
                    $booksListDetailsArr["author"]= "The database id empty: no title, author nor description.";  
                    $booksListDetailsArr["description"]= "The database id empty: no title, author nor description.";
              
               }
                
                //var_dump($booksListDetailsArr);
  
        $conn->close();
    }
	
	public function getBook()   {
		
                $allBooks  = $this->getBookList();
                return $allBooks["title"];
             
	}		
}

?>
