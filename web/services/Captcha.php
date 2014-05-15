<?php
class Captcha {
  private $result;
	private $numberWord = array('Zero','One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine');
	private $symbol = array('', '+', '*', '-');

	public function getCaptcha($pattern, $leftOperand, $operator, $rightOperand) {
		$result = $this->calculate($operator, $leftOperand, $rightOperand);
		$leftOperand = ($pattern == 1) ?  $this->numberWord[$leftOperand] : $leftOperand;
		$rightOperand = ($pattern == 2) ? $this->numberWord[$rightOperand] : $rightOperand;
		$this->result = sprintf('%s %s %s = %d', $leftOperand, $this->symbol[$operator], $rightOperand, $result);	
    return $this->result;
	}

	private function calculate($operator, $leftOperand, $rightOperand) {
		switch ($operator) {
			case 1: return $leftOperand + $rightOperand;
			case 2: return $leftOperand * $rightOperand;
			case 3: return $leftOperand - $rightOperand;
		}	
	}

  function toString() {
    return $this->result;
  }
}
