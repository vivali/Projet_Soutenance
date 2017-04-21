<?php

namespace Model;

class DefaultModel extends \W\Model\Model {

	function formatString ($string) {
	    $string = trim($string);
	    $string = addslashes($string);
	    return $string;
	}

	function printError ($error, $field) {
	    foreach ($error as $data) {
	         if ( $data['field'] == $field ) {
	             return $data['message'];
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
