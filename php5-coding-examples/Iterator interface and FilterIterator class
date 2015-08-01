<?php

	// internal iterators

	interface Iterator {

		function rewind();
		function valid();
		function current();
		function key();
		function next();
	}

	// user iterators

	$it =get_resource();

	for ($it->rewind();$it->valid();$it->next()) {

	$value =$it->current();

	$key=$it->key();

	}

	// FilterIterator

	class FilterIterator implements Iterator {

		function  _construct (Iterator $input) {}

		function rewind() {}
		function accept() {}
		function valid() {}
		function current() {}
		function key() {}
		function next() {}
	}

	$it=get_resource();

	// using Filter Object -  to be studied

	foreach (new Filter($it,$filter_param) as $key => $val)  {/* access filtered data only */ } 

?>
