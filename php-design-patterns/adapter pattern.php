<?php

//Player.class.php
  
  class Player {

    private $name;
    private $club;

    function __construct($name_in, $club_in) {
      $this->name = $name_in;
      $this->club  = $club_in;
    }

    function getName() {return $this->name;}

    function getClub() {return $this->club;}

  }

 // PlayerAdapter.class.php 
  include_once('Player.class.php');
  
  class PlayerAdapter {

    private $player;

    function __construct(Player $player_in) {
	
      $this->player = $player_in;
    }

    function getNameAndClub() {
      return $this->player->getName() . 'plays for' . $this->player->getClub();
    }


  }

//testPlayerAdapter.php

 include_once('Player.class.php');
 include_once('PlayerAdapter.class.php');

 $player = new Player("Neymar","FC Barcelona");
  
 $playerAdapter = new PlayerAdapter($player);
  
 echo 'INFORMATION ABOUT PLAYER AND CLUB: ' . $bookAdapter->getAuthorAndTitle(); 
 
 // output: INFORMATION ABOUT PLAYER AND CLUB: Neymar plays for FC Barcelona 

?>
