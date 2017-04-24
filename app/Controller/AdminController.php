<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\AdminModel;

class AdminController extends Controller
{
	public function users()
	{
		$this->show('admin/users');
	}

	public function deleteUser($id)
	{
		$this->redirectToRoute('admin_users');
	}

	public function buildings()
	{
		$this->show('admin/buildings');
	}

	public function updateBuilding($idBuilding)
	{
		var_dump($idBuilding);
		$this->show('admin/updateBuilding');
	}

	public function parameters()
	{
		$this->show('admin/parameters');
	}

}
