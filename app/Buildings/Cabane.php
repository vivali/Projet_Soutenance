<?php 

namespace Buildings;

/**
* 
*/
class Citerne
{
	private $RatioStock = 4;
	private $StockageBase = 5000;
	private $StockageCourant;

	private $RatioPrix = 2;
	private $PrixBoisBase = 4000;
	private $PrixBoisCourant;
	private $PrixNourritureBase = 4000;
	private $PrixNourritureCourant;
	private $PrixEauBase = 2500;
	private $PrixEauCourant;

	private $RatioTemps = 1.6;
	private $TempsBase = 257;
	private $TempsCourant; 
	
	private $Niveau = 5;

	public function SetStock () {
		if ($this->Niveau !== 0) {
			$this->StockageCourant = round($this->StockageBase * pow($this->RatioStock, ($this->Niveau - 1)) + $this->StockageBase);
		} else {
			$this->StockageCourant = $this->StockageBase;
		}
	}

	public function GetStock () {
		return $this->StockageCourant;
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
