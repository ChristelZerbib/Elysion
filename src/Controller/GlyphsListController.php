<?php

namespace App\Controller;

use App\Entity\GlyphsList;
use App\Form\GlyphsListType;
use App\Repository\GlyphsListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/glyphes")
 */
class GlyphsListController extends AbstractController
{
    /**
     * @Route("/", name="glyphs_list_index", methods={"GET"})
     */
    public function index(GlyphsListRepository $glyphsListRepository): Response
    {
        return $this->render('glyphs_list/index.html.twig', [
            'glyphs_lists' => $glyphsListRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="glyphs_list_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $glyphsList = new GlyphsList();
        $form = $this->createForm(GlyphsListType::class, $glyphsList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($glyphsList);
            $entityManager->flush();

            return $this->redirectToRoute('glyphs_list_index');
        }

        return $this->render('glyphs_list/new.html.twig', [
            'glyphs_list' => $glyphsList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="glyphs_list_show", methods={"GET"})
     */
    public function show(GlyphsList $glyphsList): Response
    {
        return $this->render('glyphs_list/show.html.twig', [
            'glyphs_list' => $glyphsList,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="glyphs_list_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GlyphsList $glyphsList): Response
    {
        $form = $this->createForm(GlyphsListType::class, $glyphsList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('glyphs_list_index');
        }

        return $this->render('glyphs_list/edit.html.twig', [
            'glyphs_list' => $glyphsList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="glyphs_list_delete", methods={"DELETE"})
     */
    public function delete(Request $request, GlyphsList $glyphsList): Response
    {
        if ($this->isCsrfTokenValid('delete'.$glyphsList->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($glyphsList);
            $entityManager->flush();
        }

        return $this->redirectToRoute('glyphs_list_index');
    }
}
