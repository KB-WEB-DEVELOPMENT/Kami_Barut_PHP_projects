<?php

// ALL EXERCISES FROM BOOK: PRACTICAL PHP TESTING : http://www.giorgiosironi.com/2009/12/practical-php-testing-is-here.html

// ex 1.1 (purposely failing test)

	class FactorialTest extends  PHPUnit_Framework_TestCase	{

		public function  testFactorialCalculation($factorial)	{
		
			$this->assertTrue(0 == $factorial);	
		}
	}
?>

<?php
// ex 1.2

	class FactorialTest extends  PHPUnit_Framework_TestCase	{

		protected $factorial;
		protected $computation;
	
		public function  testFactorialCalculationFor1()	{
		
			$this->computation = 1;
			$this->factorial = $computation;
		
			$this->assertTrue($computation == $factorial);	
		}
	
		public function  testFactorialCalculationFor4()	{
		
			$this->computation = 4*3*2*1;
			$this->factorial = $computation;
		
			$this->assertTrue($computation == $factorial);	
		}
	
		public function  testFactorialCalculationFor20()	{
		
			$this->computation = 20*19*18*17*16*15*14*13*12*11*10*9*8*7*6*5*4*3*2*1;
			$this->factorial = $computation;
		
			$this->assertTrue($computation == $factorial);	
		}
	
	}	
?>

<?php
// ex 1.3

	class Factorial {
	
		function factorialCalc($number) { 

			if ($number < 2) { 
				return 1; 
			} else { 
				return ($number * factorialCalc($number-1)); 
			} 
		}
	}
	
?>

<?php
// ex 2.1

// answer: it actullay works.

// failing test case: 

		public function  testFactorialCalculationFor0Fails()	{
		
			$this->computation = 0;
			$this->factorial = 1;
		
			$this->assertTrue($computation == $factorial);	
		}

// ex 2.2: same as ex 1.3		
				
?>

<?php
// ex 3.1 a)
	class SingleArgumentTest extends  PHPUnit_Framework_TestCase	{

		public function testEmptyArrayIsNotIteratedOver()	{
		
			$iterator = new ArrayIterator(array());
			foreach ($iterator as $element) {
				$this->fail();
			}		
		}
		
		public function testIteratesOverOneElementArraysUsingValues()	{
		
			$iterator = new ArrayIterator(array("foo"));
			foreach ($iterator as $element) {
				$this->assertEquals("foo", $element);
			}
				
		}

		public function testIteratesOneTimeOverOneElementArrays()	{
		
			$iterator = new ArrayIterator(array("foo"));
			$i=0;
			foreach ($iterator as $element) {
				$i++;
			}
			$this->assertEquals(1, $i);
		}

		public function testIteratesOverAssociativeArrays()	{
		
				$iterator = new ArrayIterator(array("foo" => "bar"));
				$i=0;
				foreach ($iterator as $key => $element) {
				$i++;
				$this->assertEquals("foo", $key);
				$this->assertEquals("bar", $element);
			}
			$this->assertEquals(1, $i);
		}
		
	}

// ex 3.1 b) - production class

	class SingleArgument	{

		public $key;
		public $value;
		public $arr = array();
		
		public function __construct($value)  {
		
		$this->key = "foo";
		$this->value = $value; 
		$this->arr= array($key => $value);
		
		}
		
		public function  getSingleArgument()	{
		
			return $arr[$key];
		}		
	}
	
	
?>


<?

// ex 3.2
	class SortingIntegersTest extends  PHPUnit_Framework_TestCase	{

		public function testEmptyArrayIsNotSortedOver()	{
		
			$iterator = new ArrayIterator(array());
			foreach ($iterator as $element) {
				$this->fail();
			}		
		}

		public function testSortsOverOneInteger()	{
		
			$iterator = new ArrayIterator(array(5));
			$siterator = sort($iterator);		

			foreach ($siterator as $element) {
				$this->assertEquals(5, $element);
			}
				
		}
	
		public function testSortingOneTime()	{
		
			$iterator = new ArrayIterator(array(20,11,4,12));
			$siterator = sort($iterator);	
			$i=0;
			
			foreach ($siterator as $element) {
				$i++;
			}
			$this->assertEquals(4, $i);
		}
	
		public function biggestSortingValue()	{
		
			$iterator = new ArrayIterator(array(26,11,4,12));
			$siterator = sort($iterator);	
		
			$this->assertEquals(26, $siterator[3]);
		}
		
		public function smallestSortingValue()	{
		
			$iterator = new ArrayIterator(array(20,11,3,12));
			$siterator = sort($iterator);	

			$this->assertEquals(3, $siterator[0]);
		}
	
	
	}
		
