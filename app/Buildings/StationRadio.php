<?php 

namespace Buildings;

use \Model\UserModel;
use \Model\DefaultModel;
/**
* 
*/
class StationRadio
{
	public $id = 9;	
	private $nom = "radio";
	private $ProductionBase = 60;
	private $ProductionCourante;

	public $barre = '';
	public $action = 1;

	private $RatioPrix = 2;
	private $PrixBoisBase = 2000;
	private $PrixBoisCourant;
	private $PrixNourritureBase = 4000;
	private $PrixNourritureCourant;
	private $PrixEauBase = 8000;
	private $PrixEauCourant;

	private $RatioTemps = 1.5;
	private $TempsBase = 0;
	private $TempsCourant;

	private $Niveau = 1;
	private $RatioProd = 1.3;

	public function __construct () {
		$nom 	= $this->nom;
		$this->Niveau = $_SESSION["buildings"]->$nom;
		$this->SetProd();
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

		$this->ProductionCourante = 

			(( $this->ProductionBase + (

			$_SESSION['buildings']->camp + 
			$_SESSION['buildings']->food_farm + 
			$_SESSION['buildings']->wood_farm + 
			$_SESSION['buildings']->water_farm + 
			$_SESSION['buildings']->cabanon + 
			$_SESSION['buildings']->food_stock + 
			$_SESSION['buildings']->wood_stock + 
			$_SESSION['buildings']->water_stock + 
			$_SESSION['buildings']->wall + 
			$_SESSION['buildings']->radio)) *
			($this->RatioProd + (0.1 * $this->Niveau)

		));}
		

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
			$DefaultModel = new DefaultModel();
			$id_user = $_SESSION["user"]["id"];
			// Requête suppression des ressources en fonction du prix
			$wood 	= &$_SESSION["ressources"]->wood;
            $water 	= &$_SESSION["ressources"]->water;
	        $food 	= &$_SESSION["ressources"]->food;
	        $camper = &$_SESSION["ressources"]->camper;

	        $wood 	-= $this->PrixBoisCourant;
            $water 	-= $this->PrixEauCourant;
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

	public function GetNiveau () {
		return $this->Niveau;
	}
}