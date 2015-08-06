<?php

	class Player	{
			
		public function __construct(array $info)	{

		$this->Data = $info;
		}

	}
	
	abstract class Player_Decorator {
	
		abstract public function Add($int);
	}
	
	class Player_Str_Decorate extends Player_Decorator	{
			
		public function __construct(Player $p)	{

			$this->Player = $p;
			$this->Player->Data['str'] +=5;
		}
		
	}
	
	class Player_Dex_Decorate extends Player_Decorator	{
			
		public function __construct(Player $p)	{

			$this->Player = $p;
			$this->Player->Data['dex'] +=25;
		}
	
		public function Add($int)	{

			$this->Player->Data['dex'] +=$int;
		}

	
	}
	
$p = new Player(array('str' => '10', 'dex' => 15));

echo $p->Data // array
echo $p->Data['str']; // 10

$str = new Player_Str_Decorate($p);
echo $str->Player->Data['str']; // 105

$dex = new Player_Dex_Decorate($p);
echo $dex->Player->Data['dex']; // 40
echo $dex->Add(5); //45

?>
