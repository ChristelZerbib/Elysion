<?php
 
namespace App\Controller;

use App\Entity\AlloysList;
use App\Form\AlloysListType;
use App\Form\AlloySearchType;
use App\Repository\AlloysListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/elysion/atelier") 
 */
class AlloysListController extends AbstractController
{
    /**
     * @Route("/", name="alloys_list_index", methods={"GET","POST"})
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $form = $this->createForm(AlloySearchType::class);
        
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $data = $this->getDoctrine()->getRepository(AlloysList::class)->search($data['recherche'], $data['type'], $data['support'], $data['order']);
        }
        else
        {
            $data = $this->getDoctrine()->getRepository(AlloysList::class)->search();
        }

        $alloys = $paginator->paginate($data, $request->query->getInt('page',1),20);
        return $this->render('alloys_list/index.html.twig', [
            'alloys_lists' => $alloys,
            'form' => $form->createView(),

        ]);
    }

    
}
