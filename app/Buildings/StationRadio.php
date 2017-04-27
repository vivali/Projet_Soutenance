<?php 

namespace Buildings;

use \Model\UserModel;
/**
* 
*/
class StationRadio
{	
	private $nom = "radio";
	private $ProductionBase = 10;
	private $ProductionCourante;

	private $RatioPrix = 2;
	private $PrixBoisBase = 2000;
	private $PrixBoisCourant;
	private $PrixNourritureBase = 4000;
	private $PrixNourritureCourant;
	private $PrixEauBase = 8000;
	private $PrixEauCourant;

	private $RatioTemps = 1.5;
	private $TempsBase = 401;
	private $TempsCourant;

	private $Niveau = 1;
	private $RatioProd = 1.2;

	public function __construct () {
		$this->Niveau = $_SESSION["buildings"]->radio;
		$this->SetProd();
		$this->SetPrix();
		$this->SetTemps();
	}

	public function SetProd () {
		
		$this->ProductionCourante = round(($this->RatioProd + ($this->Niveau * 0.1)) * (
			$_SESSION['buildings']->camp + 
			$_SESSION['buildings']->food_farm + 
			$_SESSION['buildings']->wood_farm + 
			$_SESSION['buildings']->water_farm + 
			$_SESSION['buildings']->cabanon + 
			$_SESSION['buildings']->food_stock + 
			$_SESSION['buildings']->wood_stock + 
			$_SESSION['buildings']->water_stock + 
			$_SESSION['buildings']->wall + 
			$_SESSION['buildings']->radio) +
			$this->ProductionCourante);
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
		// Requête récupération ressources de l'utilisateur

		if ($_SESSION["ressources"]->wood >= $this->PrixBoisCourant && $_SESSION["ressources"]->food >= $this->PrixNourritureCourant && $_SESSION["ressources"]->water >= $this->PrixEauCourant) {
			
			$UserModel = new UserModel();
			$this->Niveau = $this->Niveau + 1;
			$this->RatioProd = $this->RatioProd + 0.1;
			$id_user = $_SESSION["user"]["id"];

			$UserModel->refreshBuildings($this->nom, ":".$this->nom, $this->Niveau, $id_user);
			$nom = $this->nom;
			$_SESSION["buildings"]->$nom = $this->Niveau;

			// Requête suppression des ressources en fonction du prix
			

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