<?php

    class ExtendedArrayObject extends ArrayObject {
    
        private $_array;

        public function __construct()   {
            
            if (is_array(func_get_arg(0)))
                $this->_array = func_get_arg(0);

            else

                $this->_array = func_get_args();

            parent::__construct($this->_array);
        }
        
        public function each($callback) {
        
            $iterator = $this->getIterator();
        
            while ($iterator->valid())   {
        
                $callback($iterator->current());
                $iterator->next();
            }
        }

        public function without()   {
        
            $args = func_get_args();
            return array_values(array_diff($this->_array,$args));
        }
        
        
        public function first()     {
        
            return $this->_array[0];
        }
        
        public function indexOf($value)     {
        
            return array_search($value,$this->_array);
        }
        
        
        public function inspect()       {
        
            echo "<pre>".print_r($this->_array, true)."</pre>";
        }
        
        public function last()      {
           
            return $this->_array[count($this->_array)-1];
            
        }
        
        public function reverse($applyToSelf=false)     {
        
            if (!$applyToSelf)
            
                return array_reverse($this->_array);
            
            else    {
                        $_array = array_reverse($this->_array);
                        $this->_array = $_array;
                        parent::__construct($this->_array);
                        return $this->_array;
                    }
        }
        
        public function shift()     {
        
            $_element = array_shift($this->_array);
            parent::__construct($this->_array);
            return $_element;
        
            
        }
        
        public function pop()       {
        
            $_element = array_pop($this->_array);
            parent::__construct($this->_array);
            return $_element;
        }
        
        public function speak($value)      {
            echo $value;
        }
        
    }
    
$newArray = new ExtendedArrayObject(1,2,3,4,5,6); // or new ExtendedArrayObject(array(1,2,3,4,5,6)); 

// problem with each() method

// print_r($newArray->without(2,3,4)); output: Array ( [0] => 1 [1] => 5 [2] => 6 )

//$newArray->inspect();

/* Output:

Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
    [5] => 6
)


*/

//print_r($newArray->reverse()); output: Array ( [0] => 6 [1] => 5 [2] => 4 [3] => 3 [4] => 2 [5] => 1 )

//print_r($newArray->reverse(true)); output: Array ( [0] => 6 [1] => 5 [2] => 4 [3] => 3 [4] => 2 [5] => 1 )

//print_r($newArray->reverse(false));  output: Array ( [0] => 6 [1] => 5 [2] => 4 [3] => 3 [4] => 2 [5] => 1 )

//echo $newArray->shift(); returns the first value of the array elements, here 1

//echo $newArray->pop(); returns last value of the array elements, here 6

// echo $newArray->last(); returns last value of the array elements, here 6

// echo $newArray->first();  returns the first value of the array elements, here 1

?>
