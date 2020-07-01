<?php

namespace App\Controller;

use App\Entity\BonusEffectsList;
use App\Form\BonusEffectsListType;
use App\Form\BonusSearchType;
use App\Repository\BonusEffectsListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;


/**
 * @Route("/elysion/bonus-effets") 
 */
class BonusEffectsListController extends AbstractController
{
    /**
     * @Route("/", name="bonus_effects_list_index", methods={"GET","POST"})
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {   
        $form = $this->createForm(BonusSearchType::class, null, ['method'=>'GET']);
        
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $data = $this->getDoctrine()->getRepository(BonusEffectsList::class)->search($data['recherche'], $data['type'], $data['rank'], $data['order']);
        }
        else
        {
            $data = $this->getDoctrine()->getRepository(BonusEffectsList::class)->search();
        }

        $bonus = $paginator->paginate($data, $request->query->getInt('page',1),21);
        return $this->render('bonus_effects_list/index.html.twig', [
            'bonus_effects_lists' => $bonus,
            'form' => $form->createView(),
        ]);
    }


}
