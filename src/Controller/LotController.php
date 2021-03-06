<?php

namespace App\Controller;

use App\Entity\Enchere;
use App\Entity\Encherir;
use App\Entity\Lot;
use App\Form\LotType;
use App\Repository\EnchereRepository;
use App\Repository\EncherirRepository;
use App\Repository\LotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lot")
 */
class LotController extends AbstractController
{
    /**
     * @Route("/", name="lot_index", methods={"GET"})
     */
    public function index(LotRepository $lotRepository, EncherirRepository $encherirRepository): Response
    {
//        foreach ($lotRepository->findAll() as $i => $lot ) {
//            if ($lot->getIdEnchere() === $enchere) {
//                $encherirByLot = $encherirRepository->topEnchere($lot->getId());
//                if ($encherirByLot) {
//                    $bestEncherirs[$i] = $encherirByLot[0];
//                }
//                else {
//                    $encherirVide = new Encherir();
//                    $encherirVide->setIdLot($lotRepository->findAll()[$i]);
//                    $encherirVide->setPrixPropose(-1);
//                    $bestEncherirs[$i] = $encherirVide;
//                }
//            }
//        }
//        $bestEncherirs = array_values($bestEncherirs);

        foreach ($lotRepository->findAll() as $i => $lot ) {
            $encherirByLot = $encherirRepository->findBy(
                ['idLot' => $lot->getId()],
                ['prixPropose' => 'DESC'], 1, 0);
            if ($encherirByLot) {
                $bestEncherirs[$i] = $encherirByLot[0];
            }
            else {
                $encherirVide = new Encherir();
                $encherirVide->setIdLot($lotRepository->findAll()[$i]);
                $encherirVide->setPrixPropose(-1);
                $bestEncherirs[$i] = $encherirVide;
            }

        }
        $bestEncherirs = array_values($bestEncherirs);

        return $this->render('lot/index.html.twig', [
            'lots' => $lotRepository->findAll(),
            'listeTopEnchere' => $bestEncherirs
        ]);
    }

    /**
     * @Route("/new", name="lot_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lot = new Lot();
        $form = $this->createForm(LotType::class, $lot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lot);
            $entityManager->flush();

            return $this->redirectToRoute('lot_index');
        }

        return $this->render('lot/new.html.twig', [
            'lot' => $lot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lot_show", methods={"GET"})
     */
    public function show(Lot $lot, EncherirRepository $encherirRepository): Response
    {
        if($encherirRepository->topEnchere($lot->getId()) == null){
            $topEnchere = 0;
        }
        else{
            $topEnchere = $encherirRepository->topEnchere($lot->getId())[0];
        }

        return $this->render('lot/show.html.twig', [
            'lot' => $lot,
            'encherir' => $encherirRepository->findBy(
                ['idLot' => $lot->getId()]
            ),
            'topEnchere' => $topEnchere,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lot_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lot $lot): Response
    {
        $form = $this->createForm(LotType::class, $lot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lot_index');
        }

        return $this->render('lot/edit.html.twig', [
            'lot' => $lot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lot_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lot $lot): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lot->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lot_index');
    }
}
