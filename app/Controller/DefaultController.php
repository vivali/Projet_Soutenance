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
		$puit = new \Buildings\Puit();
		$puit->SetProd();
		var_dump($puit->GetProd());
		$this->show('default/building');
	}

	public function classement()
	{
		$this->show('default/classement');
	}

}