?>

<?

// ex 4.1 & 4.2

class SortingIntegersWithFixtureTest extends  PHPUnit_Framework_TestCase	{

	private $_iterator;
	private $_sortedIterator;
	
	public function setUp()	{
	
		$this->_iterator = new ArrayIterator(array(9,3,28,11,26,2,25000,39,99,11,10,129));
		$this->_sortedIterator = sort($_iterator);
	}

	public function testIteratorNotEmpty()	{
	
			$this->assertNotNull($_sortedIterator);
	}
	
	public function testBiggestSortingValue() {
	
		$this->assertEquals(25000, $_sortedIterator[8]);
	}
	
	public function testSmallestSortingValue() {
	
		$this->assertEquals(2, $_sortedIterator[0]);
	}
	
?>

<?

// ex 5.1 - add additional method Exception p.32 for errors checking

class SortingIntegersWithDataProvider extends  PHPUnit_Framework_TestCase	{

	private $_iterator;
	private $_sortedIterator;
	
		
	public static function IteratedValues()	{
	
		$this->_iterator = new ArrayIterator(array(9,3,28,11,26,2,25000,39,99,11,10,129));
		$this->_sortedIterator = sort($_iterator);
		
		return $_sortedIterator;
	}

	/**
	* @dataProvider IteratedValues
	*/
	public function testIteratorNotEmpty($_sortedIterator)	{
	
			$this->assertNotNull($_sortedIterator);
	}
	/**
	* @dataProvider IteratedValues
	*/
	public function testBiggestSortingValue($_sortedIterator) {
	
		$this->assertEquals(25000, $_sortedIterator[8]);
	}
	/**
	* @dataProvider IteratedValues
	*/
	public function testSmallestSortingValue($_sortedIterator) {
	
		$this->assertEquals(2, $_sortedIterator[0]);
	}

// ex 5.2 

class ObjectAnnotationTest extends  PHPUnit_Framework_TestCase	{

	public function testObjectCreationWorks()	{
	
		$obj = new stdClass();
		
		$this->assertTrue(isset($obj));
		return $obj;
	}
	/**
	* @depends testObjectCreationWorks
	*/
	public function testObjectAdditionWorks($fixture)	{
	
			$obj->foo = "bar";
			$this->assertTrue(isset($obj->foo));
	}
	/**
	* @depends testObjectCreationWorks
	*/
	public function testObjectContainsWorks($fixture)	{
	
			$this->assertContains('foo', $obj);
		
	}
	/**
	* @depends testObjectCreationWorks
	*/
	public function testObjectRemovalWorks($fixture)	{
	
		unset($obj);
		$this->assertFalse(isset($obj));
	}
}	
	
	
?>

<?

// ex 6.1 & ex 6.2 see book 

?>

<?
// ex 7.1

class FibonacciIterator implements Iterator { 
    private $previous = 1; 
    private $current = 0; 
    private $key = 0; 
    
    public function current() { 
        return $this->current; 
    } 
    
    public function key() { 
        return $this->key; 
    } 
    
    public function next() { 
        $newprevious = $this->current; 
        $this->current += $this->previous; 
        $this->previous = $newprevious; 
        $this->key++; 
    } 
    
    public function rewind() { 
        $this->previous = 1; 
        $this->current = 0; 
        $this->key = 0; 
    } 
    
    public function valid() { 
        return true; 
    } 
} 

$seq = new FibonacciIterator; 
$i = 0; 
foreach ($seq as $f) { 
    return $f; 
    //if ($i++ === 10) break; 
} 



// ex 7.2

class EvenFibonacciIterator  { 
  
