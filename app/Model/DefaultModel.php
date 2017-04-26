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
	        if (isset($_SESSION["refresh_wood"]) || isset($_SESSION["refresh_water"]) || isset($_SESSION["refresh_food"])){
	        	
				$bucheron = new \Buildings\Bucheron();
				$ferme = new \Buildings\Ferme();
				$puit = new \Buildings\Puit();

	        	$UserModel = new UserModel();
				var_dump($UserModel->selectTimeBDD($_SESSION["user"]["id"]));
	            // Timmer Wood
	            $refresh_wood1 = $_SESSION["refresh"]->refresh_wood;
	            $refresh_wood2 = date_format($date, 'U');
	            $timer_wood = $refresh_wood2 - $refresh_wood1;

	            // $timer_wood = 500000;

	            // Timmer Water
	            $refresh_water1 = $_SESSION["refresh"]->refresh_water;
	            $refresh_water2 = date_format($date, 'U');
	            $timer_water = $refresh_water2 - $refresh_water1;

	            // $timer_water = 50000;


	            // Timmer Food
	            $refresh_food1 = $_SESSION["refresh"]->refresh_food;
	            $refresh_food2 = date_format($date, 'U');
	            $timer_food = $refresh_food2 - $refresh_food1;

	            // $timer_food = 50000;


	         	
	            echo $timer_wood." secondes ce sont écoulé depuis le dernier refresh de bois.<br>";
	            echo $timer_water." secondes ce sont écoulé depuis le dernier refresh d'eaux.<br>";
	            echo $timer_food." secondes ce sont écoulé depuis le dernier refresh de nourritures.<br>";

	            $id_user = $_SESSION["user"]["id"];
	            $wood = &$_SESSION["ressources"]->wood;
	            $water = &$_SESSION["ressources"]->water;
	            $food = &$_SESSION["ressources"]->food;

	            // Calcule Wood
	            $_SESSION["calcul_wood"] = round(($bucheron->GetProd()) * $timer_wood);
	            $final_wood = 0;
	            if ($_SESSION["calcul_wood"] >= 1) {
	            	$final_wood = $_SESSION["calcul_wood"];
	            	$wood += $final_wood;
	            	$_SESSION["refresh"]->refresh_wood = $refresh_wood2;
	            }

	        	// Calcul Water
	        	$_SESSION["calcul_water"] = round(($puit->GetProd()) * $timer_water);
	            $final_water = 0;
	            if ($_SESSION["calcul_water"] >= 1) {
	            	$final_water = $_SESSION["calcul_water"];
	            	$water += $final_water;
	            	$_SESSION["refresh"]->refresh_water = $refresh_water2;
	            } 

	        	// Calcul Food
	        	$_SESSION["calcul_food"] = round(($ferme->GetProd()) * $timer_food);
	            $final_food = 0;
	            if ($_SESSION["calcul_food"] >= 1) {
	            	$final_food = $_SESSION["calcul_food"];
	            	$food += $final_food;
	            	$_SESSION["refresh"]->refresh_food = $refresh_food2;
	            } 
	        	// var_dump( $bucheron->GetProd());
	        	// var_dump( $ferme->GetProd());
	        	// var_dump( $puit->GetProd());
	        	// var_dump( $_SESSION["calcul_wood"]);
	        	// var_dump( $_SESSION["calcu
	        	// var_dump( $_SESSION["calcul_water"]);

	        	echo "Vous avez gagné ".$final_wood." bois.<br>";
	        	echo "Vous avez gagné ".$final_water." eaux.<br>";
	        	echo "Vous avez gagné ".$final_food." nourritures.<br>";
	            // $wood += $final_wood;
	            // $water += $final_water;
	            // $food += $final_food;
	            $UserModel->refreshRessources($wood, $water, $food, $id_user);
	            // $UserModel->refreshBuildings(1,1,1,1,1,1,1,1,1,1,1);

	        }
	        else {
	        	$UserModel = new UserModel();
	        	$id_user = $_SESSION["user"]["id"];
	        	unset($_SESSION['refresh']);

	            $_SESSION['refresh'] = $UserModel->selectTimeBDD($id_user); 
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
