<?php

// using variables with queries in prepared statements in MySQLi

$mysqli = new mysqli("localhost", "un" "pwd", "db");

if (mysqli_connect_errno()) {
	
	echo("Failed to connect, the error message is : ".
	
	mysqli_connect_error());
	
	exit();
}


$stmt = $mysqli->prepare("select name, pass from users where name=?");

$stmt->bind_param("s",$name); //binding name as string

$name = "tipu";

$stmt->execute();

$name=null;

$stmt->bind_result($name, $pass);

while ($r = $stmt->fetch())	{
	
	   echo $pass."<br/>";
}

?>
