<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel;
use \Model\UserModel;
use \Model\DefaultModel;


class UserController extends Controller
{
	public function login() {
		// Redirection si l'utilisateur est deja connecté
		if ($this->getUser()) {
			$this->redirectToRoute('default_camp');
		} else {
			$username 	= '';
			$message = [];

			if ( !empty($_POST) ) {
				$username 	= trim($_POST['username']);
				$password   = trim($_POST['password']);

				$auth_manager = new \W\Security\AuthentificationModel();

				if ( $user_id = $auth_manager->isValidLoginInfo($username, $password) ) {
					$user_manager = new UserModel();
					$user = $user_manager->find($user_id);
					$auth_manager->logUserIn($user);

					$this->redirectToRoute('default_camp');
				} else {
					$message['error'] = "Mauvais Identifiant ou mot de passe";
				}
			}
			$this->show('user/login', [
				'messages' => $message,
				'username' => $username,
			]);
		}
	}


	public function register()
	{
		$DefaultModel = new DefaultModel();
		$messages = '';
        $username = '';
        $email = '';
        $birthday_year = '';
        $birthday_month = '';
        $birthday_day = '';
        $errors = [];
        // Traitement du formulaire d'inscription
        if (!empty($_POST)) {
            $username = trim($_POST['username']); // On peut se passer de addslashes car avec PDO on fait une requête préparé
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $cfpassword = trim($_POST['cfpassword']);

            $birthday_year = trim($_POST['birthday_year']);
            $birthday_month = trim($_POST['birthday_month']);
            $birthday_day = trim($_POST['birthday_day']);

            $birthday = trim($_POST['birthday_year']."-".$_POST['birthday_month']."-".$_POST['birthday_day']);
            $user_manager = new UserModel();

            // On vérifie si l'email ou le username existent déjà en BDD
            if ( $user_manager->emailExists($email) || $user_manager->usernameExists($username) ) {
                $errors['exists'] = "L'email ou l'username existent."; // Equivalent du array_push($array, $data)
            }

            if ( strlen($username) < 3 ) {
                $errors['username'] = "Votre pseudo doit avoir au moins 3 caractéres.";
            }

            if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                $errors['email'] = "L'email n'est pas valides.";
            }

            if ( strlen($password) < 8 ) {
                $errors['password'] = "Le mot de passe doit contenir au moins 8 caractéres.";
            }

            if ( !ctype_alnum($password) ) {
                $errors['password'] = "Le mot de passe doit contenir au moins un chiffre et une lettre.";
            }

            if ( $password !== $cfpassword ) {
                $errors['cfpassword'] = "Les mots de passe ne correspondent pas.";
            }

            if ( empty($_POST['birthday_day']) || empty($_POST['birthday_month']) || empty($_POST['birthday_year']) ) {
                $errors['birthday'] = "Votre date de naissance n'est pas valide.";
            }

            if ( empty($errors) ) {
                $auth_manager = new AuthentificationModel(); // J'instancie le authentificationmodel qui facilite la gestion de l'authentification des utilisateurs
                // S'il n'y a pas d'erreurs, on inscrit l'utilisateur en base de données
                $user_manager->insert([
                    'username' => $username,
                    'email' => $email,
                    'password' => $auth_manager->hashPassword($password),
                    'birthday' => $birthday,
                    'role' => '0',
                    'date_create' => 'NOW()',
                    'date_last_connexion' => 'NOW()'
                ]);
                $messages = 'Vous êtes bien inscrit.';
                $this->redirectToRoute("user_login");
            }
        }
        $this->show( 'user/register', [
			'DefaultModel' => $DefaultModel,
			'messages' => $messages,
			'username' => $username,
			'email' => $email,
			'errors' => $errors,
			'birthday_year' => $birthday_year,
			'birthday_month' => $birthday_month,
			'birthday_day' => $birthday_day
		] );
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
