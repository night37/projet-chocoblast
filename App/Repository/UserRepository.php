<?php
namespace App\Repository;

use App\Database\MariaDB;
use App\Entity\User;
class UserRepository {

    private \PDO $connexion;

    public function __construct() {
        $this->connexion = (new MariaDB())->connectBdd();
    }


    //Ajouter un utilisateur
    public function saveUser(User $user): void {
        //écrire la requete sql
        $sql = 'INSERT INTO users(firstname, lastname, email, pseudo, `password`, img_profile, grants, `status`)
        VALUE(?, ?, ?, ?, ?, ?, ?, ?)';

        $request = $this->connexion->prepare($sql);
        $request->bindValue(1, $user->getFirstname(), \PDO::PARAM_STR);
        $request->bindValue(2, $user->getLastname(), \PDO::PARAM_STR);
        $request->bindValue(3, $user->getEmail(), \PDO::PARAM_STR);
        $request->bindValue(4, $user->getPseudo(), \PDO::PARAM_STR);
        $request->bindValue(5, $user->getPassword(), \PDO::PARAM_STR);
        $request->bindValue(6, $user->getImgProfil(), \PDO::PARAM_STR);
        $request->bindValue(7, implode(',', $user->getGrants()), \PDO::PARAM_STR);
        $request->bindValue(8, $user->getStatus(), \PDO::PARAM_BOOL);

        $request->execute();
        //executer la requete

    }

    //Afficher un utilisateur
    //Afficher tout les utilisateurs
    //Modifier un utilisateur


}