<?php

    class CustomFO extends SplFileObject    {
    
        private $i=1;
    
        public function current()   {
    
            return $this->i++ . ": " .
            htmlspecialchars($this->getCurrentLine())."";
        }
    }
	
$SFI= new SplFileInfo( "C:\Users\admin\Desktop\FORUM\af-mb.txt" );

$SFI->setFileClass( "CustomFO" );

$file = $SFI->openFile( );

echo "<pre>";

foreach( $file as $line )   {
    echo $line;
}

/* Output:

1: ftp access (filezilla)
2: 
3: host: www.af-mb.de or try rather ftp.strato.com
4: 
5: Benutzername: ftp_test99@af-mb.de
6: 
7: passwort: Ronaldo17
8: **************************************************************
9: email:admin@af-mb.de
10: password:Ronaldo17
11: 
12: 
13: E-Mail Adresse 	admin@afmb.de 	Zum STRATO Communicator
14: IMAP-Server 	imap.strato.de 	 
15: POP-Server 	pop3.strato.de 	 
16: SMTP-Server 	smtp.strato.de (erfordert Authentifizierung) Hilfe 	 
17: 18: 19: 20: 	 
21: Spamschutz 	Betreff von Spam-Mails im Posteingang markieren
22: ----------------------------------------------------------------------------------
23: email: user1@af-mb.de
24: password:password1
25: 
26: email: user2@af-mb.de
27: password:password2
28: 
29: email: user3@af-mb.de
30: password:password3
31: 
32: email: user4@af-mb.de
33: password:password4
34: 
35: email: user5@af-mb.de
36: password:password5
37: 
38: email: user6@af-mb.de
39: password:password6
40: 
41: email: user7@af-mb.de
42: password:password7
43: 
44: email: user8@af-mb.de
45: password:password8
46: 
47: email: user9@af-mb.de
48: password:password9
49: -----------------------------------------------------------------------------------------

*/

?>
