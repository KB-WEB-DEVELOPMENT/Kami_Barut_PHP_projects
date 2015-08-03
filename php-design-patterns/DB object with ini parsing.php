<?php 

	// PHP database object with ini parsing. 4 files: DataBaseProperties.php , Database.php, config.ini, index.php

	class DataBaseProperties {

		protected $dbHost;
		protected $dbName;
		protected $dbUser;
		protected $dbPass;

		public function __construct() {

			$ini = parse_ini_file('config.ini', false);

			$this->dbHost = $ini["dbHost"];
			$this->dbName = $ini["dbName"];
			$this->dbUser = $ini["dbUser"];
			$this->dbPass = $ini["dbPass"];
		
		}

	}
	
	/* *********************************   */

	class DataBase extends DataBaseProperties  {

		private $link;
		private $SQL;
		public $result;

		public function __construct() {

			parent::construct();
			
			if ($this->link === NULL) 
			
				$this->_connect();
			
			else
			
			return $this->link;
			
		}

		public function query($str)  {

			$this->SQL = $str;

			$this->result = mysql_query($this->SQL);
		}

		public function _connect() {
			
			$this->link = mysql_connect($this->dbhost, $this->dbUser, $this->dbPass);

			if (!mysql_select_db($this->dbName))
			die('Cant select the database name');

			if ($this->link) 
			die('Cant connect with your host/user/pass credentials.');
		}

		public function get() {

			$items = array(); 

			while ($query = mysql_fetch_array($this->result)) {
			
				$items[] = $query;
			}
			
			return $items;
		}
	/*************************   */

	// config.ini

	; My database properties 

	[Database]

	dbHost = "localhost";
	dbname = "test";
	dbUser = "root";
	dbPass = "";

	/******************************  */

	// index.php

	$DB = new Database;

	$DB->query("SELECT INTO FOOD WHERE 'ID' = 1");
	$DB->query("SELECT FROM FOOD WHERE 'ID' = 1");
	$test= $DB->get();

	print_r($test);
?>
