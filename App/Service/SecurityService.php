<?php

namespace App\Service;

use App\Repository\UserRepository;

class SecurityService
{
    private readonly UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    //Logique métier de la création de compte
    public function addUser() {}

    //Logique métier de la connexion
    public function connexion() {}

    //Logique métier de la déconnexion
    public function deconnexion() {}
}
