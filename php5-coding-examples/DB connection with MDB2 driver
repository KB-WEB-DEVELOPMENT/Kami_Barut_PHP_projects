<?php

// Using MDB2 to connect to a database engine. Format of DSN string is below. (p190) 

set_include_path(get_include_path()  .";".  "C:/Program Files/PHP/pear;");

require_once 'MDB2.php';

$dsn = 'mysql://user:password@localhost/test';

$options = array('persistent' => true);

$mdb2 = MDB2::factory($dsn, $options); // not sure what that is 

if (PEAR::isError($mdb2)) {
    die($mdb2->getMessage());
}
// ...

$result = $mdb2->query("select * from users");

while ($row = $result->fetchRow(MDB2_FETCHMODE_ASSOC))  {

    echo $row['name']."\n";
}

$mdb2->disconnect();

?>
