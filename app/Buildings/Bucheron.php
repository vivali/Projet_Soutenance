<?php 

namespace Buildings;

/**
*
*/
class Bucheron
{
	private $RatioProd = 1.8;
	private $ProductionBase = 200;
	private $ProductionCourante;
	
	private $RatioPrix = 2;
	private $PrixBoisBase = 200;
	private $PrixBoisCourant;

	private $RatioTemps = 1.5;
	private $TempsBase = 5;
	private $TempsCourant;

	private $Niveau = 0;

	public function __construct () {
		$this->Niveau = $_SESSION["buildings"]->wood_farm;
		$this->SetProd();
		$this->SetPrix();
		$this->SetTemps();
	}

	public function SetProd () {
		if ($this->Niveau != 0) {
			$this->ProductionCourante = (round($this->ProductionBase * pow($this->RatioProd, ($this->Niveau - 1)) + $this->ProductionBase)) / 3600;
		} else {
			$this->ProductionCourante = $this->ProductionBase;
		}
	}

	public function GetProd () {
		return $this->ProductionCourante;
	}

	public function SetPrix () {
		if ($this->Niveau != 0) {
			$this->PrixBoisCourant = round($this->PrixBoisBase * pow($this->RatioPrix, ($this->Niveau - 1)) + $this->PrixBoisBase);
		} else {
			$this->PrixBoisCourant = $this->PrixBoisBase;
		}
	}

	public function GetPrixBois () {
		return $this->PrixBoisCourant;
	}

	public function SetTemps () {
		if ($this->Niveau != 0) {
			$this->TempsCourant = round($this->TempsBase * pow($this->RatioTemps, ($this->Niveau - 1)) + $this->TempsBase);
		} else {
			$this->TempsCourant = $this->TempsBase;
		}
	}

	public function GetTemps () {
		return $this->TempsCourant;
	}
}




// $bucheron = new Bucheron();
// $bucheron->SetProd();
// var_dump($bucheron->GetProd());

// $bucheron->SetPrix();
// var_dump($bucheron->GetPrix());

// $bucheron->SetTemps();
// var_dump($bucheron->GetTemps());