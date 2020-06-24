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
 * @Route("/elysion/glyphes")
 */
class GlyphsListController extends AbstractController
{
    /**
     * @Route("/index", name="glyphs_list_index", methods={"GET","POST"})
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $form = $this->createForm(GlyphsSearchType::class, null, ['method'=>'GET']);
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $data = $this->getDoctrine()->getRepository(GlyphsList::class)->search($data['recherche'], $data['type'], $data['effect'], $data['support'], $data['order']);
        }else{
            $data = $this->getDoctrine()->getRepository(GlyphsList::class)->search();
        }

        $glyphs = $paginator->paginate($data, $request->query->getInt('page',1),20);
        return $this->render('glyphs_list/index.html.twig', [
            'glyphs_lists' => $glyphs,
            'form' => $form->createView(),
        ]);
    }

}
