<?php
function numberToString($pattern, $leftOperand, $operator, $rightOperand){
	$numberWord = array('Zero','One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine');
	$operatorSymbol = array('', '+', '*', '-');
	$result = calculate($leftOperand, $operator, $rightOperand);
	$leftOperand = ($pattern == 1) ?  $numberWord[$leftOperand] : $leftOperand;
	$rightOperand = ($pattern == 2) ? $numberWord[$rightOperand] : $rightOperand;
	return sprintf('%s %s %s = %d', $leftOperand, $operatorSymbol[$operator], $rightOperand, $result);
}

function calculate($leftOperand, $operator, $rightOperand) {
	switch ($operator) {
		case 1: return $leftOperand + $rightOperand;
		case 2: return $leftOperand * $rightOperand;
		case 3: return $leftOperand - $rightOperand;
	}
}