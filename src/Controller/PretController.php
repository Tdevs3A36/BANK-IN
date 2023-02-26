<?php

namespace App\Controller;

use App\Entity\Account;
use App\Entity\Etatpret;
use App\Entity\Pret;
use App\Form\AccountType;
use App\Form\PretType;
use App\Repository\AccountRepository;
use App\Repository\EtatpretRepository;
use App\Repository\PretRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pret')]
class PretController extends AbstractController
{
    #[Route('/account', name: 'app_pret_account', methods: ['GET', 'POST'])]
    public function selectAccount(Request $request): Response
    {
        $accounts = $this->getDoctrine()
            ->getRepository(Account::class)
            ->findAll();

        $form = $this->createFormBuilder()
            ->add('account', ChoiceType::class, [
                'choices' => $accounts,
                'choice_label' => 'NomComplet',
                'placeholder' => 'Choose an account',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Select',
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $accountId = $form->get('account')->getData()->getId();
            return $this->redirectToRoute('app_pret_new', ['id' => $accountId]);
        }

        return $this->render('pret/account.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/', name: 'app_pret_desc', methods: ['GET'])]
    public function desc(PretRepository $pretRepository): Response
    {
        /*  return $this->render('pret1/index.html.twig', [
            'prets' => $pretRepository->findAll(),
        ]); */
        return $this->render('pret/firstpage.html.twig');
    }


    #[Route('/list', name: 'app_pret_list', methods: ['GET', 'POST'])]
    public function index(PretRepository $pretRepository, Request $request): Response
    {


        return $this->render('pret/index.html.twig', [
            'prets' => $pretRepository->findAll(),
        ]);
    }



    #[Route('/new', name: 'app_pret_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PretRepository $pretRepository, AccountRepository $accountRepository, EtatpretRepository $etatrepo): Response
    {
        $pret = new Pret();
        $form = $this->createForm(PretType::class, $pret);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $accountId = $request->get('id');
            $account = $accountRepository->find($accountId);
            $pret->setAccount($account);
            $pretRepository->save($pret, true);
            $pret->setDatePret(new \DateTimeImmutable());
            $etat = new Etatpret();
            $etat->setEtat("En attente");
            $etat->setPret($pret);
            $etatrepo->save($etat, true);



            return $this->redirectToRoute('app_pret_list', [], Response::HTTP_SEE_OTHER);
        }


        return $this->renderForm('pret/new.html.twig', [
            'pret' => $pret,
            'form' => $form,

        ]);
    }

    #[Route('/{id}', name: 'app_pret_show', methods: ['GET'])]
    public function show(Pret $pret): Response
    {
        return $this->render('pret/show.html.twig', [
            'pret' => $pret,
        ]);
    }

    #[Route('/cons/{id}', name: 'app_pret_consulte', methods: ['GET'])]
    public function consulte(Pret $pret): Response
    {
        return $this->render('pret/cons.html.twig', [
            'pret' => $pret,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pret_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pret $pret, PretRepository $pretRepository): Response
    {
        $form = $this->createForm(PretType::class, $pret);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pretRepository->save($pret, true);

            return $this->redirectToRoute('app_pret_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pret/edit.html.twig', [
            'pret' => $pret,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pret_delete', methods: ['POST'])]
    public function delete(Request $request, Pret $pret, PretRepository $pretRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $pret->getId(), $request->request->get('_token'))) {
            $pretRepository->remove($pret, true);
        }

        return $this->redirectToRoute('app_pret_list', [], Response::HTTP_SEE_OTHER);
    }
}
