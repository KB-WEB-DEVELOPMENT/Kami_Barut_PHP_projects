<?php

  	class Base {
  		
  		static function Show() {
  		
  		echo __FILE__.'('.__LINE__.'):'.__METHOD__."<br/>";
  		
  			
  		}
  	}
  
  	class Object extends Base {
  
  		static function myuse() {
  		
  		Self::Show();
  		Parent::Show();
  	}
  
  		static function Show() {
  
  			echo __FILE__.'('.__LINE__.'):'.__METHOD__."<br/>";
  		}
  	}
  
  	Base::Show();
  
  	Object::myuse();
  
  	Object::Show();
  
  	/* output
  
  	/home/cg/root/main.php(7):Base::Show
  
  	/home/cg/root/main.php(23):Object::Show
  
  	/home/cg/root/main.php(7):Base::Show
  
  	/home/cg/root/main.php(23):Object::Show
  
  
  	*/

?>
