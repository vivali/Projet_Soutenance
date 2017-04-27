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

    function refreshRessources($wood, $water, $food, $id_user){

    	$query = $this->dbh->prepare("
    		UPDATE ressources r
			SET wood = :wood, water = :water, food = :food
			WHERE r.id_user = :id_user
    	");

        $query->bindParam(':wood', $wood, \PDO::PARAM_INT);
        $query->bindParam(':water', $water, \PDO::PARAM_INT);
        $query->bindParam(':food', $food, \PDO::PARAM_INT);

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

    function setTimeConstruct($nom_bdd, $nom_jointure, $valeur, $id_user){

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
		    	SELECT u.refresh_wood, u.refresh_water, u.refresh_food
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
}
