<?php

// extract description and content from Flickr Feed and display it

    $content = file_get_contents("http://www.flickr.com/services/feeds/photos_public.gne ");
    
    $sx = simplexml_load_string($content);
    
    foreach ($sx->entry as $entry)  {
    
        echo  "<a href='{$entry->link['href']}'>"  . $entry->title   .  "</a><br/>";
        
        echo $entry->content."<br/>";
    } 

?>
