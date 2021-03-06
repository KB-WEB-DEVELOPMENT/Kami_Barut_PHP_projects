<?php

// used with Iterator.php and Implementation of Iterator.php  files 

	class Posts implements Iterator	{
	
		private $posts = array();
		
		public function __construct($posts)	{
		
			if (is_array($posts)) {
				$this->posts = $posts;
			}
		}
		
		public function rewind() {
			reset($this->posts);
		}
		
		public function current() {
			return current($this->posts);
		}
		
		public function key() {
			return key($this->var);
		}
		
		public function next() {
			return next($this->var);
		}
		
		public function valid() {
			return ($this->current() !== false); // could use $this->current() == true
		}
	}
?>
