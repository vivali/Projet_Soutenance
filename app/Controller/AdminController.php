<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\AdminModel;
use \Model\UserModel;
use \Model\ParamModel;

class AdminController extends Controller
{
	public function users()
	{
		$this->allowTo('1');
		$user_manager = new UserModel();

		$users = $user_manager->findAll();


		$this->show('admin/users', [
			'users' => $users,
		]);
	}

	public function deleteUser($id)
	{
		$this->allowTo('1');
		$user_manager = new UserModel();
		$user = $user_manager->find($id);

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
		var_dump($_POST);
		$this->show('admin/deleteUser', [
			'user' => $user
		]);
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
		$param_manager = new ParamModel();
		$param = $param_manager->findAll();
		var_dump($_POST);

		if (!empty($_POST)) {
			// Changement de la vitesse global du jeu
			if ( isset($_POST['speed']) && $_POST['speed'] >9 && $_POST['speed'] <101 ) {
				$param_manager->update(['speed'=>$_POST['speed']], $param[0]['id']);
			}
			// Changement de la proba attaque de zombie
			if ( !empty($_POST['z_atk_proba']) && $_POST['z_atk_proba'] >= 0 && $_POST['z_atk_proba'] < (101 - $_POST['p_atk_proba']) ) {
				$param_manager->update( [
					'z_atk_proba'=>$_POST['z_atk_proba']
				], $param[0]['id'] );
			}
			// Changement de la proba attaque de joueur
			if ( !empty($_POST['p_atk_proba']) && $_POST['p_atk_proba'] >= 0 && $_POST['p_atk_proba'] < (101-$_POST['z_atk_proba']) ) {
				$param_manager->update( [
					'p_atk_proba'=>$_POST['p_atk_proba']
				], $param[0]['id'] );
			}

		}
		// Refresh params
		$param = $param_manager->findAll();
		$this->allowTo('1');
		$this->show('admin/parameters', [
			'param' => $param[0],
		]);
	}

}
