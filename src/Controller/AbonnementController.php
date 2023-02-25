<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbonnementController extends AbstractController
{
    #[Route('/abonnement/', name: 'app_abonnement_')]
    public function index(): Response
    {
        return $this->render('abonnementù/index.html.twig', [
            'controller_name' => 'AbonnementùController',
        ]);
    }

}
