<?php

// using ActiveRecord to load and change record

include("adodb/adodb.inc.php");

include('adodb/adodb-active-record.inc.php');

$conn =ADONewConnection('mysql');

$conn->connect("localhost","user","password","test") ;

ADODB_Active_Record::setDatabaseAdapter($conn);

class User extends ADODB_Active_Record {}

$user = new User();

$user->load("id=10");   //load the record where the id is 10

echo $user->name;

$user->name= "Afif Mohiuddin";  //now update

$user->save();  //and save the previously loaded record

?>
