<?php

namespace App\Controller;

use App\Entity\PendingValidations;
use App\Form\PendingValidationsType;
use App\Repository\PendingValidationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/validations")
 */
class PendingValidationsController extends AbstractController
{
    /**
     * @Route("/", name="pending_validations_index", methods={"GET"})
     */
    public function index(PendingValidationsRepository $pendingValidationsRepository): Response
    {
        return $this->render('pending_validations/index.html.twig', [
            'pending_validations' => $pendingValidationsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouvelle-requete", name="pending_validations_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pendingValidation = new PendingValidations();
        $form = $this->createForm(PendingValidationsType::class, $pendingValidation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pendingValidation);
            $entityManager->flush();

            return $this->redirectToRoute('pending_validations_index');
        }

        return $this->render('pending_validations/new.html.twig', [
            'pending_validation' => $pendingValidation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pending_validations_show", methods={"GET"})
     */
    public function show(PendingValidations $pendingValidation): Response
    {
        return $this->render('pending_validations/show.html.twig', [
            'pending_validation' => $pendingValidation,
        ]);
    }

    /**
     * @Route("/{id}/modification", name="pending_validations_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PendingValidations $pendingValidation): Response
    {
        $form = $this->createForm(PendingValidationsType::class, $pendingValidation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pending_validations_index');
        }

        return $this->render('pending_validations/edit.html.twig', [
            'pending_validation' => $pendingValidation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pending_validations_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PendingValidations $pendingValidation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pendingValidation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pendingValidation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pending_validations_index');
    }
}
