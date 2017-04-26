<?php 

namespace Buildings;

use \Model\UserModel;
/**
*
*/
class Bucheron
{
	private $nom = "wood_farm";
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
		if ($this->Niveau !== 0) {
		if ($this->Niveau != 0) {
			$this->ProductionCourante = (round($this->ProductionBase * pow($this->RatioProd, ($this->Niveau - 1)) + $this->ProductionBase)) / 3600;
		} else {
			$this->ProductionCourante = $this->ProductionBase / 3600;
		}
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

	public function SetNiveau () {
		// Requête récupération ressources de l'utilisateur

		if ($_SESSION["ressources"]->wood >= $this->PrixBoisCourant) {
			
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

			$UserModel->refreshRessources($wood, $water, $food, $id_user);

		} else {
			// Afficher message manque de ressource dans une div 
			echo "Manque de ressource";
		}
	}
}




// $bucheron = new Bucheron();
// $bucheron->SetProd();
// var_dump($bucheron->GetProd());

// $bucheron->SetPrix();
// var_dump($bucheron->GetPrix());

// $bucheron->SetTemps();
// var_dump($bucheron->GetTemps());