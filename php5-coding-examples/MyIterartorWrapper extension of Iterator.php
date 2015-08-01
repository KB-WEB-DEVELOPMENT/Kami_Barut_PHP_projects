<?php

	Interface Iterator	{

	function rewind(){ $this->it->rewind(); }
	function valid(){ return $this->it->valid(); }
	function current(){ return $this->it->current(); }
	function key(){ return $this->it->key(); }
	function next(){ $this->it->next(); }

	}

	class MyIteratorWrapper implements Iterator	{

		function __construct(Iterator $it)	{

			$this->it= $it;
		}

		function __call($func, $args){

			$callee= array($this->it, $func);  // first iterator, then $func, i.e: one of the five methods above in Interface
			
			}

			if (!is_callable($callee)) {
			
				throw new BadMethodCallException();
			}
			
			return call_user_func_array($callee, $args);	// performs the iterator method on Iterator $it through $callee	 
		 }

	}

?>
