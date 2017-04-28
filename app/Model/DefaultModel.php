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
	        	
				$bucheron = new \Buildings\Bucheron();
				$ferme = new \Buildings\Ferme();
				$puit = new \Buildings\Puit();
				$radio = new \Buildings\StationRadio();

	        	$UserModel = new UserModel();
				
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

	            // Timmer camper
	            $refresh_camper1 = $_SESSION["refresh"]->refresh_camper;
	            $refresh_camper2 = date_format($date, 'U');
	            $timer_camper = $refresh_camper2 - $refresh_camper1;
	            
	            // $timer_camper = 3600;

	         	
	            // echo $timer_wood." secondes ce sont écoulé depuis le dernier refresh de bois.<br>";
	            // echo $timer_water." secondes ce sont écoulé depuis le dernier refresh d'eaux.<br>";
	            // echo $timer_food." secondes ce sont écoulé depuis le dernier refresh de nourritures.<br>";
	            echo $timer_camper." secondes ce sont écoulé depuis le dernier refresh de camper.<br>";

	            $id_user = $_SESSION["user"]["id"];
	            $wood = &$_SESSION["ressources"]->wood;
	            $water = &$_SESSION["ressources"]->water;
	            $food = &$_SESSION["ressources"]->food;
	            $camper = &$_SESSION["ressources"]->camper;

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

	            // Calcul camper
	            $_SESSION["calcul_camper"] = round(($radio->GetProd()) * $timer_camper);
	            $final_camper = 0;
	            if ($_SESSION["calcul_camper"] >= 1) {
	            	$final_camper = $_SESSION["calcul_camper"];
	            	$camper += $final_camper;
	            	$_SESSION["refresh"]->refresh_camper = $refresh_camper2;
	            } 
	        	// var_dump( $bucheron->GetProd());
	        	// var_dump( $ferme->GetProd());
	        	// var_dump( $puit->GetProd());
	        	// var_dump( $_SESSION["calcul_wood"]);
	        	// var_dump( $_SESSION["calcu
	        	// var_dump( $_SESSION["calcul_water"]);

	        	// echo "Vous avez gagné ".$final_wood." bois.<br>";
	        	// echo "Vous avez gagné ".$final_water." eaux.<br>";
	        	// echo "Vous avez gagné ".$final_food." nourritures.<br>";
	        	echo "Vous avez gagné ".$final_camper." campers.<br>";
	            // $wood += $final_wood;
	            // $water += $final_water;
	            // $food += $final_food;
	            $UserModel->refreshRessources($wood, $water, $food, $camper, $id_user);
	            // $UserModel->refreshBuildings(1,1,1,1,1,1,1,1,1,1,1);

	        }
	        else {
	        	$UserModel = new UserModel();
	        	$id_user = $_SESSION["user"]["id"];

	            $_SESSION['refresh'] = $UserModel->selectTimeBDD($id_user); 
	        }
	    }
	}

	function buttonConstruct($duree, $fin, $id, $timer) {
		return "<style>
		#bar".$id." {
		margin-top: 7px; 
		height: 30px; 
		background: red; 
		width: 0; 
		transition: 1s; 
	    }</style><script>

		var debut".$id." = 0;
		var calcul".$id." = ".$duree.";
		var calcul2".$id." = calcul".$id." - Math.round(Date.now() / 1000);
		var fin".$id." = ".$fin.";
		var now".$id." = fin".$id." - calcul2".$id."; 
		var timer".$id." = ".$timer." - Math.round(Date.now() / 1000);
		$(document).ready(function(){ 
			$('#bar".$id."').css({ 
				'width': ((now".$id." * 100) / fin".$id.") + '%' });
			 });
			 var date".$id." = new Date(null);
			 result".$id." = date".$id.".setSeconds(timer".$id.");
			 $('#time".$id."').html(result".$id.");
		var barre".$id." = setInterval(function(){ myTimer".$id."() }, 1000);
		function StopFunction".$id."() {
		 	clearInterval(barre".$id.");
		}

		function myTimer".$id."() {
			calcul2".$id." = calcul".$id." - Math.round(Date.now() / 1000);
			timer".$id." = ".$timer." - Math.round(Date.now() / 1000); 
			now".$id." = fin".$id." - calcul2".$id.";
			$(document).ready(function(){ 
				$('#bar".$id."').css({ 
					'width': ((now".$id." * 100) / fin".$id.") + '%' });
				 });
				var date".$id." = new Date(null);
				result".$id." = date".$id.".setSeconds(timer".$id.");
				result".$id." = date".$id.".toISOString().substr(11, 8);
				$('#time".$id."').html(result".$id.");
			if (((now".$id." * 100) / fin".$id.") >= 100){
				StopFunction".$id."();
				window.location.reload();
			}
		}
		</script>";
	}

	function buttonConstruct2($duree, $fin) {
		return "<style>
		#bar {
		margin-top: 7px; 
		height: 30px; 
		background: red; 
		width: 0; 
		transition: 1s; 
	    }</style><script>

		var debut = 0;
		var duree = ".$duree."; // 42
		
		var fin = ".$fin."; // timestamp
		var current = fin - Math.round(Date.now() / 1000);
		var now = duree - current;
		console.log(now);
		$(document).ready(function(){ 
			$('#bar').css({ 
				'width': ((now * 100) / fin) + '%'
			});
			var barre = setInterval(function(){ myTimer() }, 1000);
			function StopFunction() {
			 	clearInterval(barre);
			}

			function myTimer() {
				var current = fin - Math.round(Date.now() / 1000);
				var now = duree - current;
				console.log(now);
				$('#bar').css({ 
					'width': ((now * 100) / fin) + '%'
				});
				if (((now * 100) / fin) >= 100){
					StopFunction();
				}	
			}
		});
		
		
	 	 </script>";
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
