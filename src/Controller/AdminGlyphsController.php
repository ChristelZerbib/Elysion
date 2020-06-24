<?php

namespace App\Controller;

use App\Entity\GlyphsList;
use App\Entity\IngredientTypes;
use App\Form\GlyphsListType;
use App\Form\GlyphsSearchType;
use App\Repository\GlyphsListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;


/**
 * @Route("/elysion/admin/glyphes")
 */
class AdminGlyphsController extends AbstractController
{
    /**
     * @Route("/index", name="glyphs_list_admin", methods={"GET","POST"})
     */
    
    public function glyphadmin(Request $request, PaginatorInterface $paginator): Response
    {
        $form = $this->createForm(GlyphsSearchType::class, null, ['method'=>'GET']);
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $data = $this->getDoctrine()->getRepository(GlyphsList::class)->searchadmin($data['recherche'], $data['type'], $data['effect'], $data['support'], $data['order']);
        }else{
            $data = $this->getDoctrine()->getRepository(GlyphsList::class)->searchadmin();
        }

        $glyphs = $paginator->paginate($data, $request->query->getInt('page',1),20);
        return $this->render('glyphs_list/glyphadmin.html.twig', [
            'glyphs_lists' => $glyphs,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/nouveau", name="glyphs_list_new", methods={"GET","POST"})
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
     * @Route("/{id}/modifier", name="glyphs_list_edit", methods={"GET","POST"})
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


    

    /**
     * @Route("/{id}", name="glyphs_list_show", methods={"GET"})
     */
    public function show(GlyphsList $glyphsList): Response
    {
        return $this->render('glyphs_list/show.html.twig', [
            'glyphs_list' => $glyphsList,
        ]);
    }
}
