<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Service\SecurityService;

class SecurityController extends AbstractController
{
    private readonly SecurityService $securityService;

    public function __construct()
    {
        $this->securityService = new SecurityService();
    }

    //Méthode login (se connecter)
    public function login() {
        $this->securityService->connexion();
        $this->render('','');
    }

    //Méthode logout (se déconnecter)
    public function logout() {
         $this->securityService->deconnexion();
        $this->render('','');
    }

    //Méthode register (créer un compte User)
    public function register() {
        //Test si le formulaire est submit
        if ($this->isFormSubmitted($_POST)) {
            //Appel de la logique du service
            $message = $this->securityService->addUser($_POST);
            $data["message"] = $message;
        }
        
        //rendu de la vue
        $this->render('register','register', $data ?? []);
    }
}
