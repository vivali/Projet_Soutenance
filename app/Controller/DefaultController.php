<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{
	public function camp()
	{
		$this->show('default/camp');
	}

	public function building($idBuilding)
	{

		$ferme = new \Buildings\Ferme();
		$ferme->SetProd();
		var_dump($ferme->GetProd());
		var_dump($idBuilding);
		$this->show('default/building');
	}

	public function classement()
	{
		$this->show('default/classement');
	}

}
