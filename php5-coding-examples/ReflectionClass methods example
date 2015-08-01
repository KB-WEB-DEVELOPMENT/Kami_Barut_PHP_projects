<?php

        interface NSerializable {
        
        }
        
        class Object    {
    
        }
        
        /**
        * A counter class
        */
        
        class Counter extends Object implements NSerializable   {
    
            const START = 0;
            private static $c = Counter::START;
    
            /**
            * Invoke counter
            *
            * @access public
            * @return int
            */
    
            public function count() {
            
                return self::$c++;
            }
        }
        
        $class = new ReflectionClass('Counter');
        
        printf("===> The %s%s%s %s '%s' [extends %s]" . " declared in %s" . " lines %d to %d" . " having the modifiers %d [%s]<br/>",
        
                $class->isInternal() ? 'internal' : 'user-defined',
                $class->isAbstract() ? ' abstract' : '',
                $class->isFinal() ? ' final' : '',
                $class->isInterface() ? 'interface' : 'class',
                $class->getName(), var_export($class->getParentClass(), 1),
                $class->getFileName(),
                $class->getStartLine(),
                $class->getEndline(),
                $class->getModifiers(), implode(' ', Reflection::getModifierNames($class->getModifiers()))
            );
            
        // output: ===> The user-defined class 'Counter' [extends ReflectionClass::__set_state(array( 'name' => 'Object', ))] declared in /home/cg/root/main.php lines 15 to 31 having the modifiers 524288 []
        
        printf("===> Documentation:%s<br/>", var_export($class->getDocComment(), 1)); // output: ===> Documentation:'/** * A counter class */'
        
		printf("===> Implements:%s<br/>", var_export($class->getInterfaces(), 1)); // output: ===> Implements:array ( 'NSerializable' => ReflectionClass::__set_state(array( 'name' => 'NSerializable', )), )
        
        printf("===> Constants: %s<br/>", var_export($class->getConstants(), 1)); // output: ===> Constants: array ( 'START' => 0, )
       
        printf("===> Properties: %s<br/>", var_export($class->getProperties(), 1)); // output: ===> Properties: array ( 0 => ReflectionProperty::__set_state(array( 'name' => 'c', 'class' => 'Counter', )), )
        
        printf("===> Methods: %s<br/>", var_export($class->getMethods(), 1)); // output: ===> Methods: array ( 0 => ReflectionMethod::__set_state(array( 'name' => 'count', 'class' => 'Counter', )), )
        
        if ($class->isInstantiable())   {
        
            $counter = $class->newInstance();
            echo '===> $counter is instance? ';
            echo $class->isInstance($counter) ? 'yes' : 'no'; //output: ===> $counter is instance? yes
            echo "<br/>===> new Object() is instance? ";
            echo $class->isInstance(new Object()) ? 'yes' : 'no'; //output: ===> new Object() is instance? no
        }
    
?>
