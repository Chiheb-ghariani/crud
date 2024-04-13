<?php

namespace App\Controller;

use App\Entity\Reactions;
use App\Form\ReactionsType;
use App\Repository\ReactionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reactions')]
class ReactionsController extends AbstractController
{
    #[Route('/', name: 'app_reactions_index', methods: ['GET'])]
    public function index(ReactionsRepository $reactionsRepository): Response
    {
        return $this->render('reactions/index.html.twig', [
            'reactions' => $reactionsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reactions_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reaction = new Reactions();
        $form = $this->createForm(ReactionsType::class, $reaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reaction);
            $entityManager->flush();

            return $this->redirectToRoute('app_reactions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reactions/new.html.twig', [
            'reaction' => $reaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reactions_show', methods: ['GET'])]
    public function show(Reactions $reaction): Response
    {
        return $this->render('reactions/show.html.twig', [
            'reaction' => $reaction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reactions_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reactions $reaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReactionsType::class, $reaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reactions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reactions/edit.html.twig', [
            'reaction' => $reaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reactions_delete', methods: ['POST'])]
    public function delete(Request $request, Reactions $reaction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reaction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reactions_index', [], Response::HTTP_SEE_OTHER);
    }
}
