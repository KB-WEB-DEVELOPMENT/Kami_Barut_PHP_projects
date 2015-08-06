# Kami Barut-Wanayo --  web developer 
#
# PHP projects : www.kamibarut.de


Sample: OOP PHP composition and coupling Structure Modeling

<?php

// 1. CLIENT 2. FORM 3. VALIDATE

/* ***********************************  */

// 1. CLIENT

$formObj = new Form();
$validatorObj = new Validate();

$formObj->post['name'];
$formObj->post['age'];
$formObj->number['age'];


// 2. FORM

class Form	{
		
		public function post($postObj)	{
		
			$this->{$postObj} = $_POST[$postObj];
		}

	}
	
// 3. VALIDATE

class Validate	{
		
	public function number($postObj)	{
		
			if (!ctype_alnum($postObj)
			return false;
		}
		
	public function _call($postObj)	{
		
			throw new Exception("The method does not exist: $postObj");
		}	
		
}
	
?>



