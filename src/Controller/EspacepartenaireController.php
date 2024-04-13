<?php

namespace App\Controller;

use App\Entity\Espacepartenaire;
use App\Form\EspacepartenaireType;
use App\Repository\EspacepartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/espacepartenaire')]
class EspacepartenaireController extends AbstractController
{
    #[Route('/', name: 'app_espacepartenaire_index', methods: ['GET'])]
    public function index(EspacepartenaireRepository $espacepartenaireRepository): Response
    {
        return $this->render('espacepartenaire/index.html.twig', [
            'espacepartenaires' => $espacepartenaireRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_espacepartenaire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $espacepartenaire = new Espacepartenaire();
        $form = $this->createForm(EspacepartenaireType::class, $espacepartenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($espacepartenaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_espacepartenaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('espacepartenaire/new.html.twig', [
            'espacepartenaire' => $espacepartenaire,
            'form' => $form,
        ]);
    }

    #[Route('/{idEspace}', name: 'app_espacepartenaire_show', methods: ['GET'])]
    public function show(Espacepartenaire $espacepartenaire): Response
    {
        return $this->render('espacepartenaire/show.html.twig', [
            'espacepartenaire' => $espacepartenaire,
        ]);
    }

    #[Route('/{idEspace}/edit', name: 'app_espacepartenaire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Espacepartenaire $espacepartenaire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EspacepartenaireType::class, $espacepartenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_espacepartenaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('espacepartenaire/edit.html.twig', [
            'espacepartenaire' => $espacepartenaire,
            'form' => $form,
        ]);
    }

    #[Route('/{idEspace}', name: 'app_espacepartenaire_delete', methods: ['POST'])]
    public function delete(Request $request, Espacepartenaire $espacepartenaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$espacepartenaire->getIdEspace(), $request->request->get('_token'))) {
            $entityManager->remove($espacepartenaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_espacepartenaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
