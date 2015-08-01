<?php

//class.testwordcount.php

require_once "PHPUnit/Framework/TestCase.php";

require_once "class.WordCount.php";

class TestWordCount extends PHPUnit_Framework_TestCase	{

	public function testCountWords()	{

		$Wc = new WordCount();
		
		$TestSentence = "my name is afif";
		
		$WordCount = $Wc->countWords($TestSentence);
		
		$this->assertEquals(4,$WordCount);
	}
}

?>
