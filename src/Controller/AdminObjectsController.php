<?php

namespace App\Controller;

use App\Entity\ObjectsList;
use App\Entity\ObjectTypes;
use App\Form\ObjectsListType;
use App\Form\ObjectsSearchType;
use App\Repository\ObjectsListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/elysion/admin/boutique-objets")
 */
class AdminObjectsController extends AbstractController
{
    /**
     * @Route("/index", name="objects_list_admin", methods={"GET","POST"})
     */
 public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $form = $this->createForm(ObjectsSearchType::class, null, ['method'=>'GET']);
        
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $data = $this->getDoctrine()->getRepository(ObjectsList::class)->searchadmin($data['recherche'], $data['type'], $data['subtype'], $data['shop'], $data['order']);
        }
        else
        {
            $data = $this->getDoctrine()->getRepository(ObjectsList::class)->searchadmin();
        }

        $objects = $paginator->paginate($data, $request->query->getInt('page',1),20);
               return $this->render('objects_list/objectadmin.html.twig', [
            'objects_lists' => $objects,
            'form' => $form->createView(),

        ]);
    }

    /**
     * @Route("/nouveau", name="objects_list_new", methods={"GET","POST"})
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

            return $this->redirectToRoute('objects_list_admin');
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
     * @Route("/{id}/modifier", name="objects_list_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ObjectsList $objectsList): Response
    {
        $form = $this->createForm(ObjectsListType::class, $objectsList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('objects_list_admin');
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

        return $this->redirectToRoute('objects_list_admin');
    }
}
