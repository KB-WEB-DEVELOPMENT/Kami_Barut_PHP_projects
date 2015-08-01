<?php

//Interceptors: Allow to dynamically handle non class members

	class Object {

		protected $virtual = array();

		function __get($name) {
			return @$this->virtual[$name];
		}

		function __set($name, $value) {
			$this->virtual[$name] = $value;
		}

		function __unset($name) {
			unset($this->virtual[$name]);
		}

		function __isset($name) {
			return isset($this->virtual[$name]);
		}

		function __call($func, $params) {
			echo 'Could not call ' . __CLASS__ . '::' . $func. "\n";
		}
	}

?>
