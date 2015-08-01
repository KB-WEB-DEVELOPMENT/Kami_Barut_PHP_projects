<?php
  
    class ParentClass { } 
    
    class ChildClass extends ParentClass { }
    
    $cc = new ChildClass();
    
    $dd = new ChildClass(); 
    
    if (is_a($cc,"ChildClass")) echo "It's a ChildClass Object Type."; //output: It's a ChildClass Object Type.
    
    echo "<br/>";
    
    if (is_a($cc,"ParentClass")) echo "It's also a ParentClass Object Type."; //output: It's also a ParentClass Object Type.
    
    echo "<br/>"; 
    
    print_r($cc); //output: ChildClass Object ( ) 
    
    echo "<br/>";
    
    print_r($dd); //output: ChildClass Object ( ) 
    
    echo "<br/>";
    
    var_dump($cc); //output: object(ChildClass)#1 (0) { } 
    
    echo "<br/>";
    
    var_dump($dd); //output:  object(ChildClass)#2 (0) { }

?>
