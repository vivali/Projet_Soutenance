<?php

namespace Model;

use \W\Model\Model;

class ReportsModel extends Model
{
    public function findAllById($id_user, $orderBy = 'report_date', $orderDir = 'DESC', $limit = null, $offset = null)
    {

        $sql = 'SELECT * FROM ' . $this->table;

        $sql .= ' WHERE id_user = '.$id_user;
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
