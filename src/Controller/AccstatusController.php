<?php

namespace App\Controller;

use App\Entity\Accstatus;
use App\Form\AccstatusType;
use App\Repository\AccstatusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/accstatus')]
class AccstatusController extends AbstractController
{
    #[Route('/', name: 'app_accstatus_index', methods: ['GET'])]
    public function index(AccstatusRepository $accstatusRepository): Response
    {
        return $this->render('accstatus/index.html.twig', [
            'accstatuses' => $accstatusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_accstatus_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AccstatusRepository $accstatusRepository): Response
    {
        $accstatus = new Accstatus();
        $form = $this->createForm(AccstatusType::class, $accstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $accstatusRepository->save($accstatus, true);

            return $this->redirectToRoute('app_accstatus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('accstatus/new.html.twig', [
            'accstatus' => $accstatus,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_accstatus_show', methods: ['GET'])]
    public function show(Accstatus $accstatus): Response
    {
        return $this->render('accstatus/show.html.twig', [
            'accstatus' => $accstatus,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_accstatus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Accstatus $accstatus, AccstatusRepository $accstatusRepository): Response
    {
        $form = $this->createForm(AccstatusType::class, $accstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $accstatusRepository->save($accstatus, true);

            return $this->redirectToRoute('app_account_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('accstatus/edit.html.twig', [
            'accstatus' => $accstatus,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_accstatus_delete', methods: ['POST'])]
    public function delete(Request $request, Accstatus $accstatus, AccstatusRepository $accstatusRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$accstatus->getId(), $request->request->get('_token'))) {
            $accstatusRepository->remove($accstatus, true);
        }

        return $this->redirectToRoute('app_accstatus_index', [], Response::HTTP_SEE_OTHER);
    }
}
