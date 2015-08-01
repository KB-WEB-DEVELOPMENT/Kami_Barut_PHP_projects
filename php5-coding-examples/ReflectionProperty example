<?php

class String    {

    public $length = 5;

    function accessLengthProp(String $obj, $length) {
      
          $reflection = new ReflectionClass($obj);
          
          $property = $reflection->getProperty($length);
          
          $property->setAccessible(true);
          
          return $property->getValue($obj);
    }
    
}

$prop = new ReflectionProperty('String', 'length');      

printf("<br/>===> The%s%s%s%s property '%s' (which was %s)  having the modifiers %s<br/>",

            $prop->isPublic() ? ' public' : '',
            
            $prop->isPrivate() ? ' private' : '',
            
            $prop->isProtected() ? ' protected' : '',
            
            $prop->isStatic() ? ' static' : '',
            
            $prop->getName(),
            
            $prop->isDefault() ? 'declared at compile-time' : 'created at run-time', var_export(Reflection::getModifierNames($prop->getModifiers()), 1)

      );

$obj= new String();

echo "<br/>===> The length property of the object is " . $obj->accessLengthProp($obj, 'length') . "<br/>";   

printf("<br/>===> The  value is: "); echo $prop->getValue($obj) . "<br/>";

$prop->setValue($obj, 10);

printf("<br/>===> The setting value to 10, new value is: ");   echo " " . $prop->getValue($obj);


/* output

===> The public property 'length' (which was declared at compile-time) having the modifiers array ( 0 => 'public', )

===> The length property of the object is 5

===> The value is: 5

===> The setting value to 10, new value is: 10

*/

?>
