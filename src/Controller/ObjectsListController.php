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
 * @Route("/elysion/boutique-objets")
 */
class ObjectsListController extends AbstractController
{
    /**
     * @Route("/index", name="objects_list_index", methods={"GET","POST"})
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $form = $this->createForm(ObjectsSearchType::class);
        
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $data = $this->getDoctrine()->getRepository(ObjectsList::class)->search($data['recherche'], $data['type'], $data['subtype'], $data['shop'], $data['order']);
        }
        else
        {
            $data = $this->getDoctrine()->getRepository(ObjectsList::class)->search();
        }

        $objects = $paginator->paginate($data, $request->query->getInt('page',1),20);
               return $this->render('objects_list/index.html.twig', [
            'objects_lists' => $objects,
            'form' => $form->createView(),

        ]);
    }

}
