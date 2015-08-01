<?php

// html file created by DOM API

$doc = new DOMDocument("1.0","UTF-8");

$html = $doc->createElement("html");

$body = $doc->createElement("body");

$h1 = $doc->createElement("h1","OOP with PHP");

$h1->setAttribute("id","firsth1");

$p = $doc->createElement("p");

$p->appendChild($doc->createTextNode("Hi - how about some text?"));

$body->appendChild($h1);

$body->appendChild($p);

$html->appendChild($body);

$doc->appendChild($html);

echo $doc->saveHTML();

/*  output:

#document
<html>
	<head></head>
	<body>
		<h1 id="firsth1">OOP with PHP</h1>
		<p>Hi - how about some text?</p>
	</body>
</html>

*/

?>
