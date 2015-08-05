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
		*    reads uri, checks against known routes, routes to correct url or '/'
		* 
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
