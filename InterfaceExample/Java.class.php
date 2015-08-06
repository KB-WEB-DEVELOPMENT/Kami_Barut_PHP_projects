<?php

	class Java implements Dotsyntax, Compiled {
		
		public function __construct() {
		
			echo "Java was created ";
			
			$this->UsesDotSyntax()
		}
		
		public function UsesDotSyntax() {
		
			echo "during java times.";
		
		}
		
		public function IsCompiled() {
		
		}
		
	}
?>
