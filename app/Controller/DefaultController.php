<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{
	public function camp()
	{
		$this->show('default/camp');
	}

	public function building()
	{
		$ferme = new \Buildings\Ferme();
		$ferme->SetProd();
		var_dump($ferme->GetProd());
		$this->show('default/building');
	}

	public function classement()
	{
		$this->show('default/classement');
	}

}