	protected $_seq;
	protected $goodArr = array();
	protected $correctArr = array("0" => 0, "2" => 1, "4" => 3, "6" => 8, "8" => 21, "10" => 55);
	$i = 0;
	
	

	public function __construct(FibonacciIterator $seq) {
	
		$this->_seq = $seq;
	}
	
	// no limit
	public function printEvenFibonacciSequence($_seq) {
	
		foreach ($_seq as $f)	{
		
			if (($i%2) == 0) return $f;

		}
	}

	// needed for ex 7.3
	public function printLimitedEvenFibonacciSequence($_seq) {
	
		foreach ($_seq as $key => $val)	{
					
			if (($key%2) == 0) 
			$goodArr[ (string) $key] = $val;

			if ($i++ === 10) break; 
			}
		}		
		return $goodArr; //hopefully $goodArr("0" => 0, "2" => 1, "4" => 3, "6" => 8, "8" => 21, "10" => 55);
	
	}
	
	
}


// ex 7.3

 class EvenFibonacciIteratorTest extends PHPUnit_Framework_TestCase	{

	public function testProvidesFibonacciArrayKeysIterator()	{
	
		$evenFibonacciIteratorMock = $this->getMock('EvenFibonacciIterator');
		
		$evenFibonacciIteratorMock->expects($this->any())		
				                  ->method('printLimitedEvenFibonacciSequence')
								  ->will($this->returnValue());
		
		
        $this->assertEquals($goodArr, $correctArr);
	}

	
	
} 
?>

<?php

// ex 7.4
 public function testHttpClientLinkIsOk()
    {
        $response = array('code' => 200, 'headers' => '', 'body' => '');
        
        $httpClientMock = $this->getMock('HTTP_Client', array('currentResponse'));
        $httpClientMock->expects($this->any())
                       ->method('currentResponse')
                       ->will($this->returnValue($response));
                       
        $httpClientMockResponse = $httpClientMock->currentResponse();
        
        $this->assertEquals('200', $httpClientMockResponse['code']);       
    }
    
    public function testHttpClientLinkIsBroken()
    {
        $response = array('code' => 404, 'headers' => '', 'body' => '');
        
        $httpClientMock = $this->getMock('HTTP_Client', array('currentResponse'));
        $httpClientMock->expects($this->any())
                       ->method('currentResponse')
                       ->will($this->returnValue($response));
                       
        $httpClientMockResponse = $httpClientMock->currentResponse();
        
        $this->assertEquals('404', $httpClientMockResponse['code']);    
    }
?>	

<?php

// ex 8.1

class PermissionReader
{
    protected $_splFileInfo;
    
    public function __construct($splFileInfo = NULL)
    {
    	if ($splFileInfo === NULL)
        {
            throw new InvalidArgumentException('Missing argument');
        }
                
        if (!is_a($splFileInfo, 'SplFileInfo'))
        {
            throw new InvalidArgumentException('Invalid argument type');
        }
        
        $this->_splFileInfo = $splFileInfo;    
    }
    
    public function __toString()
    {
        return $this->_getStringPermissions();
    }
    
    protected function _getStringPermissions()
    {
        $permissions = $this->_splFileInfo->getPerms();
        $stringPermissions = '';
 
        // Owner
        $stringPermissions .= (($permissions & 0x0100) ? 'r' : '-');
        $stringPermissions .= (($permissions & 0x0080) ? 'w' : '-');
        $stringPermissions .= (($permissions & 0x0040) ? (($permissions & 0x0800) ? 's' : 'x' ) : (($permissions & 0x0800) ? 'S' : '-'));
        
        // Group
        $stringPermissions .= (($permissions & 0x0020) ? 'r' : '-');
        $stringPermissions .= (($permissions & 0x0010) ? 'w' : '-');
        $stringPermissions .= (($permissions & 0x0008) ? (($permissions & 0x0400) ? 's' : 'x' ) : (($permissions & 0x0400) ? 'S' : '-'));
        
        // Other
        $stringPermissions .= (($permissions & 0x0004) ? 'r' : '-');
        $stringPermissions .= (($permissions & 0x0002) ? 'w' : '-');
        $stringPermissions .= (($permissions & 0x0001) ? (($permissions & 0x0200) ? 't' : 'x' ) : (($permissions & 0x0200) ? 'T' : '-'));
        
        return $stringPermissions;
    }
}

class PermissionReaderTest extends PHPUnit_Framework_TestCase
{    
    public static function permissionValues()
    {
        // getPerms() returns permission in octal not decimal format so we convert the number
        return array
                   (
                       array(octdec(777), 'rwxrwxrwx'),
                       array(octdec(666), 'rw-rw-rw-'),
                       array(octdec(555), 'r-xr-xr-x'),
                       array(octdec(444), 'r--r--r--'),
                       array(octdec(754), 'rwxr-xr--'),
                       array(octdec(550), 'r-xr-x---')
                   );
    }
    
