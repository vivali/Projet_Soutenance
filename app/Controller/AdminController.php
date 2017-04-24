<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\AdminModel;
use \Model\UserModel;

class AdminController extends Controller
{
	public function users()
	{
		$this->allowTo('1');
		$this->show('admin/users');
	}

	public function deleteUser($id)
	{
		$this->allowTo('1');

		$choice = ( isset($_POST['choice']) ) ? $_POST['choice'] : "";
		switch ($choice) {
			case 'delete':
				$user_manager = new UserModel();
				$user_manager->delete($id);
				$this->redirectToRoute('admin_users');
				break;

			case 'back':
				$this->redirectToRoute('admin_users');
				break;

			default:
				break;
		}
		$this->show('admin/deleteUser');
	}



	public function buildings()
	{
		$this->allowTo('1');
		$this->show('admin/buildings');
	}

	public function updateBuilding($idBuilding)
	{
		$this->allowTo('1');
		var_dump($idBuilding);
		$this->show('admin/updateBuilding');
	}

	public function parameters()
	{
		$this->allowTo('1');
		$this->show('admin/parameters');
	}

}
