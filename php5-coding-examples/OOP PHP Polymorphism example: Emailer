<?php

//include("class.emailer.php");
//include("class.extendedemailer.php");
//include("class.htmlemailer.php");

class Emailer   {

    private $sender;
    private $recipients;
    private $subject;
    private $body;

    function __construct($sender)   {
        $this->sender = $sender;
        $this->recipients = array();
    }

    public function addRecipients($recipient)   {
        array_push($this->recipients, $recipient);
    }

    public function setSubject($subject)    {
        $this->subject = $subject;
    }

    public function setBody($body)  {
        $this->body = $body;
    }

    public function sendEmail()     {
        foreach ($this->recipients as $recipient)   {
            $result = mail($recipient, $this->subject, $this->body,"From: {$this->sender}\r\n");

                if ($result) echo "Mail successfully sent to {$recipient}<br/>";
            }
    }
}

class HtmlEmailer extends emailer	{

	public function sendHTMLEmail()	{

		foreach ($this->recipients as $recipient)	{

			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: {$this->sender}' . "\r\n";

			$result = mail($recipient, $this->subject, $this->body,$headers);

			if ($result) echo "HTML Mail successfully sent to {$recipient}<br/>";
		}
	}
}

class ExtendedEmailer extends emailer {
    
    function _construct() {}
        
        public function setSender($sender) {
            
            $this->sender= $sender;    
        }
        
}


$emailer = new Emailer("hasin@somewherein.net");

$extendedemailer = new ExtendedEmailer("hasin@somewherein.net");

$htmlemailer = new HtmlEmailer("hasin@somewherein.net");

if ($extendedemailer instanceof emailer )
echo "Extended Emailer is Derived from Emailer.<br/>"; // output: Extended Emailer is Derived from Emailer. (direct class extension)

if ($htmlemailer instanceof emailer )
echo "HTML Emailer is also Derived from Emailer.<br/>"; // output: HTML Emailer is also Derived from Emailer. (example of polymorphism)

if ($emailer instanceof htmlEmailer )
echo "Emailer is Derived from HTMLEmailer.<br/>"; // no output

if ($htmlemailer instanceof extendedEmailer )
echo "HTML Emailer is Derived from Emailer.<br/>"; // no output

?>
