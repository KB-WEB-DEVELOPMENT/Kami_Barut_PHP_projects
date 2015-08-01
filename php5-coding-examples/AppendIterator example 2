<?php

// use of object AppendIterator and also ArrayObject

    class Post      {

        public $id;
        public $title;

        function __construct($title, $id)   {
            
            $this->title = $title;
            $this->id = $id;
        }
    }
    
$posts = new ArrayObject();

$posts->append(new post("Post 1",1));
$posts->append(new post("Post 2",2));
    
$a = new AppendIterator();

$a->append($posts->getIterator());
     
foreach ($a as $key=>$val)    {
            
     if ($val instanceof post)
            
        echo "id = {$val->id}" . " " . "title = {$val->title}<br/>";
    }
        
/* output:

id = 1 title = Post 1
id = 2 title = Post 2

*/

?>
