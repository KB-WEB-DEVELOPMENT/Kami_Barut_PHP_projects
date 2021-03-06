<?php 
	
	class Route	{
		
		private $_uri = array();
		private $_method = array();
		/**
		* Builds a collection of internal URL's to look for
		* @param type $url
		*/
		public function add($uri, $method = null)	{
			
			 $this->_uri[] = '/' . trim($uri, '/');
		
		          if ($method != null)	{
			
			$this->_method[] =  $method;
		}
			
	}
		
		/**
		*    reads uri, checks the uri, in the case the last if statement is true, instantiates 
		*    one of the three classes. In the case it is false, calls one the three callback functions in index.php
		*/
		
		public function submit()	{
			
			$uriGetParam = $isset(GET['uri']) ? $_GET['uri'] : '/';
				
			foreach  ($this->_uri as $key => $value)	{
					
				if (preg_match("#^$value$#", $uriGetParam)) {
							
					if (is_string($this->_method[$key]))	{
								
						$useMethod = $this->_method[$key];
						new $useMethod();
					}										
					else {					
						call_user_func($this->_method[$key]);	
					}						
				}
			}
		}			
	}	
?>