    /**
     * @dataProvider permissionValues
     */
    public function testFilesPermissions($permissionNumber, $permissionString)
    {
        $splFileInfoMock = $this->getMock('SplFileInfo', array('getPerms'), NULL, '', NULL);
        $splFileInfoMock->expects($this->once())
                        ->method('getPerms')
                        ->will($this->returnValue($permissionNumber)); // 16895
                        
        $permissionReader = new PermissionReader($splFileInfoMock);
        $this->assertEquals($permissionString, $permissionReader->__toString());
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testPermissionReaderThrowsExceptionOnNoArgument()
    {
        $permissionReader = new PermissionReader();
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testPermissionReaderThrowsExceptionOnInvalidArgumentType()
    {
        $permissionReader = new PermissionReader('string');
    }
}

?>

<?php 

// ex 9.1

// File:bootstrap.php
$phpUnitPath = '/usr/local/share/pear/PHPUnit/';
set_include_path(get_include_path() . PATH_SEPARATOR . $phpUnitPath);


// File: configuration.xml
<phpunit>
    <testsuite name="Practical PHP Testing Test Suite">
        <directory suffix="Test.php">../</directory>
    </testsuite>
</phpunit>

// run
phpunit --bootstrap bootstrap.php --configuration=configuration.xml --coverage-html report/

?>

<?php

// ex 11.1

class Calculator
{
    public static function sqrt($number = NULL)
    {
        if ($number === NULL)
        {
            throw new InvalidArgumentException('Missing argument');
        }
        
        if (!is_numeric($number))
        {
            throw new InvalidArgumentException('Argument is not a number');
        }
        
        $i = 0;
        while (TRUE)
        {
            $result = pow(++$i, 2);
            
            if ($result == $number)
            {
                break;
            }
            else if ($result > $number)
            {
                $i = (abs($number - pow($i - 1, 2)) < abs($number - $result)) ? $i - 1: $i;
                break;
            }
        }
        
        return $i;
    }
}

require_once 'PHPUnit\Framework\TestCase.php';

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testCalculatorThrowsExceptionOnNoArgument()
    {
        Calculator::sqrt();
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testCalculatorThrowsExceptionOnInvalidArgumentType()
    {
        Calculator::sqrt('string');
    }
    
    public function testCalculateSquareRootOfNumber36()
    {
        $this->assertEquals(6, Calculator::sqrt(36));
    }
    public static function squareRootValues()
    {
        return array
                (
                    array(1, 1),
                    array(4, 2),
                    array(9, 3),
                    array(16, 4),
                    array(25, 5),
                    array(36, 6),
                    array(49, 7),
                    array(64, 8),
                    array(81, 9),
                    array(100, 10)
                );
    }
    
    /**
     * @dataProvider squareRootValues
     */
    public function testSquareRootIsCalculactedCorrectly($number, $squareRoot)
    {
        $this->assertEquals($squareRoot, Calculator::sqrt($number));
    }
    
    public static function squareRootRoundedValues()
    {
        return array
                   (
                       array(26, 5),
                       array(27, 5),
                       array(28, 5),
                       array(29, 5),
                       array(30, 5),
                       array(31, 6),
                       array(32, 6),
                       array(33, 6),
                       array(34, 6),
                       array(35, 6)
                   );
    }
    
    /**
     * @dataProvider squareRootRoundedValues
     */
    public function testSquareRootIsRoundedCorrectly($number, $squareRoot)
    {
        $this->assertEquals($squareRoot, Calculator::sqrt($number));
    }
}

?>





