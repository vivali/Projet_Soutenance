<?php 

namespace Buildings;

/**
* 
*/
class StationRadio
{
	private $ProductionBase = 1;
	private $ProductionCourante;

	private $RatioPrix = 2;
	private $PrixBoisBase = 1200;
	private $PrixBoisCourant;
	private $PrixNourritureBase = 800;
	private $PrixNourritureCourant;
	private $PrixEauBase = 600;
	private $PrixEauCourant;

	private $RatioTemps = 1.5;
	private $TempsBase = 55;
	private $TempsCourant;

	private $Niveau = 1;
	private $RatioProd = 0.1 * $Niveau;

	public function SetProd () {
		if ($this->Niveau !== 0) {
			$this->ProductionCourante = round(Niveau de tous les bat * (1.2 + $RatioProd));
		} else {
			$this->ProductionCourante = $this->ProductionBase;
		}
	}

	public function GetProd () {
		return $this->ProductionCourante;
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

	public function SetNiveau () {
		// Requête récupération ressources de l'utilisateur

		if ($Bois > $PrixBoisCourant && $Food > $PrixNourritureCourant && $Eau > $PrixEauCourant) {
			// Requête augmentation du niveau en bdd !
			$Niveau = $Niveau + 1;
			// Requête suppression des ressources en fonction du prix
		} else {
			// Afficher message manque de ressource dans une div 
			echo "Manque de ressource";
		}
	}

	public function GetNiveau () {
		return $this->Niveau
	}
}