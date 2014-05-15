<?php
date_default_timezone_set('UTC');
class LoggerTest extends PHPUnit_Extensions_Database_TestCase
{
	
	/**
	 * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
	 */
	public function getConnection() {
		try {
			$this->pdo = new PDO('sqlite:memory');
			$this->createTable($this->pdo);
			$this->truncateAutoIncrement($this->pdo);
			return $this->createDefaultDBConnection($this->pdo, ':memory:');
		}
		catch(PDOException $e) {
		}
	}
	
	/**
	 * @return PHPUnit_Extensions_Database_DataSet_IDataSet
	 */
	public function getDataSet() {
		return new PHPUnit_Extensions_Database_DataSet_YamlDataSet(dirname(__FILE__) . "/access_log.yml");
	}
	
	public function createTable(PDO $pdo) {
		$query = "
    	CREATE TABLE access_log (
    		id INTEGER PRIMARY KEY AUTOINCREMENT,
    		ip varchar(15) NOT NULL,
    		access_time datetime,
    		response_time decimal(7,4),
    		service_url varchar(50) NOT NULL DEFAULT 0
    		);
		";
		$pdo->query($query);
	}
	
	public function testCountRow() {
		$accessLogPdo = new AccessLogPDO($this->pdo);
		$result = $accessLogPdo->count();
		$this->assertEquals(2, $result);
	}
	
	public function truncateAutoIncrement(PDO $pdo) {
		$query = "delete from sqlite_sequence where name='access_log';";
		$pdo->query($query);
	}
	
	public function testInsert() {
		$accessLogPdo = new AccessLogPDO($this->pdo);
		$actualId = $accessLogPdo->create(['ip' => "192.168.0.1", "access_time" => "2010-04-26 12:14:20", "response_time" => 00.0020, "service_url" => "/api/v3/captcha"]);
		$this->assertEquals(3, $accessLogPdo->count());
	}
}
