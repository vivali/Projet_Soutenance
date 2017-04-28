<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel;
use \Model\UserModel;
use \Model\DefaultModel;
use \Model\BuildingsModel;
use \Model\RessourcesModel;
use \Model\ParamModel;
use \Model\ReportsModel;

class DefaultController extends Controller
{
	public function camp()
	{

		if ( !($this->getUser()) ) {
			$this->redirectToRoute('user_login');
		}

		$DefaultModel = new DefaultModel();
		$DefaultModel->refreshTimer();
		spl_autoload_register(function($class) {
		    include  $class . '.php';
		});
		$bucheron = new \Buildings\Bucheron();
		$ferme = new \Buildings\Ferme();
		$puit = new \Buildings\Puit();
		$hangar = new \Buildings\Hangar();
		$garde_manger = new \Buildings\GardeManger();
		$citerne = new \Buildings\Citerne();
		$cabane = new \Buildings\Cabane();
		$mur = new \Buildings\Mur();
		$radio = new \Buildings\StationRadio();

		$user = $this->getUser();
		// Perdre des ressources
		$_SESSION['user']['date_last_connexion'] = 1490370723;

		$alert = "";
		// Attaque si l'utilisateur ne se déconnecte pas
		$lastLogD = date( 'd-m', ( $user["date_last_connexion"] ) ) ;
		$today = date('d-m');
		if ($lastLogD != $today) {
			$lastCo=round((time()-$user["date_last_connexion"])/(24*60*60));

			// Récupération des proba d'attaques
			$param_manager = new ParamModel();
			$param = $param_manager->findAll();
			$user_manager = new UserModel();
			$user_manager->getAttacked($this->getUser()['id'], $mur->GetNiveau(), $param[0]['z_atk_proba'], $param[0]['p_atk_proba']);

			// Récupére les rapports
			$report_manager = new ReportsModel();
			$reports = $report_manager->findAllById($this->getUser()['id']);
			$newReport = 0;
			foreach ($reports as $report) {
				if($report['seen'] == 0){ $newReport++; }
			}
			if ($_SESSION["newReport"] != $newReport) {
				$alert = "Vous avez un nouveau rapport.";
			}
			$_SESSION["newReport"] = $newReport;

			// Mise à jour de la date de dernière connexion
			$user_manager->update(['date_last_connexion'=>time()], $this->getUser()['id']);

			$auth_manager = new \W\Security\AuthentificationModel();
			$auth_manager->refreshUser();
		}

		$this->show('default/camp', [
										"bucheron" 		=> $bucheron,
										"ferme"			=> $ferme,
										"puit"			=> $puit,
										"hangar"		=> $hangar,
										"garde_manger"	=> $garde_manger,
										"citerne"		=> $citerne,
										"cabane"		=> $cabane,
										"mur"			=> $mur,
										"radio"			=> $radio,
										"alert" 		=> $alert
									] );

	}

	public function building($idBuilding)
	{
		$DefaultModel = new DefaultModel();
		$DefaultModel->refreshTimer();
		$this->show('default/building');
	}

	public function report()
	{
		$DefaultModel = new DefaultModel();
		$report_manager = new ReportsModel();

		$reports = $report_manager->findAllById($this->getUser()['id']);

		$DefaultModel->refreshTimer();
		$this->show('default/report',[
			'reports' => $reports,
		]);
	}

	public function seen($id)
	{
		$report_manager = new ReportsModel();
		$_SESSION['newReport']--;
		$report_manager->update(['seen'=>1], $id);

	}

	public function deleteReport($id)
	{
		$report_manager = new ReportsModel();
		$report = $report_manager->find($id);
		if ( !($report['seen']) ) {
			$_SESSION['newReport']--;
		}
		$report_manager->delete($id);
	}

	public function classement()
	{
		$DefaultModel = new DefaultModel();
		$user_manager = new UserModel();

		$users = $user_manager->findAllJoinCampers("camper", "DESC");

		$DefaultModel->refreshTimer();
		$this->show('default/classement', [
			'users' => $users,
		]);
	}

	public function tchat()
	{
		if ( !($this->getUser()) ) {
			$this->redirectToRoute('user_login');
		}
		$DefaultModel = new DefaultModel();
		$DefaultModel->refreshTimer();
		$this->show('default/tchat');
	}

	public function upgrade ($idBuilding) {
		if ( !($this->getUser()) ) {
			$this->redirectToRoute('user_login');
		}
		$DefaultModel = new DefaultModel();
		$UserModel = new UserModel();

		if ($idBuilding == 2) {
			$bucheron = new \Buildings\Bucheron();
			$bucheron->SetNiveau();
		}

		if ($idBuilding == 3) {
			$ferme = new \Buildings\Ferme();
			$ferme->SetNiveau();
		}

		if ($idBuilding == 4) {
			$puit = new \Buildings\Puit();
			$puit->SetNiveau();
		}

		if ($idBuilding == 5) {
			$hangar = new \Buildings\Hangar();
			$hangar->SetNiveau();
		}

		if ($idBuilding == 6) {
			$garde_manger = new \Buildings\GardeManger();
			$garde_manger->SetNiveau();
		}

		if ($idBuilding == 7) {
			$citerne = new \Buildings\Citerne();
			$citerne->SetNiveau();
		}

		if ($idBuilding == 8) {
			$cabane = new \Buildings\Cabane();
			$cabane->SetNiveau();
		}

		if ($idBuilding == 9) {
			$radio = new \Buildings\StationRadio();
			$radio->SetNiveau();
		}

		if ($idBuilding == 10) {
			$mur = new \Buildings\Mur();
			$mur->SetNiveau();
		}


		$this->redirectToRoute('default_camp');
	}

}
