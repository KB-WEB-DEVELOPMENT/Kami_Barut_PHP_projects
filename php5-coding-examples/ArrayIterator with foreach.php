<?php

// examples of iterators with foreach

$o = newArrayIterator(array(1, 2, 3));

$o->rewind();

while($o->valid()) {
	$key=$o->key();
	$val=$o->current();
	// somecode
	$o->next();
}


$o = newArrayIterator(array(1, 2, 3));
	
	foreach ($o as $key=>$val) {
		// somecode
	}

?>
