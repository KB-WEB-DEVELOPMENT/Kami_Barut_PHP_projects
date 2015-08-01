<?php

    class users implements ArrayAccess  {
        
        private $users;
    
        public function __construct()   {
            $this->users = array();
        }
        
        public function offsetExists($key)  {
            return isset($this->users[$key]);
        }
    
        public function offsetGet($key) {
            return $this->users[$key];
        }
        
        public function offsetSet($key, $value) {
            $this->users[$key] = $value;
        }
    
        public function offsetUnset($key)   {
            unset($this->users[$key]);
        }
    }
    
$users = new users();
$users['afif']="mayflower@phpxperts.net";
$users['hasin']="hasin@pageflakes.com";
$users['ayesha']="florence@phpxperts.net";
$users['kami']="kamibarut@yahoo.com";


echo $users['afif'] . '</br>';  //output: mayflower@phpxperts.net
echo $users->offsetExists('hasin') . '</br>';   //output: 1 (true)
echo $users->offsetGet('ayesha') . '</br>'; //output: florence@phpxperts.net
echo $users->offsetSet('kami', 'jeanbarut@yahoo.com'). '</br>'; //output:
echo $users->offsetGet('kami') . '</br>';   //output: jeanbarut@yahoo.com
echo $users->offsetUnset('hasin');  //output:
echo $users->offsetExists('hasin'); //output: false 

?>
