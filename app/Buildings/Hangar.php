<?php 

namespace Buildings;

/**
* 
*/
class Hangar
{
	private $RatioStock = 2;
	private $StockageBase = 2000;
	private $StockageCourant;

	private $RatioPrix = 2;
	private $PrixBoisBase = 1000;
	private $PrixBoisCourant;

	private $RatioTemps = 1.6;
	private $TempsBase = 18;
	private $TempsCourant; 
	
	private $Niveau = 5;

	public function __construct () {
		$this->Niveau = $_SESSION["buildings"]->water_farm;
		$this->SetStock();
		$this->SetPrix();
		$this->SetTemps();
	}

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
	}

	public function GetPrixBois () {
		return $this->PrixBoisCourant;
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
