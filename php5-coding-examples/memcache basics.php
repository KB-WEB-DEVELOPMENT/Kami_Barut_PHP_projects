<?php

// first install memcache on windows - see link below
// http://www.leonardaustin.com/blog/technical/how-to-install-memcached-on-xampp-on-windows-7/

// details for use of memcache: http://www.stevenmcmillan.co.uk/blog/2010/php5-memcached-example/


    class Cacher extends Memcache {
	
	    static private $MEMCACHE_SERVERS = array("127.0.0.1"); // add all ip addresses of servers 
	
	    static public $memcacheObj = NULL;
	
	    static function cache() {
		    
		    if (self::$memcacheObj == NULL) {
			    if (class_exists('Memcache')) {             // checks if Memcache is properly installed
				    self::$memcacheObj = new Memcache;      // instantiates Memcache object $memcacheObj
				        foreach(self::$MEMCACHE_SERVERS as $server){
					        self::$memcacheObj->addServer($server); // connects $memcacheObj to all servers
				        }
			    } else  {
				            return false;                   // in case Memcache not properly installed or Memcache object $memcacheObj not NULL
			            }
		    }
		
		    return self::$memcacheObj;
	    }

	    static function flushCache() {
		
		    if (self::$memcacheObj == NULL) {
			    self::cache();                              // flushes Memcache object $memcacheObj 
		    }   
		
		    return self::$memcacheObj->flush();             // returns ???????
	    }

	    static function stats() {
		    if (self::$memcacheObj == NULL) {
			    self::cache();                              // ???????
		    }
		return self::$memcacheObj->getExtendedStats();      // ???????
	    }
    }
    
    // usage 
    
    include('cacher.php');

    //If $myData is not from the cache.
    if($myData === false) {
	  $myData = doLongFunc(); //replace with whatever function you wish to cache.
	  Cacher::cache()->set("myData", $myData, false, 300);  //300 is 5 Minutes
    }
    
 
    $myData = Cacher::cache()->get("myData");
    echo $myData;
    
/* ************************************************************************************************************* */                                         
   
/* BOOK EXAMPLE */


$memcache = new Memcache;
$memcache->connect('localhost', 11211) or die ("Could not connect");
$tmp_object = new stdClass;
$tmp_object->str_attr = 'test';
$tmp_object->int_attr = 12364;
$memcache->set('obj', $tmp_object, false, 60*5) or die ("Failed to save data at the server");


$memcache = new Memcache;
$memcache->connect('localhost', 11211) or die ("Could not connect");
$newobj = $memcache->get('obj');
   
/* ************************************************************************************************************* */      

?>
