<?php

namespace App\Controller;

use App\Entity\CircusAct;
use App\Form\CircusAct1Type;
use App\Repository\CircusActRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/circus/act")
 */
class CircusActController extends AbstractController
{
    /**
     * @Route("/", name="circus_act_index", methods={"GET"})
     */
    public function index(CircusActRepository $circusActRepository): Response
    {
        return $this->render('circus_act/index.html.twig', [
            'circus_acts' => $circusActRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="circus_act_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $circusAct = new CircusAct();
        $form = $this->createForm(CircusAct1Type::class, $circusAct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($circusAct);
            $entityManager->flush();

            return $this->redirectToRoute('circus_act_index');
        }

        return $this->render('circus_act/new.html.twig', [
            'circus_act' => $circusAct,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="circus_act_show", methods={"GET"})
     */
    public function show(CircusAct $circusAct): Response
    {
        return $this->render('circus_act/show.html.twig', [
            'circus_act' => $circusAct,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="circus_act_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CircusAct $circusAct): Response
    {
        $form = $this->createForm(CircusAct1Type::class, $circusAct);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('circus_act_index');
        }

        return $this->render('circus_act/edit.html.twig', [
            'circus_act' => $circusAct,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="circus_act_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CircusAct $circusAct): Response
    {
        if ($this->isCsrfTokenValid('delete'.$circusAct->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($circusAct);
            $entityManager->flush();
        }

        return $this->redirectToRoute('circus_act_index');
    }
}
