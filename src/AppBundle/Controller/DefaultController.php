<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Tapa;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction(Request $request)
    {
        $tapaRepository = $this->getDoctrine()->getRepository(Tapa::class);
        $tapas = $tapaRepository->findByTop(1);

        return $this->render('frontal/index.html.twig', array('tapas' => $tapas));
    }

    /**
     * @Route("/nosotros", name="nosotros")
     */
    public function nosotrosAction(Request $request)
    {
        return $this->render('frontal/nosotros.html.twig');
    }

    /**
     * @Route("/contactar/{sitio}", name="contactar")
     */
    public function contactarAction(Request $request, $sitio = "todos")
    {
        return $this->render('frontal/bares.html.twig', array("sitio" => $sitio));
    }

    /**
     * @Route("/tapa/{id}", name="tapa")
     */
    public function tapaAction(Request $request, $id = null)
    {
        if ($id != null) {
            $tapaRepository = $this->getDoctrine()->getRepository(Tapa::class);
            $tapa = $tapaRepository->find($id);

            return $this->render('frontal/tapa.html.twig', array("tapa" => $tapa));
        } else {
            return $this->redirectToRoute('homepage');
        }
    }
}
