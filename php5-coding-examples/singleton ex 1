<?php

    class Singleton {
    
    	static private $instance;
    
    	protected function __construct() {}
    
    	final private function __clone() {}
    
    	static function getInstance() {
    		
    		if(!self::$instance)
    			self::$instance= new Singleton();
    		return self::$instance;
    	}
    }
    
    $a= Singleton::getInstance();
    
    $a->id= 1;
    
    $b= Singleton::getInstance();
    
    print $b->id."<br/>"; //output : 1

?>
