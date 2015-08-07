<?php

//PlayerPrototype.php

  abstract class PlayerPrototype {

    protected $player_name;
    protected $position;

    abstract function __clone();

	function setPlayerName($player_name) {$this->player_name = $player_name;}
	
	function getPlayerName() {return $this->player_name;}
    
	function setPlayerPosition($position) {$this->position = $position;}
	
	function getPlayerPosition() {return $this->position;}
    
    function getClub() {return $this->club;}

  }

//RealMadridPlayerPrototype.php

  include_once('PlayerPrototype.php');

  class RealMadridPlayerPrototype extends PlayerPrototype {

    function __construct() {
      $this->club = 'Real Madrid';
    }

    function __clone() {
    }


  }

//FCBarcelonaPlayerPrototype.php

 include_once('PlayerPrototype.php');

  class FCBarcelonaPlayerPrototype extends PlayerPrototype {

    function __construct() {
      $this->club = 'FC Barcelona';
    }

    function __clone() {
    }


  }

//testPrototype.php

  include_once('RealMadridPlayerPrototype.php');
  include_once('FCBarcelonaPlayerPrototype.php');

  $standardMadridPlayer = new RealMadridPlayerPrototype();
  $standardBarcelonaPlayer = new FCBarcelonaPlayerPrototype();

  $newPlayer1 = clone $standardMadridPlayer;
  $newPlayer1->setPlayerName('Karim Benzema');
  $newPlayer1->setPlayerPosition('forward');
  
  echo  $newPlayer1->getPlayerName() . "plays" . $newPlayer1->getPlayerName() . "for" . $newPlayer1->getClub(); 
  
  // Karim Benzema plays forward for Real Madrid
  
  $newPlayer2 = clone $standardBarcelonaPlayer;
  $newPlayer2->setPlayerName('Robert Rakitic');
  $newPlayer2->setPlayerPosition('midfield');
  
  echo  $newPlayer1->getPlayerName() . "plays" . $newPlayer1->getPlayerName() . "for" . $newPlayer1->getClub();

  // Robert Rakitic plays midfield for FC Barcelona

?>
