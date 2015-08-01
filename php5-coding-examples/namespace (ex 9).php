<?php
namespace MyProject;
 
class MyClass {
    static function static_method()
    {
        echo 'Hello, world!';
    }
}
 
// Unqualified name, resolves to the namespace you are currently in (MyProject\MyClass)
MyClass:static_method();

?>

<?php
namespace MyProject;
 
require 'myproject/database/connection.php';
 
// Qualified name, instantiating a class from a sub-namespace of MyProject
$connection = new Database\Connection();

?>

<?php
namespace MyProject\Database;
 
require 'myproject/fileaccess/input.php';
 
// Trying to access the MyProject\FileAccess\Input class
// This time it will work because we use the fully qualified name, note the leading backslash
$input = new \MyProject\FileAccess\Input();

?>


<?php
namespace MyProject;
 
var_dump($query); // Overloaded
\var_dump($query); // Internal
 
// We want to access the global Exception class
// The following will not work because there's no class called Exception in the MyProject\Database namespace and 
// unqualified class names do not have a fallback to global space

// throw new Exception('Query failed!');
 
// Instead, we use a single backslash to indicate we want to resolve from global space
throw new \Exception('ailed!');
 
function var_dump() {
    echo 'Overloaded global var_dump()!<br />';
}

?>


<?php
namespace OtherProject;
 
$project_name = 'MyProject';
$package_name = 'Database';
$class_name = 'Connection';
 
// Include a variable file
require strtolower($project_name . '/'. $package_name .  '/' . $class_name) . '.php';
 
// Name of a variable class in a variable namespace. Note how the backslash is escaped to use it properly
$fully_qualified_name = $project_name . '\\' . $package_name . '\\' . $class_name;
 
$connection = new $fully_qualified_name();

?>


<?php
namespace MyProject;
 
function run() 
{
    echo 'Running from a namespace!';
}
 
// Resolves to MyProject\run
run();
// Explicitly resolves to MyProject\run
namespace\run();
?>

<?php
namespace MyProject\Database;
 
// 'MyProject\Database'
echo __NAMESPACE__;

?>

<?php
namespace OtherProject;
 
// This holds the MyProject\Database namespace with a Connection class in it
require 'myproject/database/connection.php';
 
// If we want to access the database connection of MyProject, we need to use its fully qualified name as we're in a different name space
$connection = new \MyProject\Database\Connection();
 
// Import the Connection class (it works exactly the same with interfaces)
use MyProject\Database\Connection;
 
// Now this works too! Before the Connection class was aliased PHP would not have found an OtherProject\Connection class
$connection = new Connection();
 
// Import the MyProject\Database namespace
use MyProject\Database;
 
$connection = new Database\Connection()

?>

<?php
namespace MyProject;
 
// Fatal error: Class 'SomeProject\Exception' not found
throw new Exception('An exception!');
 
// OK!
throw new \Exception('An exception!');
 
// Import global Exception. 'Exception' is resolved from an absolute standpoint, the leading backslash is unnecessary
use Exception;
 
// OK!
throw new Exception('An exception!');
?>

<?php
namespace OtherProject;
 
$parser = 'markdown';
 
// This is valid PHP
require 'myproject/blog/parser/' . $parser . '.php';
 
// This is not
use MyProject\Blog\Parser\$parser;
?>
