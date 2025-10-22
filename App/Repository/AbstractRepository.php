<?php

namespace App\Repository;

use App\Database\MariaDB;
use App\Entity\EntityInterface;

abstract class AbstractRepository
{
    //Attributs pour la connexion
    protected \PDO $connexion;

    //Initialisation de la connexion à la BDD
    protected function setConnexion(): void
    {
        $this->connexion = (new MariaDB())->connectBdd();
    }

    /**
     * @param int $id Id de l'entité à rechercher
     */
    abstract public function find(int $id):?EntityInterface;
    
    /**
     * @return array<EntityInterface>
     */
    abstract public function findAll():array;
}
