<?php

namespace App\Repository;

use App\Entity\EntityInterface;
use App\Repository\AbstractRepository;
use App\Entity\User;


class UserRepository extends AbstractRepository
{
    //Constructeur
    public function __construct() 
    {
        $this->setConnexion();
    }

    //Ajouter un Utilisateur
    public function saveUser(User $user): void
    {
        //1 écrire la requête SQL
        $request = "INSERT INTO users(firstname, lastname, email, pseudo, `password`, img_profile, grants, `status`)
        VALUE (?,?,?,?,?,?,?,?)";
        //2 préparation de la requête
        $req = $this->connexion->prepare($request);
        //3 assigner les paramètres
        $req->bindValue(1, $user->getFirstname(), \PDO::PARAM_STR);
        $req->bindValue(2, $user->getLastname(), \PDO::PARAM_STR);
        $req->bindValue(3, $user->getEmail(), \PDO::PARAM_STR);
        $req->bindValue(4, $user->getPseudo(), \PDO::PARAM_STR);
        $req->bindValue(5, $user->getPassword(), \PDO::PARAM_STR);
        $req->bindValue(6, $user->getImgProfil(), \PDO::PARAM_STR);
        $req->bindValue(7, implode(",", $user->getGrants()), \PDO::PARAM_STR);
        $req->bindValue(8, $user->getStatus(), \PDO::PARAM_BOOL);
        //4 exécuter la requête
        $req->execute();
    }
    //Afficher un Utilisateur
    public function find(int $id): ?EntityInterface
    {
        return new EntityInterface();
    }
    
    //Afficher tous les Utilisateur
    public function findAll(): array
    {
        return [];
    }
    //Modifier un Utilisateur
}
