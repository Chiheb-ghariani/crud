<?php

namespace App\Controller;

use App\Entity\MessengerMessages;
use App\Form\MessengerMessagesType;
use App\Repository\MessengerMessagesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/messenger/messages')]
class MessengerMessagesController extends AbstractController
{
    #[Route('/', name: 'app_messenger_messages_index', methods: ['GET'])]
    public function index(MessengerMessagesRepository $messengerMessagesRepository): Response
    {
        return $this->render('messenger_messages/index.html.twig', [
            'messenger_messages' => $messengerMessagesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_messenger_messages_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $messengerMessage = new MessengerMessages();
        $form = $this->createForm(MessengerMessagesType::class, $messengerMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($messengerMessage);
            $entityManager->flush();

            return $this->redirectToRoute('app_messenger_messages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('messenger_messages/new.html.twig', [
            'messenger_message' => $messengerMessage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_messenger_messages_show', methods: ['GET'])]
    public function show(MessengerMessages $messengerMessage): Response
    {
        return $this->render('messenger_messages/show.html.twig', [
            'messenger_message' => $messengerMessage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_messenger_messages_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MessengerMessages $messengerMessage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MessengerMessagesType::class, $messengerMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_messenger_messages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('messenger_messages/edit.html.twig', [
            'messenger_message' => $messengerMessage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_messenger_messages_delete', methods: ['POST'])]
    public function delete(Request $request, MessengerMessages $messengerMessage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$messengerMessage->getId(), $request->request->get('_token'))) {
            $entityManager->remove($messengerMessage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_messenger_messages_index', [], Response::HTTP_SEE_OTHER);
    }
}
