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
	        	spl_autoload_register(function($class) {
		    		include  $class . '.php';
				});

				$bucheron = new \Buildings\Bucheron();
				$ferme = new \Buildings\Ferme();
				$puit = new \Buildings\Puit();

	        	$UserModel = new UserModel();
	            $refresh1 = $_SESSION["refresh"];
	            $refresh2 = date_format($date, 'U');
	            $timer = $refresh2 - $refresh1;
	            echo $timer." secondes ce sont écoulé depuis le dernier refresh.<br>";
	            $_SESSION["refresh"] = $refresh2;
	            $id_user = $_SESSION["user"]["id"];
	            $wood = &$_SESSION["ressources"]->wood;
	            $water = &$_SESSION["ressources"]->water;
	            $food = &$_SESSION["ressources"]->food;

	            // Calcule Wood
	            $calcul_wood = round(($bucheron->GetProd()) * $timer);
	            $final_wood = null;
	            if ($calcul_wood < 3) {
	            	$final_wood = 3;
	            } 
	            else {
	            	$final_wood = round(($bucheron->GetProd()) * $timer);
	        	}

	        	// Calcul Water
	        	$calcul_water = round(($ferme->GetProd()) * $timer);
	            $final_water = null;
	            if ($calcul_water < 1) {
	            	$final_water = 1;
	            } 
	            else {
	            	$final_water = round(($ferme->GetProd()) * $timer);
	        	}

	        	// Calcul Food
	        	$calcul_food = round(($puit->GetProd()) * $timer);
	            $final_food = null;
	            if ($calcul_food < 2) {
	            	$final_food = 2;
	            } 
	            else {
	            	$final_food = round(($puit->GetProd()) * $timer);
	        	}

	        	echo "Vous avez gagné ".$final_wood." bois.<br>";
	        	echo "Vous avez gagné ".$final_water." eaux.<br>";
	        	echo "Vous avez gagné ".$final_food." nourritures.<br>";
	            $wood += $final_wood;
	            $water += $final_water;
	            $food += $final_food;
	            $UserModel->refreshRessources($wood, $water, $food, $id_user);
	            // $UserModel->refreshBuildings(1,1,1,1,1,1,1,1,1,1,1);

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
