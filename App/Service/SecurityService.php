<?php

namespace App\Service;

use App\Repository\UserRepository;
use App\Entity\User;
use Mithridatem\Validation\Validator;
use Mithridatem\Validation\Exception\ValidationException;

class SecurityService
{
    private readonly UserRepository $userRepository;
    private readonly Validator $validator;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->validator = new Validator();
    }

    //Logique métier de la création de compte
    public function addUser(array $user): string
    {

        //Test si les mots de passe sont identiques
        if ($user["password"] != $user["verif_password"]) {
            return "Les mots de passe ne sont pas identiques";
        }

        //Test si l'utilisateur existe 
        if ($this->userRepository->isUserExistWithEmail($user["email"])) {
            return "Les informations email / password sont incompatibles avec l'ajout d'un compte";
        }

        //Assigner les valeurs par défault
        $user["imgProfil"] = "profil.png";
        $user["status"] = true;
        $user["grants"] = "ROLE_USER";

        //Hydratation en User
        $newUser = User::hydrateUser($user);

        try {
            $this->validator->validate($newUser);
        } catch (ValidationException $e) {
            return $e->getMessage();
        }

        //Hash du password
        $newUser->hashPassword();

        try {
            //code//Save en BDD du User
            $this->userRepository->saveUser($newUser);
        } catch (\PDOException $ex) {
            return "Erreur d'enregistrement";
        }

        return "Le compte " . $newUser->getEmail() . " a été ajouté en BDD";
    }

    //Logique métier de la connexion
    public function connexion() {}

    //Logique métier de la déconnexion
    public function deconnexion() {}
}
