<?php

include_once("model/Model.php");

class Controller {
	
        public $model;
        	
	public function __construct()  { 
            
            $this->model = new Model();

        } 
	
	public function invoke()    {
		
            if (!isset($_GET['book']))  {
                                        
                 $books = $this->model->getBookList();
		include 'view/booklist.php';
                           
            }   else    {
			// show the requested book
                            $book = $this->model->getBook($_GET['book']);
                        
                            $servername = "127.0.0.1";
                            $username = "root";
                            $password = "";
                            $dbname = "test";
                
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                        
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 

                            $sql = "SELECT title, author, description FROM books where title='$book'";                            
                            $result = $conn->query($sql);

                
                                if ($result->num_rows > 0) {


                                        while($row = $result->fetch_assoc()) {

                                            $bookInfos["title"]= $row["title"];   
                                            $bookInfos["author"]= $row["author"];  
                                            $bookInfos["description"]= $row["description"];     

                                            include 'view/viewbook.php';
                                      }
                                }
                         }
        }
        
}

?>
