<?php 

	// PHP polymorphism example 4 files: Settings.php , libs/Emailer.php, libs/Messages.php, index.php

	class Settings {

		protected function __construct()	{
		
			self::Make();
		}

		public function Make()	{
		
			$this->site_email = 'kamibarut@yahoo.com';
			$this->site_name = 'Kami Barut-Wanayo';
			$this->user_id = '23';
		}
		
	}
	
	/* *********************************   */

	class Emailer extends Settings	{

		private $msg;
		private $subj;
		
		public function __construct	{
			parent::__construct();
		}

		public function generateMsg($msg, $subj)	{
			$this->msg = $msg;
			$this->subj = $subj;
		}

		public function sendMsg()	{
			if (!empty($this->msg))
			return "Message from: {$this->site_name}
			<br/>User ID: {$this->user_id}";
		}
		else
		return "Nothing was typed";
		
	}
	
	/* *********************************   */
		
	class Messages  extends Settings {
	
		private $post;
		
		public function __construct	{
		
			parent::__construct();
		
		}
		
		public function createMsg($str)	{
		
				$this->post = $str;
		
		}

		public function postMsg()	{
		
			return "{$this->site_name} / {$this->site_email} /{$this->user_id}: {$this->post}";
		
		}
		
	}


	/******************************  */

	// index.php

	function __autoload($class)		{
	
		require_once('libs/' . $class . '.php');
	}
	
	$email = new Emailer();
	$email->generateMsg("How are you?", "Good");
	echo $email->sendMsg();
	
	$msg = new Messages();
	$msg->createMsg("Hi there");
	echo $msg->postMsg();
		
?>
