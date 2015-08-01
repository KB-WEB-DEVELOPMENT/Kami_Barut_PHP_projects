<?php

// http://php.net/manual/en/refs.database.abstract.php  DBA — Database (dbm-style) Abstraction Layer

class DbaReader implements ArrayAccess	{

	protected $db= NULL;

	function __construct($file, $handler) {
		
		if (!$this->db= dba_open($file, 'cd', $handler))        // $id = dba_open("/tmp/test.db", "n", "db2");
			throw new exception('Could not open file '. $file);
	}

	function __destruct() { dba_close($this->db); }

	function offsetExists($offset) {
		return dba_exists($offset, $this->db);    // if (dba_exists($index, $id)) ....
	}

	function offsetGet($offset) {
		return dba_fetch($offset, $this->db);     // dba_fetch($key, $db)) ... 
	}

	function offsetSet($offset, $value) {
		return dba_replace($offset, $value, $this->db); // dba_replace("HOME","/www/",$source);
	}

	function offsetUnset($offset) {
		return dba_delete($offset, $this->db); // bool dba_delete ( string $key , resource $handle )
	}
}

/* example */

if (!class_exists('DbaReader', false)) {
	require_once‘dbadeader.inc’;
}

$_SHARED= new DbaReader('/tmp/.counter', 'flatfile');
$_SHARED['counter'] += 1;

printf("PID: %d<br/>COUNTER: %d<br/>", getmypid(), $_SHARED['counter']);

?>
