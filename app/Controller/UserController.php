<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\UserModel;


class UserController extends Controller
{
	public function login()
	{
		$this->show('user/login');
	}

	public function register()
	{
		$this->show('user/register');
	}

	public function profil()
	{
		$this->show('user/profil');
	}

	public function update()
	{
		$this->show('user/update');
	}

	public function logout()
	{
		$auth_manager = new \W\Security\AuthentificationModel();
        $auth_manager->logUserOut();
        $this->redirectToRoute('user_login');
	}

}
