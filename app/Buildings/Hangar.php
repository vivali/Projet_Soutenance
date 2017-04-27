<?php 

namespace Buildings;

use \Model\UserModel;
use \Model\DefaultModel;
/**
* 
*/
class Hangar
{	
	private $nom = "wood_stock";
	private $RatioStock = 2;
	private $StockageBase = 100000;
	private $StockageCourant;

	public $barre = '';
	public $action = 1;

	private $RatioPrix = 2;
	private $PrixBoisBase = 4000;
	private $PrixBoisCourant;

	private $RatioTemps = 1.6;
	private $TempsBase = 144;
	private $TempsCourant; 
	
	private $Niveau = 5;

	public function __construct () {
		$this->Niveau = $_SESSION["buildings"]->wood_stock;
		$this->SetStock();
		$this->SetPrix();
		$this->SetTemps();
		$nom 	= $this->nom;
		$id_user = $_SESSION["user"]["id"];
		$UserModel = new UserModel();
		$DefaultModel = new DefaultModel();
		if (!empty($_SESSION["construct"]->$nom)){
			$this->barre = "<div id='bar'>".$DefaultModel->buttonConstruct($_SESSION["construct"]->$nom, $this->GetTemps())."</div>";
			if (($_SESSION["construct"]->$nom - date_format(date_create(),'U')) <= 0){
                $_SESSION["construct"]->$nom = null;
                $this->Niveau = $this->Niveau + 1;
                $_SESSION["buildings"]->$nom = $this->Niveau;
                $UserModel->refreshBuildings($this->nom, ":".$this->nom, $this->Niveau, $id_user);
            }
            else{
            	$this->barre = "<div id='bar'>".$DefaultModel->buttonConstruct($_SESSION["construct"]->$nom, $this->GetTemps())."</div>";
            }
		}
	}

	public function SetStock () {
		if ($this->Niveau != 0) {
			$this->StockageCourant = round($this->StockageBase * pow($this->RatioStock, ($this->Niveau - 1)) + $this->StockageBase);
		} else {
			$this->StockageCourant = $this->StockageBase;
		}
	}

	public function GetStock () {
		return $this->StockageCourant;
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

		if ($_SESSION["ressources"]->wood >= $this->PrixBoisCourant) {
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
            $nom 	= $this->nom;


			$date = date_create();
			$_SESSION["construct"]->$nom = date_format($date, 'U') + $this->GetTemps();

			$UserModel->refreshRessources($wood, $water, $food, $camper, $id_user);
		} else {
			// Afficher message manque de ressource dans une div 
			echo "Manque de ressource";

		}
	}
}
