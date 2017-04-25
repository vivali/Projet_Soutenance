<?php 

namespace Buildings;

use \Model\UserModel;

/**
* 
*/
class Puit
{
	private $RatioProd = 1.6;
	private $ProductionBase = 80;
	private $ProductionCourante;

	private $RatioPrix = 2;
	private $PrixBoisBase = 300;
	private $PrixBoisCourant;
	private $PrixNourritureBase = 150;
	private $PrixNourritureCourant;
	private $PrixEauBase = 50;
	private $PrixEauCourant;

	private $RatioTemps = 1.5;
	private $TempsBase = 21;
	private $TempsCourant;

	private $Niveau = 1;

	public function __construct () {
		$this->Niveau = $_SESSION["buildings"]->water_farm;
		$this->SetProd();
		$this->SetPrix();
		$this->SetTemps();
	}

	public function SetProd () {
		if ($this->Niveau != 0) {
			$this->ProductionCourante = (round($this->ProductionBase * pow($this->RatioProd, ($this->Niveau - 1)) + $this->ProductionBase)) / 3600;
		} else {
			$this->ProductionCourante = $this->ProductionBase / 3600;
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

		if ($this->Niveau != 0) {
			$this->PrixNourritureCourant = round($this->PrixNourritureBase * pow($this->RatioPrix, ($this->Niveau - 1)) + $this->PrixNourritureBase);
		} else {
			$this->PrixNourritureCourant = $this->PrixNourritureBase;
		}

		if ($this->Niveau != 0) {
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
		if ($this->Niveau != 0) {
			$this->TempsCourant = round($this->TempsBase * pow($this->RatioTemps, ($this->Niveau - 1)) + $this->TempsBase);
		} else {
			$this->TempsCourant = $this->TempsBase;
		}
	}

	public function GetTemps () {
		return $this->TempsCourant;
	}

	public function SetNiveau () {

		if ($_SESSION["ressources"]->wood >= $this->PrixBoisCourant && $_SESSION["ressources"]->food >= $this->PrixNourritureCourant && $_SESSION["ressources"]->water >= $this->PrixEauCourant) {
			// Requête augmentation du niveau en bdd !
			$UserModel = new UserModel();
			$this->Niveau = $this->Niveau + 1;
			// Requête suppression des ressources en fonction du prix
			$id_user = $_SESSION["user"]["id"];

			$wood 	= &$_SESSION["ressources"]->wood;
            $water 	= &$_SESSION["ressources"]->water;
	        $food 	= &$_SESSION["ressources"]->food;

	        $wood 	-= $this->PrixBoisCourant;
            $water 	-= $this->PrixEauCourant;
            $food 	-= $this->PrixNourritureCourant;

			$UserModel->refreshRessources($wood, $water, $food, $id_user);
		} else {
			// Afficher message manque de ressource dans une div 
			echo "Manque de ressource";
		}
	}

	public function GetNiveau () {
		return $this->Niveau;
	}
}







