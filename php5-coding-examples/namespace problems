<?php
// problems with namespace: https://pornel.net/phpns

//You can't import a namespace

use MyProject\Feature\*; // Not in PHP

from FooLibrary use Foo, Bar, Baz; // Nope

use FooLibrary\Foo,   
    FooLibrary\Bar,
    FooLibrary\Baz;  // this will work 


//You can't avoid repeating use statements


use <common_set_of_imports_that_my_project_uses.php> // No! Use copy&paste instead!


/* COMMENTS

Workaround via class_alias() leaves a lot to be desired:
It loads classes immediately, so it's not suitable for emulation of use Ns\*.
It creates name confined to a specific namespace, leaving choice between a global name (defeating the purpose of namespaces)
or name in some namespace (which still requires use statements in projects using sub-namespaces).

*/ 
 
//Aliases don't work with APIs operating on classes

namespace MyProject;
use Library\Stuff\FoosAndBars\Foo;

new \ReflectionClass('Foo'); // Error! The code above completely ignores the namespace boilerplate and just looks for global Foo

//PHP namespaces increase chance of collisions with reserved words

new List\DoublyLinked(); // Name collision!

use List as DontCollide; // will collide anyway!


//Nested namespaces are half-baked

namespace GUI;
class View {}

namespace GUI\Widgets;
class PushButton extends View {} // PHP won't find the View

//Name lookup is quirky and inconsistent

namespace Foo\Bar;

\time(); // works, but is ugly
time(); // PHP is smart enough to fall back to global

new \Date(); // ugly and required
new Date(); // PHP is not smart any more


//Fully-qualified name doesn't work in class declaration

class Foo\Bar\Someclass {…} // won't work 

namespace Foo\Bar;
class Someclass {…}   // 2 lines, will work


//Namespaces cannot be autoloaded

Classname::CONSTANT; // Works reliably if autoload is used
Namespacename\CONSTANT; // Won't be autoloaded and might work only by accident

new Lib\Obj(Lib\FOO_MODE); // works

$mode = Lib\FOO_MODE; // suddenly fails!
new Lib\Obj($mode); 


?>
