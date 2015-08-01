<?php

    class SampleObject  {
        
        public $var1;
        private $var2;
        protected $var3;
        static $var4;

        public function __construct()   {
            
            $this->var1 = "Value One";
            $this->var2 = "Value Two";
            $this->var3 = "Value Three";
            SampleObject::$var4 = "Value Four";
            
        }
    }
        
	$so = new SampleObject();
	
	$serializedso =serialize($so);
	
	// file_put_contents("text.txt",$serializedso);
	
	var_dump($serializedso); //output: string(126) "O:12:"SampleObject":3:{s:4:"var1";s:9:"Value One";s:18:"SampleObjectvar2";s:9:"Value Two";s:7:"*var3";s:11:"Value Three";}" 
	
	echo "<br/>";
	
	// $unserializedso = file_get_contents("text.txt");
	
	$unserializedso = unserialize($serializedso);
	
	var_dump($unserializedso); //output: object(SampleObject)#2 (3) { ["var1"]=> string(9) "Value One" ["var2":"SampleObject":private]=> string(9) "Value Two" ["var3":protected]=> string(11) "Value Three" }

?>
