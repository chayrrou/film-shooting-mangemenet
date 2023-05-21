<?php

namespace App\Controller;

use App\Entity\SocieteDeProduction;
use App\Form\SocieteDeProductionType;
use App\Repository\SocieteDeProductionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/societe/de/production')]
class SocieteDeProductionController extends AbstractController
{
    #[Route('/', name: 'app_societe_de_production_index', methods: ['GET'])]
    public function index(SocieteDeProductionRepository $societeDeProductionRepository): Response
    {
        return $this->render('societe_de_production/index.html.twig', [
            'societe_de_productions' => $societeDeProductionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_societe_de_production_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SocieteDeProductionRepository $societeDeProductionRepository): Response
    {
        $societeDeProduction = new SocieteDeProduction();
        $form = $this->createForm(SocieteDeProductionType::class, $societeDeProduction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $societeDeProductionRepository->save($societeDeProduction, true);

            return $this->redirectToRoute('app_societe_de_production_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('societe_de_production/new.html.twig', [
            'societe_de_production' => $societeDeProduction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_societe_de_production_show', methods: ['GET'])]
    public function show(SocieteDeProduction $societeDeProduction): Response
    {
        return $this->render('societe_de_production/show.html.twig', [
            'societe_de_production' => $societeDeProduction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_societe_de_production_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SocieteDeProduction $societeDeProduction, SocieteDeProductionRepository $societeDeProductionRepository): Response
    {
        $form = $this->createForm(SocieteDeProductionType::class, $societeDeProduction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $societeDeProductionRepository->save($societeDeProduction, true);

            return $this->redirectToRoute('app_societe_de_production_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('societe_de_production/edit.html.twig', [
            'societe_de_production' => $societeDeProduction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_societe_de_production_delete', methods: ['POST'])]
    public function delete(Request $request, SocieteDeProduction $societeDeProduction, SocieteDeProductionRepository $societeDeProductionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$societeDeProduction->getId(), $request->request->get('_token'))) {
            $societeDeProductionRepository->remove($societeDeProduction, true);
        }

        return $this->redirectToRoute('app_societe_de_production_index', [], Response::HTTP_SEE_OTHER);
    }
}
