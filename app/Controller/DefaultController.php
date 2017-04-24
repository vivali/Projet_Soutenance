<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel;
use \Model\UserModel;
use \Model\DefaultModel;
use \Model\BuildingsModel;
use \Model\RessourcesModel;

$DefaultModel = new DefaultModel();
$UserModel = new UserModel();
$BuildingsModel = new BuildingsModel();
$RessourcesModel = new RessourcesModel();

class DefaultController extends Controller
{
	public function camp()
	{	
		$DefaultModel = new DefaultModel();
		$DefaultModel->refreshTimer();
		$this->show('default/camp');
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
