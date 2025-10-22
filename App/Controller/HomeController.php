<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\UserRepository;
use App\DTO\TestDTO;
use App\DTO\TestDTOWrapper;

class HomeController extends AbstractController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /* 
    //Exemple utilisation d'un DTO
    public function index() {
        $user = $this->userRepository->findV2(1);
        $dto = TestDTOWrapper::wrappUserToTestDTO($user);
        dd($user, $dto);
        $this->render("home", "vide");
    } */


    public function index() 
    {
        $this->render("home", "vide");
    }
}
