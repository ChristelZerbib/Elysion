<?php

namespace App\Controller;

use App\Entity\ObjectsList;
use App\Form\ObjectsListType;
use App\Repository\ObjectsListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/elysion/admin/boutique-objets")
 */
class AdminObjectsController extends AbstractController
{
    // /**
    //  * @Route("/index", name="objects_list_admin", methods={"GET","POST"})
    //  */
    // public function index(ObjectsListRepository $objectsListRepository): Response
    // {
    //     return $this->render('objects_list/index.html.twig', [
    //         'objects_lists' => $objectsListRepository->findAll(),
    //     ]);
    // }

    /**
     * @Route("/new", name="objects_list_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $objectsList = new ObjectsList();
        $form = $this->createForm(ObjectsListType::class, $objectsList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($objectsList);
            $entityManager->flush();

            return $this->redirectToRoute('objects_list_index');
        }

        return $this->render('objects_list/new.html.twig', [
            'objects_list' => $objectsList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="objects_list_show", methods={"GET"})
     */
    public function show(ObjectsList $objectsList): Response
    {
        return $this->render('objects_list/show.html.twig', [
            'objects_list' => $objectsList,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="objects_list_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ObjectsList $objectsList): Response
    {
        $form = $this->createForm(ObjectsListType::class, $objectsList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('objects_list_index');
        }

        return $this->render('objects_list/edit.html.twig', [
            'objects_list' => $objectsList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="objects_list_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ObjectsList $objectsList): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objectsList->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($objectsList);
            $entityManager->flush();
        }

        return $this->redirectToRoute('objects_list_index');
    }
}
