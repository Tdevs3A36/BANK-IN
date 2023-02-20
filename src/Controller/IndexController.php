<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function home(): Response
    {
        return $this->render('index/index_front.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->redirectToRoute('home');
    }

    #[Route('/admin', name: 'admin')]
    public function admin(): Response
    {
        return $this->render('index/index_back.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/back', name: 'back')]
    public function back(): Response
    {
        return $this->redirectToRoute('admin');
    }

    #[Route('/agent', name: 'agent')]
    public function agent(): Response
    {
        return $this->render('index/index_agent.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/back_agent', name: 'back_agent')]
    public function back_agent(): Response
    {
        return $this->redirectToRoute('agent');
    }
}
