<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel;
use \Model\UserModel;
use \Model\DefaultModel;
use \Model\BuildingsModel;
use \Model\RessourcesModel;

class UserController extends Controller
{
	public function login() {
		$DefaultModel = new DefaultModel();
		$UserModel = new UserModel();
		$BuildingsModel = new BuildingsModel();
		$RessourcesModel = new RessourcesModel();
		// var_dump($message);
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

					$user = $UserModel->find($user_id);
					$buildings = $UserModel->getBTable($user_id);
					$ressources = $UserModel->getRTable($user_id);
					$user_manager = new UserModel();

					$user = $user_manager->find($user_id);
					$auth_manager->logUserIn($user);
					$_SESSION["buildings"] = $buildings;
					$_SESSION["ressources"] = $ressources;

					$this->redirectToRoute('default_camp');
				} else {
					$message['error'] = "Mauvais Identifiant ou mot de passe";
				}
			}
			$DefaultModel->refreshTimer();
			$this->show('user/login', [
				'messages' => $message,
				'username' => $username,
			]);
		}
	}

	public function reset() {
		$DefaultModel = new DefaultModel();
		$BuildingsModel = new BuildingsModel();
		$RessourcesModel = new RessourcesModel();
		// Redirection si l'utilisateur est deja connecté
		if ($this->getUser()) {
			$this->redirectToRoute('user_update');
		} else {
			$message = [];
			$user_manager = new UserModel();

			// S'il n'y a pas de token
			if ( empty($_GET) ) {
				// On demande son identifiant à l'utilisateur
				if ( empty($_POST) ) {
					$this->show('user/reset', [
						'messages' => $message,
						'display' => "mail",
					]);
				} else {
					// Le login a été rentré, on cherche son mail
					$res = $user_manager->getUserByUsernameOrEmail($_POST["login"]);

					if ($res) {
						// Si on trouve l'utilisateur
						// On lui genere une clé unique valable 48h max
						$tomorrow = date('m').( date('d') + 1 );
						$encrypt = $tomorrow.md5(( 1290*3+$res['id']) );

						//
						// echo "Clé : " . $tomorrow.( 1290*3+$res['id']) . "<br>";
						// echo "Token : " . $encrypt."<br>";

						// Ajout du token dans la bdd
						$newData['token'] = $encrypt;
						$user_manager->update($newData, $res['id']);

						// Préparation du mail :
						// Création de l'url de reset password
						$url = $_SERVER['HTTP_REFERER'];
						$url .= "?token=".$encrypt;

						// Contenu du mail
						$message = "
						<html>
						    <head>
						        <title>Créez votre nouveau mot de passe</title>
						    </head>
						    <body>
						          <p>Bonjour ".$res['username'].",</p>

								<p>Vous avez demandé un nouveau mot de passe afin d'accéder à votre compte.</p>

								<p>Pour définir votre nouveau mot de passe, cliquez sur ce lien</p>
								<p><a href='".$url."'>".$url."</a></p>

								<p>Pour des raisons de sécurité, ce lien de changement de mot de passe expirera dans 2 jours (ou après que vous ayez créé votre nouveau mot de passe).</p>
						    </body>
						</html>";

						// Header du mail
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

						// Envoie du mail
						mail('philippe.gruet@outlook.fr', 'Créez votre nouveau mot de passe', $message, $headers);

						$this->show('user/reset', [
							'display' => "mailSent",
							'mail' => $url,
						]);
					} else {
						$this->show('user/reset', [
							'messages' => ["Identifiant invalide"],
							'display' => "mail",
						]);
					}
				}

			// Si on a un parametre dans l'url
			} else {
				if ( isset($_GET['token']) ) {
					$errors = [];

					// Formulaire de mot de passe envoyé
					if ( !empty($_POST) ) {
						$password   = trim($_POST['password']);
						$cfpassword = trim($_POST['cfpassword']);
						$auth_manager = new \W\Security\AuthentificationModel();

						// Vérif. mot de passe
						if ( $password !== $cfpassword ) {
							$errors['cfpassword'] = "Les mots de passe ne correspondent pas.";
						} elseif ( strlen($password) < 8 ) {
							$errors['password'] = "Le mot de passe doit contenir au moins 8 caractéres.";
						} elseif ( !ctype_alnum($password) ) {
							$errors['password'] = "Le mot de passe doit contenir au moins un chiffre et une lettre.";
						}
						$newData['password'] = $auth_manager->hashPassword( $password );

						// S'il n'y a pas d'erreur
						if ( empty($errors) ) {
							// On cherche le token dans la table users
							$result = $user_manager->search( ['token' => $_GET['token']] );
							foreach ($result as $value) {
								if ($value['token'] == $_GET['token']){
									// On récupére l'user avec le token exact
									$user = $value;
								}
							}
							// Si l'utilisateur a été trouvé
							if (isset($user)) {
								// Token validity
								// echo substr($user['token'], 0, 4);
								// echo date('md');

								// On détruit le token
								$newData['token'] = "";

								// Si le token a expiré
								if (substr($user['token'], 0, 4) < date('md')) {
									unset($newData['password']);

									// On supprime le token sans changer le mot de passe
									$user_manager->update($newData, $user['id']);
									$this->show('user/reset', [
										'DefaultModel' => $DefaultModel,
										'display' => "error",
										'message' => "Le lien n'est plus valide.",
									]);
								} else {
									// On modifie le mot de passe
									$user_manager->update($newData, $user['id']);
									$this->redirectToRoute('user_login');
									echo "Modif. password";
								}
							} else {
								// Si on n'a pas trouvé l'utilisateur
								$this->show('user/reset', [
									'DefaultModel' => $DefaultModel,
									'display' => "error",
									'message' => "Le lien n'est pas valide.",
								]);
							}
						} else {
							$message['error'] = "Mot de passe incorect";
						}
					}
					$DefaultModel->refreshTimer();
					$this->show('user/reset', [
						'DefaultModel' => $DefaultModel,
						'messages' => $message,
						'errors' => $errors,
						'display' => "password",
					]);
				}
			}
		}
		$this->show('user/reset', [
			'DefaultModel' => $DefaultModel,
			'display' => "error",
			'message' => "Le lien n'est pas valide.",
		]);
	}


	public function register()
	{
		$DefaultModel = new DefaultModel();
		$UserModel = new UserModel();
		$BuildingsModel = new BuildingsModel();
		$RessourcesModel = new RessourcesModel();
		$messages = '';
        $username = '';
        $email = '';
        $birthday_year = '';
        $birthday_month = '';
        $birthday_day = '';
        $errors = [];
        $date_create = new \DateTime('now');
        $date_last_connexion = new \DateTime('now');
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

            // On vérifie si l'email ou le username existent déjà en BDD
            if ( $UserModel->emailExists($email) ) {
                $errors['exists_m'] = "L'email existent déjà.";
            }

            if ( $UserModel->usernameExists($username) ) {
                $errors['exists_u'] = "Ce pseudo existent déjà.";
            }

            if ( strlen($username) < 3 ) {
                $errors['username'] = "Votre pseudo doit avoir au moins 3 caractéres.";
            }

            if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                $errors['email'] = "L'email n'est pas valides.";
            }

            if ( strlen($password) < 7 ) {
                $errors['password'] = "Le mot de passe doit contenir au moins 7 caractéres.";
            }

            if ( !ctype_alnum($password) ) {
                $errors['password'] = "Le mot de passe doit contenir au moins un chiffre et une lettre, les carractéres spéciaux ne sont pas accepter.";
            }

            if ( $password !== $cfpassword ) {
                $errors['cfpassword'] = "Les mots de passe ne correspondent pas.";
            }

            if ( empty($_POST['birthday_day']) || empty($_POST['birthday_month']) || empty($_POST['birthday_year']) ) {
                $errors['birthday'] = "Votre date de naissance n'est pas valide.";
            }

            if ( empty($errors) ) {
                $auth_manager = new AuthentificationModel(); // J'instancie le authentificationmodel qui facilite la gestion de l'authentification des utilisateurs
                $date = date_create();
                $UserModel->insert([
                    'username' => $username,
                    'email' => $email,
                    'password' => $auth_manager->hashPassword($password),
                    'birthday' => $birthday,
                    'role' => '0',
                    'refresh_wood' => date_format($date, 'U'),
                    'refresh_water' => date_format($date, 'U'),
                    'refresh_food' => date_format($date, 'U'),
                    'date_create' => $date_create->format('Y-m-d H:i:s'),
                    'date_last_connexion' => date_format($date, 'U')
                ]);
                $id_user = $UserModel->getUserByUsernameOrEmail($email)["id"];
                var_dump($id_user);
                $BuildingsModel->insert([
                    'id_user' => $id_user,
                    'camp' => '0',
                    'food_farm' => '0',
                    'wood_farm' => '0',
                    'water_farm' => '0',
                    'cabanon' => '0',
                    'food_stock' => '0',
                    'wood_stock' => '0',
                    'water_stock' => '0',
                    'wall' => '0',
                    'radio' => '0'

                ]);
                $RessourcesModel->insert([
                    'id_user' => $id_user,
                    'camper' => '1',
                    'food' => '3000',
                    'wood' => '5000',
                    'water' => '1000'

                ]);
                $messages = 'Vous êtes bien inscrit.';

                $this->redirectToRoute("user_login");
            }
        }
        $DefaultModel->refreshTimer();
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
		$DefaultModel = new DefaultModel();
		$DefaultModel->refreshTimer();
		$this->show('user/profil');
	}



	public function update() {

		$DefaultModel = new DefaultModel();
    	$DefaultModel->refreshTimer();
        $username = '';
        $email = '';
		$messages = [];

		$errors = [];

		if( !empty($_POST) ) {
			$username 	= trim($_POST['username']);
			$email	 	= trim($_POST['email']);
			$password   = trim($_POST['password']);
			$newPassword   = trim($_POST['npassword']);
			$cfPassword   = trim($_POST['cfpassword']);
			$user_manager = new UserModel();
			$auth_manager = new \W\Security\AuthentificationModel();

			if ($user_id = $auth_manager->isValidLoginInfo( $this->getUser()['username'], $password )) {

				// Si un des champs est rempli
				if ( !( empty($username) && empty($email) && empty($username) && empty($newPassword) ) ) {
					// Si le champ username est rempli, on le vérifie
					if (!empty($username)) {
						if ( $user_manager->usernameExists($username) ) {
							$errors['username'] = "Le pseudo est déja pris.";
						} elseif ( strlen($username) < 3 ) {
							$errors['username'] = "Votre pseudo doit avoir au moins 3 caractéres.";
						} else {
							$newData['username'] = $username;
						}
					}

					// Si le champ email est rempli, on le vérifie
					if (!empty($email)) {
						if ( $user_manager->emailExists($email) ) {
							$errors['email'] = "L'email existe déja.";
						} elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
							$errors['email'] = "L'email n'est pas valides.";
						} else {
							$newData['email'] = $email;
						}
					}

					// Si le champ mot de passe est rempli, on le vérifie
					if (!empty($newPassword)) {
						if ( $newPassword !== $cfPassword ) {
							$errors['cfpassword'] = "Les mots de passe ne correspondent pas.";
						} elseif ( strlen($newPassword) < 8 ) {
							$errors['npassword'] = "Le mot de passe doit contenir au moins 8 caractéres.";
						} elseif ( !ctype_alnum($newPassword) ) {
							$errors['npassword'] = "Le mot de passe doit contenir au moins un chiffre et une lettre.";
						}
						$newData['password'] = $auth_manager->hashPassword( $newPassword );
					}
				} else {
					echo "Champs vide";
				}
			} else {
				$errors['password'] = "Mauvais mot de passe";
			}


			// S'il y a des nouvelles données et qu'il n'y a pas d'erreurs
			if ( isset($newData) && empty($errors)  ) {
				$user_manager->update($newData, $this->getUser()['id']);
				$auth_manager->refreshUser();
				$messages['result'] = "Modification effectué avec succées.";
				$username = '';
		        $email = '';
				// $this->redirectToRoute('default_camp');
			} else {
				$messages['result'] = "Un ou plusieurs champs ne sont pas valides.";
			}
		}

		$this->show('user/update',  [
			'DefaultModel' => $DefaultModel,
			'username' => $username,
			'email' => $email,
			'errors' => $errors,
			'messages' => $messages,
		] );
	}



	public function logout()
	{
		$auth_manager = new \W\Security\AuthentificationModel();
		$UserModel = new UserModel();

		$id_user = $_SESSION["user"]["id"];

		$UserModel->refreshTimeBDD("refresh_wood", ":"."refresh_wood", $_SESSION["refresh"]->refresh_wood, $id_user);
		$UserModel->refreshTimeBDD("refresh_water", ":"."refresh_water", $_SESSION["refresh"]->refresh_water, $id_user);
		$UserModel->refreshTimeBDD("refresh_food", ":"."refresh_food", $_SESSION["refresh"]->refresh_food, $id_user);

        $auth_manager->logUserOut();

        unset($_SESSION['buildings']);
        unset($_SESSION['ressources']);
        unset($_SESSION["refresh"]);
        unset($_SESSION['calcul_wood']);
        unset($_SESSION['calcul_water']);
        unset($_SESSION['calcul_food']);

        $this->redirectToRoute('user_login');
	}

}
