<?php 

namespace Buildings;

use \Model\UserModel;
use \Model\DefaultModel;
/**
* 
*/
class Ferme
{
	public $id = 3;
	private $nom = "food_farm";
	private $ProductionBase = 100;
	private $ProductionCourante;

	public $barre = '';
	public $action = 1;

	private $RatioPrix = 1.5;
	private $PrixBoisBase = 25;
	private $PrixBoisCourant;
	private $PrixNourritureBase = 60;
	private $PrixNourritureCourant;

	private $RatioTemps = 1.5;
	private $TempsBase = 12;
	private $TempsCourant;

	private $Niveau = 0;
	private $Vitesse = 10;

	public function __construct () {
		$nom 	= $this->nom;
		$this->Niveau = $_SESSION["buildings"]->$nom;
		$this->SetPrix();
		$this->SetTemps();
		$id_user = $_SESSION["user"]["id"];
		$UserModel = new UserModel();
		$DefaultModel = new DefaultModel();
		if (!empty($_SESSION["construct"]->$nom)){
			if (($_SESSION["construct"]->$nom - date_format(date_create(),'U')) <= 0){
                $_SESSION["construct"]->$nom = null;
                $UserModel->TimeConstruct($this->nom, ":".$this->nom, null, $id_user);
                $this->Niveau = $this->Niveau + 1;
                $_SESSION["buildings"]->$nom = $this->Niveau;
                $UserModel->refreshBuildings($this->nom, ":".$this->nom, $this->Niveau, $id_user);
            }
            else{
            	$date = date_create(); 
            	$timer = $_SESSION["construct"]->$nom; 
            	$this->barre = "<div id='bar".$this->id."'>".$DefaultModel->buttonConstruct($_SESSION["construct"]->$nom, $this->GetTemps(), $this->id, $timer)."</div>";
            }
		}
	}

	public function SetProd () {
		$niveau = ($this->Niveau < 20) ? $this->Niveau : 20; 
		if ($niveau != 0) {

		$resultat = 20 * $niveau;
		$resultat *= (1.1 + pow(($niveau / 1000), $niveau));
		$resultat *= (1 + ($niveau / 100));
		$resultat *= $this->Vitesse + (20 * $this->Vitesse);
		$resultat = $resultat / 3600;

		$this->ProductionCourante = $resultat;
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
	}

	public function GetPrixBois () {
		return $this->PrixBoisCourant;
	}

	public function GetPrixNourriture () {
		return $this->PrixNourritureCourant;
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

		if ($_SESSION["ressources"]->wood >= $this->PrixBoisCourant && $_SESSION["ressources"]->food >= $this->PrixNourritureCourant) {
			// Requête augmentation du niveau en bdd !
			$UserModel = new UserModel();
			$DefaultModel = new DefaultModel();
			$id_user = $_SESSION["user"]["id"];
			// Requête suppression des ressources en fonction du prix
			$wood 	= &$_SESSION["ressources"]->wood;
            $water 	= &$_SESSION["ressources"]->water;
	        $food 	= &$_SESSION["ressources"]->food;
	        $camper = &$_SESSION["ressources"]->camper;

	        $wood 	-= $this->PrixBoisCourant;
            $food 	-= $this->PrixNourritureCourant;
            $nom 	= $this->nom;


			$date = date_create();
			$_SESSION["construct"]->$nom = date_format($date, 'U') + $this->GetTemps();
			$UserModel->TimeConstruct($this->nom, ":".$this->nom, date_format($date, 'U') + $this->GetTemps(), $id_user);

			$UserModel->refreshRessources($wood, $water, $food, $camper, $id_user);
		} else {
			// Afficher message manque de ressource dans une div 
			echo "Manque de ressource";

		}
	}
}
