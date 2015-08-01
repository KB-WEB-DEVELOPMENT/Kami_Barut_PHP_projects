<?php

    class Counter   {
        
        private static $c = 5;
        
        /**
        * Increment counter
        *
        * @final
        * @static
        * @access public
        * @return int
        */
        
        final public static function increment()    {
        
            return ++self::$c;
        }
    }
    
    $method = new ReflectionMethod('Counter', 'increment');
    
    printf(
    
        "===> The %s%s%s%s%s%s%s method '%s' (which is %s)" . " declared in %s" .  " lines %d to %d" .  " having the modifiers %d --  %s<br/>",
        
        $method->isInternal() ? 'internal' : 'user-defined',
        $method->isAbstract() ? ' abstract' : '',
        $method->isFinal() ? ' final' : '',
        $method->isPublic() ? ' public' : '',
        $method->isPrivate() ? ' private' : '',
        $method->isProtected() ? ' protected' : '',
        $method->isStatic() ? ' static' : '',
        $method->getName(),
        $method->isConstructor() ? 'the constructor' :'a regular method',
        $method->getFileName(),
        $method->getStartLine(),
        $method->getEndline(),
        $method->getModifiers(),
        
        implode(' ', Reflection::getModifierNames($method->getModifiers()))
        
    );
    
    // output: ===> The user-defined final public static method 'increment' (which is a regular method) declared in /home/cg/root/main.php lines 16 to 19 having the modifiers 134217989 -- final public static
    
    printf("<br/>===> Documentation: %s<br/>",
    var_export($method->getDocComment(), 1));
    
    // output: Documentation: '/** * Increment counter * * @final * @static * @access public * @return int */'
    
    if ($statics= $method->getStaticVariables()) {
        printf("<br/>===> Static variables: %s<br/>", var_export($statics, 1));
    }
    
    // output:  ??
    
    printf("<br/>===> Invokation results in: ");
    var_dump($method->invoke(NULL));
    
    // output: ===> Invokation results in: int(6)
    
?>
