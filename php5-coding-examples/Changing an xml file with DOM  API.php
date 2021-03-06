<?php

$uri = "sxml.xml";

$document = new DOMDocument();

$document->loadHTMLFile($uri);	// load the content of this URL as HTML

$h1s = $document->getElementsByTagName("h1");	//find all h1 elements

$newText = $document->createElement("h1","New Heading");	//created a new h1 element

$h1s->item(0)->parentNode->insertBefore($newText,$h1s->item(1));	 //insert before the existing h1 element

//$h1s->item(0)->parentNode->removeChild($h1s->item(1));	//remove the old h1 element

echo $document->saveHTML();  //display the content as HTML

/* Output:

title1

New Heading

title2

title3

*/

?>
