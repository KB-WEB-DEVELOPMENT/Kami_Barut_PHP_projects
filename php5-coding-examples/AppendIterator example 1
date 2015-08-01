<?php

// use of object AppendIterator and also ArrayObject

class Comment   {
    
        public $content;
        public $post_id;
        
        function __construct($content, $post_id) {
            
            $this->content = $content;
            $this->post_id = $post_id;
        }
    }

$comments = new ArrayObject();
    
$comments->append(new Comment("comment 1",1));
$comments->append(new Comment("comment 2",1));
$comments->append(new Comment("comment 3",2));
$comments->append(new Comment("comment 4",2));

$a = new AppendIterator();

$a->append($comments->getIterator());

foreach ($a as $key=>$val)    {
            
    if ($val instanceof Comment )
            
        echo "post id = {$val->post_id}" . " " . "Content = {$val->content}<br/>";
    }
    
/* output:

post id = 1 Content = comment 1
post id = 1 Content = comment 2
post id = 2 Content = comment 3
post id = 2 Content = comment 4

*/


?>
