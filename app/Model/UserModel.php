<?php

namespace Model;

class UserModel extends \W\Model\Model {
    
    /**
     * Récupération de tout les utilisateurs avec un ORDER en parametre
     */
    function getUsers($orderBy="ASC") {

        

        $query = $this->dbh->query("SELECT id, firstname, lastname FROM users ORDER BY lastname $orderBy");

        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Insert de l'utilisateur dans la bdd
     */
    function setUser($firstname, $lastname, $email, $password, $genre, $birthday) {

        

        $query = $this->dbh->prepare("INSERT INTO users (`firstname`, `lastname`, `email`, `password`, `genre`, `birthday`)
                                                    VALUES (:firstname,  :lastname, :email,  :password,  :genre,  :birthday)");

        $query->bindParam(':firstname', $firstname, \PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname, \PDO::PARAM_STR);
        $query->bindParam(':email', $email, \PDO::PARAM_STR);
        $query->bindParam(':password', $password, \PDO::PARAM_STR);
        $query->bindParam(':genre', $genre, \PDO::PARAM_STR);
        $query->bindParam(':birthday', $birthday, \PDO::PARAM_STR);

        $query->execute();

        // Récupération du dernier enregistrement (ID)
        return $this->dbh->lastInsertId();
    }

    /**
     * Récupération d'un utilisateur celon l'id
     */
    function getUser($id) {

        

        $query = $this->dbh->prepare("SELECT * FROM users WHERE id=:idUser");

        $query->bindValue(":idUser", $id, \PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Récupération d'un utilisateur celon l'email
     */
    function getUserByEmail($email) {

       

       $query = $this->dbh->prepare("SELECT * FROM users WHERE email=:emailUser");

       $query->bindValue(":emailUser", $email, \PDO::PARAM_STR);
       $query->execute();

       return $query->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * Modification d'un utilisateur
     */
    function updateUser($id, $firstname, $lastname, $email, $password) {

        

        $query = $this->dbh->prepare("UPDATE users SET firstname=:firstname, lastname=:lastname, email=:email, password=:password WHERE id=:idUser");

        $query->bindParam(':firstname', $firstname, \PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname, \PDO::PARAM_STR);
        $query->bindParam(':email', $email, \PDO::PARAM_STR);
        $query->bindParam(':password', $password, \PDO::PARAM_STR);
        $query->bindParam(":idUser", $id, \PDO::PARAM_INT);

        $query->execute();

        return $query->rowCount() > 0 ? true : false;
    }
}