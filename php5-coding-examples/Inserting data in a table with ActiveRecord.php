<?php

// creating new record in table via ActiveRecord

include("adodb/adodb.inc.php");

include('adodb/adodb-active-record.inc.php');

$conn =ADONewConnection('mysql');

$conn->connect("localhost","user","password","test") ;

ADODB_Active_Record::setDatabaseAdapter($conn);

class User extends ADODB_Active_Record {}
	
	$user = new User();     //a dynamic model to access the user table
	$user->name = "Packt";
	$user->pass = "Hello";
	$user->save();        //calling save() will internally save this record in table

?>
