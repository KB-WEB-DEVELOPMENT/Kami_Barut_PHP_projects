<?php

// parsing the xml file with SimpleXML - notice not everything is parsed

$str = <<< END

<emails>
    <email>
        <from>nowhere@notadomain.tld</from>
        <to>unknown@unknown.tld</to>
        <subject>there is no subject</subject>
        <body><![CDATA[is it a body? oh ya, with some texts & symbols]]></body>
    </email>
</emails>

END;

$sxml = simplexml_load_string($str);

print_r($sxml);

//   output:   SimpleXMLElement Object ( [email] => SimpleXMLElement Object
//( [from] => nowhere@notadomain.tld [to] => unknown@unknown.tld [subject] => there is no subject [body] => SimpleXMLElement Object ( ) ) )


?>
