<?php

    // example to show that it is possible to serialize all public, private, protected variables but not static ones !
    // review examples of use of magic functions __sleep() and __wakeup() 
    
    class SampleObject  {

        public $var1;
        private $var2;
        protected $var3;
        public static $var4;
        private $staticvars = array();

        public function __construct()   {
            
            $this->var1 = "Value One";
            $this->var2 = "Value Two";
            $this->var3 = "Value Three";
            SampleObject::$var4 = "Value Four";
        }
        
        public function __sleep()   {
            $vars = get_class_vars(get_class($this));
            foreach($vars as $key=>$val)    {
                if (!empty($val))
                $this->staticvars[$key]=$val;
            }

            return array_keys( get_object_vars($this)); // notice that the _sleep function passes the array keys of $staticvars to the __wakeup function 
            //return array_values( get_object_vars($this)); works also 
            
        }
        
        public function __wakeup()  {
            foreach ($this->staticvars as $key=>$val){
                $prop = new ReflectionProperty(get_class($this), $key);  // retrieves the array keys of $staticvars 
                $prop->setValue(get_class($this), $val);  //in book
                //$prop = new ReflectionProperty(get_class($this), $val); works also 
                //$prop->getValue(get_class($this), $val);
            }
            $this->staticvars=array();
        }
    }
    
$so = new SampleObject();
var_dump($so); //output: object(SampleObject)#1 (4) { ["var1"]=> string(9) "Value One" ["var2":"SampleObject":private]=> string(9) "Value Two" ["var3":protected]=> string(11) "Value Three" ["staticvars":"SampleObject":private]=> array(0) { } }

?>
