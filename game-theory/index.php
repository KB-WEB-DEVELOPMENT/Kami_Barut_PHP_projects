<?php

require_once('Character.class.php');
require_once('Character/Wolf.class.php');
require_once('Character/Dragon.class.php');
require_once('Character/Human.class.php');

$character = new Character(); //output: the character was created

$character2 = new Dragon(100, 200, 3000);

$character2->attack(); //output: we attacked for 200

?>
