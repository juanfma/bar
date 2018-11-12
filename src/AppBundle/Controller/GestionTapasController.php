<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Tapa;
use AppBundle\Form\TapaType;

/**
 * @Route("/gestionTapas")
 */
class GestionTapasController extends Controller
{
    /**
     * @Route("/nuevaTapa", name="nuevaTapa")
     */
    public function nuevaTapaAction(Request $request)
    {
        $tapa = new Tapa();
        $form = $this->createForm(TapaType::class, $tapa);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Rellenamos el Entity tapa
            $tapa = $form->getData();
            $tapa->setFoto("");
            $tapa->setFechaCreacion(new \DateTime());

            //Almacenamos
            $em = $this->getDoctrine()->getManager();
            $em->persist($tapa);
            $em->flush();

            return $this->redirectToRoute('tapa', array('id'=> $tapa->getId()));
        }

        return $this->render('gestionTapas/nuevaTapa.html.twig', array('form' => $form->createView()));
    }

}