<?php

require_once('Smarty-2.6.26/libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = "views";
$smarty->compile_dir = "tmp";

required_once("header.php"); // if needed

$smarty->display("index.tpl");

$infos = array(

	"First name:'" =>"Kami",
	"Last name:'"=>"Barut-Wanayo",
	"Location:'"=>"Munich",
	"Country:'"=>"Germany"
);

$date = "03-8-2015";
$someconstant = "someconstant";

$smarty->assign("people", $infos);
$smarty->assign("date", $date);
$smarty->assign("someconstant", $someconstant);
	
$smarty->display("index.tpl");

?>
