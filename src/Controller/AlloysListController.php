<?php

namespace App\Controller;

use App\Entity\AlloysList;
use App\Form\AlloysListType;
use App\Repository\AlloysListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/alloys")
 */
class AlloysListController extends AbstractController
{
    /**
     * @Route("/", name="alloys_list_index", methods={"GET"})
     */
    public function index(AlloysListRepository $alloysListRepository): Response
    {
        return $this->render('alloys_list/index.html.twig', [
            'alloys_lists' => $alloysListRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="alloys_list_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $alloysList = new AlloysList();
        $form = $this->createForm(AlloysListType::class, $alloysList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($alloysList);
            $entityManager->flush();

            return $this->redirectToRoute('alloys_list_index');
        }

        return $this->render('alloys_list/new.html.twig', [
            'alloys_list' => $alloysList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="alloys_list_show", methods={"GET"})
     */
    public function show(AlloysList $alloysList): Response
    {
        return $this->render('alloys_list/show.html.twig', [
            'alloys_list' => $alloysList,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="alloys_list_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AlloysList $alloysList): Response
    {
        $form = $this->createForm(AlloysListType::class, $alloysList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('alloys_list_index');
        }

        return $this->render('alloys_list/edit.html.twig', [
            'alloys_list' => $alloysList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="alloys_list_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AlloysList $alloysList): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alloysList->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($alloysList);
            $entityManager->flush();
        }

        return $this->redirectToRoute('alloys_list_index');
    }
}
