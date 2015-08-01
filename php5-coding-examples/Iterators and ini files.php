<?php

	/*

	http://php.net/manual/en/refs.database.abstract.php  DBA — Database (dbm-style) Abstraction Layer

	INI file abstraction

	A class that handles INI files
	An abstract filter Iterator
	A filter that filters group names from the INI file input
	An Iterator to read all entries in the INI file
	Another filter that allow to search for specific groups   

	*/



	class DbaReader implements Iterator {

		protected $db= NULL;
		
		private $key= false, $val= false;
		
		function __construct($file, $handler) {
		
			if (!$this->db = dba_open($file, 'r', $handler))
				throw new Exception("Could not open file $file");
		
			
			else {
					$this->db =  dba_open($file, 'r', $handler);
				 
					//return $this->db; 
			}
		}
		
		function __destruct() {
			
			dba_close($this->db);
		}
		
		private function fetch_data($key) {
			
			if (($this->key = $key)!== false)
				
				$this->val= dba_fetch($this->key, $this->db);
		}
		
		function rewind() {
			
			$this->fetch_data(dba_firstkey($this->db));
		}
		
		function next() {
			
			$this->fetch_data(dba_nextkey($this->db));
		}
		
		function current() { return $this->val; }
		
		function valid() { return $this->key !== false; }
		
		function key() { return $this->key; }
	}

	interface Iterator {

		function rewind();

		function valid();

		function current();

		function key();

		function next();

	}

	class FilterIterator implements Iterator {

		function __construct(Iterator $input) ...

		function rewind()... 

		function accept()...

		function valid()...

		function current()...

		function key()... 

		function next()...

	}


	class KeyFilter extends FilterIterator	{

	// note: FilterIterator is an abstract class
	// note: Abstract accept() is called from rewind() and next()
	// note: When accept() returns false next() will be called automatically


		private $rx;

		function __construct(Iterator $it, $regex) {

		parent::__construct($it);
			
			$this->rx= $regex;
		
		}

		function accept() {
		
			return ereg($this->rx,$this->getInnerIterator()->key());

		}

		function getRegex() {
				
				return $this->rx;
		}

		protected function __clone($that) {
			// disallow clone
		}
	}

	/* Getting only INI groups  */

	if (!class_exists('KeyFilter', false)) {
		require_once('keyfilter.inc');
	}

	class IniGroups extends KeyFilter	{

		function __construct($file) {
			parent::__construct(new DbaReader($file,'inifile'),'^\[.*\]$');
		}

		function current() {
			return substr(parent::key(), 1, -1);
		}

		function key() {
			return substr(parent::key(), 1, -1);
		}
	}

	/* Putting it to work */

	if (!class_exists('KeyFilter', false)) {
		require_once('keyfilter.inc');
	}

	if (!class_exists('IniGroups', false)) {
		require_once('inigroups.inc');
	}

	$it= new IniGroups($argv[1]);

	if ($argc>2) {
		$it= new KeyFilter($it, $argv[2]);
	}

	foreach($it as $group) {
		echo $group. "<br/>";
	}


?>
