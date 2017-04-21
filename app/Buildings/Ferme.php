<?php 

namespace Buildings;

/**
* 
*/
class Ferme
{
	private $RatioPrix = 2;
	private $RatioProd = 1.7;
	private $ProductionBase = 130;
	private $ProductionCourante;
	private $Niveau = 10;

	public function SetProd () {
		if ($this->Niveau !== 0) {
			$this->ProductionCourante = round($this->ProductionBase * pow($this->RatioProd, ($this->Niveau - 1)));
		}
	}

	public function GetProd () {
		return $this->ProductionCourante;
	}
}