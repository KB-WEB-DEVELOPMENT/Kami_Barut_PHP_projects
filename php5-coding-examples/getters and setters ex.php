<?php

	class Store	{
		
		protected	$name; // should not be public
		protected	$id;   // should not be public
		
		public function setName($name, $value)	{

			$this->{$name} = $value;
				
			//if (ctype_alnum($name) == true)
			
			//(die('The name of the store should only contain letters');
			
			//$this->name = $name;
		}
		
		public function get($var)	{

			return $this->{$var};
		}
	
		public function __get($var)	{

			echo "This doesn't exist.";
		}
	
	}
	
	class Branch extends Store	{

		protected $branchId;
	
		public function __construct()	{

				
			}
	}
		
$branch = new Branch();
$branch->set("Store", "Doggy store");
$branch->set("branchId", "742368");
echo $branch>get("Store"); 
echo $branch>get("branchId"); 
echo $branch>get("eee");

/*output : Doggy store742368This doesn't exist. */
	
?>
