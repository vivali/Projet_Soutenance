<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel;
use \Model\UserModel;
use \Model\DefaultModel;
use \Model\BuildingsModel;
use \Model\RessourcesModel;

class DefaultController extends Controller
{
	public function camp()
	{	
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

		$this->show('default/camp', [
										"bucheron" 		=> $bucheron,
										"ferme"			=> $ferme,
										"puit"			=> $puit,
										"hangar"		=> $hangar,
										"garde_manger"	=> $garde_manger,
										"citerne"		=> $citerne,
										"cabane"		=> $cabane,
										"mur"			=> $mur,
										"radio"			=> $radio
									] );


	}

	public function building($idBuilding)
	{
		$DefaultModel = new DefaultModel();
		$ferme = new \Buildings\Ferme();
		$ferme->SetProd();
		var_dump($ferme->GetProd());
		var_dump($idBuilding);
		$DefaultModel->refreshTimer();
		$this->show('default/building');
	}

	public function classement()
	{
		$DefaultModel = new DefaultModel();
		$DefaultModel->refreshTimer();
		$this->show('default/classement');
	}

}
