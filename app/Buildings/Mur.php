<?php 

namespace Buildings;

use \Model\UserModel;
/**
* 
*/
class Mur
{
	private $nom = "wall";
	private $RatioDef = 2.5;
	private $DefBase = 5000;
	private $DefCourant;

	private $RatioPrix = 1.8;
	private $PrixBoisBase = 1500;
	private $PrixBoisCourant;
	private $PrixNourritureBase = 1500;
	private $PrixNourritureCourant;
	private $PrixEauBase = 2000;
	private $PrixEauCourant;

	private $RatioTemps = 1.4;
	private $TempsBase = 197;
	private $TempsCourant; 
	
	private $Niveau = 5;

	public function __construct () {
		$this->Niveau = $_SESSION["buildings"]->wall;
		$this->SetDef();
		$this->SetPrix();
		$this->SetTemps();
	}

	public function SetDef () {
		if ($this->Niveau != 0) {
			$this->DefCourant = round($this->DefBase * pow($this->RatioDef, ($this->Niveau - 1)) + $this->DefBase);
		} else {
			$this->DefCourant = $this->DefBase;
		}
	}

	public function GetDef () {
		$this->DefCourant;
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
}