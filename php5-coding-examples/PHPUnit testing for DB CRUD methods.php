<?php

require_once "PHPUnit/Framework/TestCase.php";

class DBTester extends PHPUnit_Framework_TestCase	{

private $connection;
private $Db;

	protected function setup()	{

		$this->Db = new DB();
		$this->connection = mysql_connect("localhost","root","root1234");
		mysql_select_db("abcd",$this->connection);
	}

	protected function tearDown()	{
		mysql_close($this->connection);
	}

	public function testValidInsert() {

		$data = array("name"=>"afif","pass"=>md5("hello world"));

		mysql_query("delete from users");

		$result = $this->Db->insertData($data);

		$this->assertNotNull($result);

		$affected_rows = mysql_affected_rows($this->connection);

		$this->assertEquals(1, $affected_rows);
	}

	public function testInvalidInsert()		{

		$data = array("names"=>"afif","passwords"=>md5("hello world"));

		mysql_query("delete from users");

		$result = $this->Db->insertData($data);

		$this->assertNotNull($result);

		$affected_rows = mysql_affected_rows($this->connection);

		$this->assertEquals(-1, $affected_rows);
		
	}

	public function testUpdate()	{

		$data = array("name"=>"afif","pass"=>md5("hello world"));

		mysql_query("truncate table users");

		$this->Db->insertData($data);

		$data = array("name"=>"afif2","pass"=>md5("hello world"));

		$result = $this->Db->updateData(1, $data);

		$this->assertNotNull($result);

		$affected_rows = mysql_affected_rows($this->connection);

		$this->assertEquals(1, $affected_rows);

	}

	public function testDelete()	{

		$data = array("name"=>"afif","pass"=>md5("hello world"));

		mysql_query("truncate table users");

		$this->Db->insertData($data);

		$result = $this->Db->deleteData(1);

		$this->assertNotNull($result);

		$affected_rows = mysql_affected_rows($this->connection);

		$this->assertEquals(1, $affected_rows);
	}

}
?>
