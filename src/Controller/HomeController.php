<?php

namespace App\Controller;

use App\Repository\MediationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MediationsRepository $mediationsRepository): Response
    {
        return $this->render('home/index.html.twig', [
            "user" => $this->getUser(),
            "mediations" =>$mediationsRepository->findAll()
        ]);
    }
}
