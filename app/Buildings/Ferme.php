<?php 

namespace Buildings;

/**
* 
*/
class Ferme
{
	private $RatioProd = 1.7;
	private $ProductionBase = 130;
	private $ProductionCourante;

	private $RatioPrix = 2;
	private $PrixBoisBase = 200;
	private $PrixBoisCourant;
	private $PrixNourritureBase = 100;
	private $PrixNourritureCourant;

	private $RatioTemps = 1.5;
	private $TempsBase = 6;
	private $TempsCourant;

	private $Niveau = 0;

	public function SetProd () {
		if ($this->Niveau !== 0) {
			$this->ProductionCourante = round($this->ProductionBase * pow($this->RatioProd, ($this->Niveau - 1)) + $this->ProductionBase);
		} else {
			$this->ProductionCourante = $this->ProductionBase;
		}
	}

	public function GetProd () {
		return $this->ProductionCourante;
	}

	public function SetPrix () {
		if ($this->Niveau !== 0) {
			$this->PrixBoisCourant = round($this->PrixBoisBase * pow($this->RatioPrix, ($this->Niveau - 1)) + $this->PrixBoisBase);
		} else {
			$this->PrixBoisCourant = $this->PrixBoisBase;
		}

		if ($this->Niveau !== 0) {
			$this->PrixNourritureCourant = round($this->PrixNourritureBase * pow($this->RatioPrix, ($this->Niveau - 1)) + $this->PrixNourritureBase);
		} else {
			$this->PrixNourritureCourant = $this->PrixNourritureBase;
		}
	}

	public function GetPrixBois () {
		return $this->PrixBoisCourant;
	}

	public function GetPrixNourriture () {
		return $this->PrixNourritureCourant;
	}

	public function SetTemps () {
		if ($this->Niveau !== 0) {
			$this->TempsCourant = round($this->TempsBase * pow($this->RatioTemps, ($this->Niveau - 1)) + $this->TempsBase);
		} else {
			$this->TempsCourant = $this->TempsBase;
		}
	}

	public function GetTemps () {
		return $this->TempsCourant;
	}
}

$ferme = new Ferme();
$ferme->SetProd();
var_dump($ferme->GetProd());

$ferme->SetPrix();
var_dump($ferme->GetPrixBois());
var_dump($ferme->GetPrixNourriture());

$ferme->SetTemps();
var_dump($ferme->GetTemps());