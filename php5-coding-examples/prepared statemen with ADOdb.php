<?php

// create, execute prepared statement using API provided by ADOdb

include("adodb/adodb.inc.php");

$conn =ADONewConnection('mysql');

$conn->connect("localhost","user","password","test") ;

$conn->setFetchMode(ADODB_FETCH_ASSOC);

$stmt = $conn->Prepare('insert into users(name) values (?)');

$conn->Execute($stmt,array((string) "afif"));

echo $conn->Affected_Rows();

?>
