<?php 

namespace Buildings;

/**
* 
*/
class Mur
{
	private $RatioDef = 2.5;
	private $DefBase = 5000;
	private $DefCourant;

	private $RatioPrix = 1.8;
	private $PrixBoisBase = 800;
	private $PrixBoisCourant;
	private $PrixNourritureBase = 400;
	private $PrixNourritureCourant;
	private $PrixEauBase = 200;
	private $PrixEauCourant;

	private $RatioTemps = 1.4;
	private $TempsBase = 84;
	private $TempsCourant; 
	
	private $Niveau = 5;

	public function SetDef () {
		if ($this->Niveau !== 0) {
			$this->DefCourant = round($this->DefBase * pow($this->RatioDef, ($this->Niveau - 1)) + $this->DefBase);
		} else {
			$this->DefCourant = $this->DefBase;
		}
	}

	public function GetDef () {
		$this->DefCourant;
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

		if ($this->Niveau !== 0) {
			$this->PrixEauCourant = round($this->PrixEauBase * pow($this->RatioPrix, ($this->Niveau - 1)) + $this->PrixEauBase);
		} else {
			$this->PrixEauCourant = $this->PrixEauBase;
		}
	}

	public function GetPrixBois () {
		return $this->PrixBoisCourant;
	}

	public function GetPrixNourriture () {
		return $this->PrixNourritureCourant;
	}

	public function GetPrixEau () {
		return $this->PrixEauCourant;
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