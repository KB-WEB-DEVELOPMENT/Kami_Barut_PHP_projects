<?php

// filter out array data with SPL class FilterIterator

    class GenderFilter extends FilterIterator   {
        
        private $GenderFilter;
                
        public function __construct( Iterator $it, $gender="F" )     {
        
            parent::__construct( $it );
            $this->GenderFilter = $gender;
        }
               
        public function accept()    {
            
            $person = $this->getInnerIterator()->current();
    
            if( $person['sex'] == $this->GenderFilter ) {
                return TRUE;
            }
            
            return FALSE;
        }
        
    }
    
    class AgeFilter extends FilterIterator   {
        
        private $AgeFilter;
        
        
        public function __construct( Iterator $it, $AgeFilter="26" )     {
        
            parent::__construct( $it );
            $this->AgeFilter = $AgeFilter;
        }
        
        
        
        public function accept()    {
            
            $person = $this->getInnerIterator()->current();
    
            if( $person['age'] == $this->AgeFilter ) {
                return TRUE;
            }
            
            return FALSE;
        }
        
    }
       
$arr = array(
            array("name"=>"John Abraham", "sex"=>"M", "age"=>27),
            array("name"=>"Lily Bernard", "sex"=>"F", "age"=>27),
            array("name"=>"Ayesha Siddika", "sex"=>"F", "age"=>26),
            array("name"=>"Afif", "sex"=>"M", "age"=>26)
        ) ;
    
$persons = new ArrayObject($arr);

$iterator = new GenderFilter( $persons->getIterator() );

echo "filter through SEX=F<br/><br/>";

foreach( $iterator as $person )     {
    
    echo $person['name'] . "<br/>";
}

echo str_repeat("-",30)."<br/>";

$persons = new ArrayObject($arr);

$iterator = new GenderFilter( $persons->getIterator() ,"M");

echo "filter through SEX=M<br/><br/>";

foreach( $iterator as $person )     {
    
    echo $person['name'] . "<br/>";
}

echo str_repeat("-",30)."<br/>";

$persons = new ArrayObject($arr);

$iterator = new AgeFilter( $persons->getIterator() ,"26");

echo "filter through Age=26<br/><br/>";

foreach( $iterator as $person )     {
    
    echo $person['name'] . $person['sex'] . "<br/>";
}

/* output

filter through SEX=F

Lily Bernard
Ayesha Siddika
------------------------------
filter through SEX=M

John Abraham
Afif
------------------------------
filter through Age=26

Ayesha SiddikaF
AfifM



*/


?>


