<?php

// Example: registry pattern

// 1. class definition

class Registry {
    protected $_objects = array();

    function set($name, &$object) {
        $this->_objects[$name] =& $object;
    }

    function &get($name) {
        return $this->_objects[$name];
    }
}

// 2. use

// First we create our database and registry objects
$db = new databaseConnection();
$registry = new registry();

// Then we add the db object to the registry
// It will now be available anywhere the registry 
// is also available!
$registry->add("database", $db);

// Now we create the objet that gets our username 
// and checks for admin status
$user = new username($registry);
$admin = new admin($registry);

$username = $user->getUser(12);
$isAdmin = $admin->check($username);


echo("Username: ".$username."<br />"); //output: Username: 12
echo("Is Admin? ".$isAdmin);  //output:  is Admin? boolean answer 0 or 1

// 3. further use

$databaseObj = $registry->get("database");

$databaseObj->query("SELECT username FROM users". " WHERE id=$userId");


?>
