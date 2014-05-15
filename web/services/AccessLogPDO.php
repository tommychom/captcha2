<?php
class AccessLogPDO
{
	
	private $pdo;
	
	public function count() {
		$stm = $this->pdo->query("SELECT COUNT(*) cnt from access_log;");
		$res = $stm->fetch();
		return $res['cnt'];
	}
	
	public function create($data) {
		$fields = implode(',', array_keys($data));
		$value = implode(',', array_fill(1, count($data), '?'));
		$stm = $this->pdo->prepare("INSERT INTO access_log($fields) VALUES($value)");
		$stm->execute(array_values($data));
	}
	
	public function AccessLogPDO($pdo) {
		$this->pdo = $pdo;
	}
}
