<?php

namespace App\Controller;

use App\Entity\BonusEffectsList;
use App\Form\BonusEffectsListType;
use App\Repository\BonusEffectsListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bonus-effets")
 */
class BonusEffectsListController extends AbstractController
{
    /**
     * @Route("/", name="bonus_effects_list_index", methods={"GET"})
     */
    public function index(BonusEffectsListRepository $bonusEffectsListRepository): Response
    {
        return $this->render('bonus_effects_list/index.html.twig', [
            'bonus_effects_lists' => $bonusEffectsListRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouveau", name="bonus_effects_list_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bonusEffectsList = new BonusEffectsList();
        $form = $this->createForm(BonusEffectsListType::class, $bonusEffectsList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bonusEffectsList);
            $entityManager->flush();

            return $this->redirectToRoute('bonus_effects_list_index');
        }

        return $this->render('bonus_effects_list/new.html.twig', [
            'bonus_effects_list' => $bonusEffectsList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bonus_effects_list_show", methods={"GET"})
     */
    public function show(BonusEffectsList $bonusEffectsList): Response
    {
        return $this->render('bonus_effects_list/show.html.twig', [
            'bonus_effects_list' => $bonusEffectsList,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="bonus_effects_list_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BonusEffectsList $bonusEffectsList): Response
    {
        $form = $this->createForm(BonusEffectsListType::class, $bonusEffectsList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bonus_effects_list_index');
        }

        return $this->render('bonus_effects_list/edit.html.twig', [
            'bonus_effects_list' => $bonusEffectsList,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bonus_effects_list_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BonusEffectsList $bonusEffectsList): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bonusEffectsList->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bonusEffectsList);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bonus_effects_list_index');
    }
}
