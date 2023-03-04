<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BudgetRepository;
class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(BudgetRepository $budgetRepository): Response
    {
        /* $lastbudget[] = $budgetRepository->findlastbudget();
        foreach ($lastbudget as $item) {
            $d2 = $item[0]['id'];
         } */
        return $this->render('index/index_front.html.twig', [
            'controller_name' => 'IndexController',
            /* 'b'=>$d2, */
        ]);
    }
    #[Route('/back', name: 'app_index_back')]
    public function index_back(): Response
    {
        return $this->render('index/index_back.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
