<?php

	class ArrayIterator {

		protected $ar;

		function _construct (Array $ar) {
			$this->ar=$ar;
		}

		function rewind() {
			rewind($this->ar);
		}

		function valid() {
			return !is_null(key($this->ar));
		}

		function key() {
			return key($this->ar);
		}

		function current() {
			return current($this->ar);
		}

		function next() {
			next($this->ar);
		}

	}
	
$a = array(1, 2, 3);

$o = newArrayIterator($a);

foreach($o as $key =>$val) {

	echo "$key => $va<br/>";
}

/*output: 

0 => 1
1 => 2
2 => 3

*/	
?>
