<?php

class WordCounter	{

	const ASC=1; //you need not use $ sign before Constants
	const DESC=2;
	private $words;

	
	function __construct($filename)	{

		$file_content = file_get_contents($filename);
		$this->words =(array_count_values(str_word_count(strtolower($file_content),1)));
	}
	
	
	public function count($order)	{

		if ($order==self::ASC) 
		asort($this->words);

		else if($order==self::DESC) 
		arsort($this->words);

		foreach ($this->words as $key=>$val) echo $key ." = ". $val."<br/>";
	}
}

$wordcounter = new Wordcounter('test.txt');

$wordcounter->count(WordCounter::DESC); // can use also $wordcounter->count(1); and $wordcounter->count("1"); both work !!!!

/* output:

family = 6
barut = 4
seba = 1
johns = 1

*/

?>
