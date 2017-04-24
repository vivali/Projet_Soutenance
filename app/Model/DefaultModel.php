<?php

namespace Model;

use \Model\UserModel;

class DefaultModel extends \W\Model\Model {
	function formatString ($string) {
	    $string = trim($string);
	    $string = addslashes($string);
	    return $string;
	}

	function printError ($errors, $field) {
	    foreach ($errors as $key => $data) {
	         if ( $key == $field ) {
	             return $data;
	         }
	    }
	}

	function refreshTimer() {
		if (isset($_SESSION["user"])) {
			$date = date_create();
	        if (isset($_SESSION["refresh"])){
	        	$UserModel = new UserModel();
	            $refresh1 = $_SESSION["refresh"];
	            $refresh2 = date_format($date, 'U');
	            $timer = $refresh2 - $refresh1;
	            echo $timer." secondes ce sont écoulé depuis le dernier refresh.";
	            $_SESSION["refresh"] = $refresh2;
	            $id_user = $_SESSION["user"]["id"];
	            $wood = &$_SESSION["ressources"]->wood;
	            $water = &$_SESSION["ressources"]->water;
	            $food = &$_SESSION["ressources"]->food;
	            $wood += 2;
	            $water += 8;
	            $food += 7;
	            $UserModel->refreshUpdate($wood, $water, $food, $id_user);

	        }
	        else {
	            $_SESSION['refresh'] = date_format($date, 'U'); 
	        }
	    }
	}

	// Création du message flash
	function setFlashbag($message) {

	    // On definit si $_SESSION["flashbag"] est un tableau
	    // Si ce n'est pas le cas, on le créer
	    if (!isset($_SESSION["flashbag"]))
	        $_SESSION["flashbag"] = array();

	    // On ajoute les messages à la session flashbag
	    array_push($_SESSION["flashbag"], $message);
	}

	// Retourne et supprime le message flash
	function getFlashbag() {
	    $output = "";
	    if (isset($_SESSION['flashbag'])) {

	        $output = implode("<br>", $_SESSION['flashbag']);

	        // Suppression du message "flashbag" de la $_SESSION
	        unset($_SESSION['flashbag']);
	    }
	    return $output;
	}

	function validateDate($date)
	{
	    $d = DateTime::createFromFormat('Y-m-d', $date);
	    // return $d && $d->format('Y-m-d') === $date;
	    return true;
	}
}
