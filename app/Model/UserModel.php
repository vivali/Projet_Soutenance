<?php

namespace Model;

use \W\Model\Model;
use \W\Model\UsersModel;

class UserModel extends UsersModel
{
    function getAllTable($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT u.*, b.*, r.*
			FROM users u
			INNER JOIN buildings b
			ON u.id = b.id_user
			INNER JOIN ressources r
			ON u.id = r.id_user
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function getUTable($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT u.*
			FROM users u
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function getBTable($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT b.*
			FROM users u
			INNER JOIN buildings b
			ON u.id = b.id_user
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function getCTable($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT c.*
			FROM users u
			INNER JOIN construct c
			ON u.id = c.id_user
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function getBLevel($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT b.*
			FROM users u
			INNER JOIN buildings b
			ON u.id = b.id_user
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function getRTable($id_user){
	    $query = $this->dbh->prepare("
	    	SELECT r.*
			FROM users u
			INNER JOIN ressources r
			ON u.id = r.id_user
			WHERE u.id = :id_user
		");
	    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
	    $query->execute();

	    return $query->fetch(\PDO::FETCH_OBJ);
    }

    function refreshRessources($wood, $water, $food, $camper, $id_user){

    	$query = $this->dbh->prepare("
    		UPDATE ressources r
			SET wood = :wood, water = :water, food = :food, camper = :camper
			WHERE r.id_user = :id_user
    	");

        $query->bindParam(':wood', $wood, \PDO::PARAM_INT);
        $query->bindParam(':water', $water, \PDO::PARAM_INT);
        $query->bindParam(':food', $food, \PDO::PARAM_INT);
        $query->bindParam(':camper', $camper, \PDO::PARAM_INT);

        $query->bindParam(":id_user", $id_user, \PDO::PARAM_INT);

        return $query->execute();

    }


    function refreshAllBuildings($wood_farm, $water_farm,  $food_farm, $wood_stock, $water_stock, $food_stock, $cabanon, $radio, $wall, $camp, $id_user){


    	$query = $this->dbh->prepare("
    		UPDATE buildings b
			SET wood_farm = :wood_farm, water_farm = :water_farm,  food_farm = :food_farm, wood_stock = :wood_stock, water_stock = :water_stock, food_stock = :food_stock, cabanon = :cabanon, radio = :radio, wall = :wall, camp = :camp
			WHERE b.id_user = :id_user
    	");

        $query->bindParam(':wood_farm', $wood_farm, \PDO::PARAM_INT);
        $query->bindParam(':water_farm', $water_farm, \PDO::PARAM_INT);
        $query->bindParam(':food_farm', $food_farm, \PDO::PARAM_INT);
        $query->bindParam(':wood_stock', $wood_stock, \PDO::PARAM_INT);
        $query->bindParam(':water_stock', $water_stock, \PDO::PARAM_INT);
        $query->bindParam(':food_stock', $food_stock, \PDO::PARAM_INT);
        $query->bindParam(':cabanon', $cabanon, \PDO::PARAM_INT);
        $query->bindParam(':radio', $radio, \PDO::PARAM_INT);
        $query->bindParam(':wall', $wall, \PDO::PARAM_INT);
        $query->bindParam(':camp', $camp, \PDO::PARAM_INT);

        $query->bindParam(":id_user", $id_user, \PDO::PARAM_INT);

        $query->execute();

        return $query->rowCount() > 0 ? true : false;

    }

    function refreshBuildings($nom_bdd, $nom_jointure, $valeur, $id_user){

    	$query = $this->dbh->prepare("
    		UPDATE buildings b
			SET $nom_bdd = $nom_jointure
			WHERE b.id_user = :id_user
    	");

        $query->bindParam($nom_jointure, $valeur, \PDO::PARAM_INT);

        $query->bindParam(":id_user", $id_user, \PDO::PARAM_INT);

        $query->execute();

        return $query->rowCount() > 0 ? true : false;

    }

    function TimeConstruct($nom_bdd, $nom_jointure, $valeur, $id_user){

    	$query = $this->dbh->prepare("
    		UPDATE construct c
			SET $nom_bdd = $nom_jointure
			WHERE c.id_user = :id_user
    	");

        $query->bindParam($nom_jointure, $valeur, \PDO::PARAM_INT);

        $query->bindParam(":id_user", $id_user, \PDO::PARAM_INT);

        return $query->execute();

    }

	function selectTimeBDD ($id_user){
	    	$query = $this->dbh->prepare("
		    	SELECT u.refresh_wood, u.refresh_water, u.refresh_food, u.refresh_camper
				FROM users u
				WHERE u.id = :id_user
			");
		    $query->bindValue(":id_user", $id_user, \PDO::PARAM_INT);
		    $query->execute();

		    return $query->fetch(\PDO::FETCH_OBJ);
	    }

    function refreshTimeBDD ($nom_bdd, $nom_jointure, $valeur, $id_user){
    	$query = $this->dbh->prepare("
    		UPDATE users u
			SET $nom_bdd = $nom_jointure
			WHERE u.id = :id_user
    	");

        $query->bindParam($nom_jointure, $valeur, \PDO::PARAM_INT);

        $query->bindParam(":id_user", $id_user, \PDO::PARAM_INT);

        $query->execute();

        return $query->rowCount() > 0 ? true : false;
    }

    public function findAllJoinCampers($orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
	{

		$sql = 'SELECT * FROM ' . $this->table;

        $sql .= ' LEFT JOIN ressources ON users.id = ressources.id_user';

		if (!empty($orderBy)){

			//sécurisation des paramètres, pour éviter les injections SQL
			if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
				die('Error: invalid orderBy param');
			}
			$orderDir = strtoupper($orderDir);
			if($orderDir != 'ASC' && $orderDir != 'DESC'){
				die('Error: invalid orderDir param');
			}
			if ($limit && !is_int($limit)){
				die('Error: invalid limit param');
			}
			if ($offset && !is_int($offset)){
				die('Error: invalid offset param');
			}

			$sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
		}


        if($limit){
            $sql .= ' LIMIT '.$limit;
            if($offset){
                $sql .= ' OFFSET '.$offset;
            }
        }
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

    public function getAttacked($id_user, $wallLevel = 0, $probaZombie, $probaPlayer) {
        // Chance d'attaque
        $atk = rand(0, 100);

        // Modif de test
        $probaZombie = 0; $probaPlayer = 100;

        // Attaque de zombies ?
        if ($atk < $probaZombie){
            $atkResult = rand(0, 100);

            // 50% plus 2*le niveau du mur de ne pas subir de perte
            // mur niveau 25 = les zombies n'ont plus d'impact
            if ($atkResult > ( 50 + ($wallLevel * 2) )) {
                // Récupération des ressources de l'utilisateur
                $ressources = $this->getRtable($id_user);

                // Attaque de zombie = perdre entre 20 et 30% de ressources
                $newWater = round($ressources->water * (1 - 0.01*rand(20, 30)));
                $newFood  = round($ressources->food  * (1 - 0.01*rand(20, 30)));
                $newWood  = round($ressources->wood  * (1 - 0.01*rand(20, 30)));

                // Rapport d'attaque
                $report = "Vous avez subi une attaque de zombies.<br>
                Vous avez perdu :<br>"
                .($ressources->water - $newWater)." eau,<br>"
                .($ressources->food - $newFood)." nourritures,<br>"
                .($ressources->wood - $newWood)." bois.<br>";

                // Update les ressources
                $this->refreshRessources($newWood, $newWater, $newFood, $ressources->camper, $id_user);
                $_SESSION['ressources']->wood = $newWood;
                $_SESSION['ressources']->water = $newWater;
                $_SESSION['ressources']->food = $newFood;

            } else {
                // Rapport d'attaque
                $report = "Vous avez subi une attaque de zombies.<br>
                Votre mur vous a permis de vous defendre sans perdre de ressources.";
            }
            $reportName = "Attaque de zombies";

            // Fin attaque de zombies
        } elseif ( $atk < ($probaZombie + $probaPlayer) ) {
            // Attaque de joueur ?
            /*
            attack:
            0: n'attaque pas
            1: veut attaquer

            - Trouver s'il y a des joueurs qui veulent attaquer
            - S'il y en a, on check la proba atkPlayer + atkZombie
            - Résultat de l'attaque :
            . Défaite : capacité max transport = 20 * campeur de l'attaquant
            capaMax = capacitéMax / 3
            déf ressource loss -= 20% <  < 70%
            gain = min(capaMax, déf ressource loss)
            perte de campeur ? pour qui ?
            --> ajoute les gain à l'attaquant, les retire au défenseur

            . Victoire : l'attaquant perd des campeurs, le défenseur en gagne ?
            */
            $atkResult = rand(0, 100);
            $users = $this->findAll();
            foreach ($users as $key => $user) {
                if ($user['attacking_campers']) {
                    // Les utilisateurs attaquant
                    $attackingUsers [] = $user;
                }
            }

            // L'utilisateur qui attaque
            $user = $attackingUsers[ rand(0, ( sizeof($attackingUsers)-1 )) ];

            $defense = ($wallLevel * 100) - $user['attacking_campers'];

            // Mur plus fort que l'attaque
            if ($defense < 0) { // A CHANGER
                // Perte de 70 à 90% des campers attaquant
                $attackersLeft = round($user['attacking_campers'] * (1-0.01*rand(70,90)));
                var_dump($user['attacking_campers']);
                var_dump($attackersLeft);

                // Calcul des pertes pour le défenseurs
                $defendingCampers = $this->getRTable($id_user)->camper;
                var_dump($defendingCampers);

                $defendingCampersLost = $user['attacking_campers'] * (1 - 0.01*rand(1, 5));
                var_dump($defendingCampersLost);
                var_dump($defendingCampers);
            }

            $reportName = "Vous avez été attaqué pendant la nuit";
            $report = "Résultat de l'attaque.";
        } else {
            // Aucune attaque dans la nuit
            $reportName = "Compte rendu de la nuit";
            $report = "La nuit a été calme.";
        }

        // Ajouter le rapport à l'utilisateur en bdd
        $report_manager = new ReportsModel();
        $report_manager->insert([
            'id_user'   => $id_user,
            'name'      => $reportName,
            'report'    => $report,
        ], false);


    }

}
