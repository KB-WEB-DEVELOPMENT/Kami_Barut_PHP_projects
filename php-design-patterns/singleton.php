<?php

// singleton design pattern example 2

	class Database {

	public static $connection;

	private function __construct() {

		echo "Connection created";
	}

	public function connect() {
	
		if (!isset(self::$connection))	{
		
			self::$connection = new Database;
		}
		
		return self::$connection;
	
	}

	public function query($sql) {

		mysql_query($sql);
	}

}

$db = new Database::connect();
$db2 = new Database::connect();

/* output: Connection created  (note: message printed only once */




?>
