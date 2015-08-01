<?php

    $emails = array("hasin" => "hasin@pageflakes.com", "afif" => "mayflower@phpxperts.net", "ayesha" => "florence@pageflakes.net");
    
    $users = new ArrayObject($emails);
    
        $iterator = $users->getIterator();
        
        while ($iterator->valid())  {
		
            echo "{$iterator->key()}'s email address is {$iterator->current()} . <br/> ";
            $iterator->next();
        }


/* 

output:

hasin's email address is hasin@pageflakes.com . 
afif's email address is mayflower@phpxperts.net . 
ayesha's email address is florence@pageflakes.net . 

*/   

?>
