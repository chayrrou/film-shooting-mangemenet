<?php

namespace App\Controller;

use App\Entity\Tournage;
use App\Form\TournageType;
use App\Repository\TournageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tournage')]
class TournageController extends AbstractController
{
    #[Route('/', name: 'app_tournage_index', methods: ['GET'])]
    public function index(TournageRepository $tournageRepository): Response
    {
        return $this->render('tournage/index.html.twig', [
            'tournages' => $tournageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tournage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TournageRepository $tournageRepository): Response
    {
        $tournage = new Tournage();
        $form = $this->createForm(TournageType::class, $tournage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tournageRepository->save($tournage, true);

            return $this->redirectToRoute('app_tournage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tournage/new.html.twig', [
            'tournage' => $tournage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tournage_show', methods: ['GET'])]
    public function show(Tournage $tournage): Response
    {
        return $this->render('tournage/show.html.twig', [
            'tournage' => $tournage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tournage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tournage $tournage, TournageRepository $tournageRepository): Response
    {
        $form = $this->createForm(TournageType::class, $tournage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tournageRepository->save($tournage, true);

            return $this->redirectToRoute('app_tournage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tournage/edit.html.twig', [
            'tournage' => $tournage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tournage_delete', methods: ['POST'])]
    public function delete(Request $request, Tournage $tournage, TournageRepository $tournageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tournage->getId(), $request->request->get('_token'))) {
            $tournageRepository->remove($tournage, true);
        }

        return $this->redirectToRoute('app_tournage_index', [], Response::HTTP_SEE_OTHER);
    }
}
