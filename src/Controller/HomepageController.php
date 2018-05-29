<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Facture;
use App\Form\Type\FactureType;


class HomepageController extends Controller
{
    /**
     * @Route("/")
     */

	public function index(Request $request)
    {
        $em   = $this->getDoctrine()->getManager();
        $facture = new Facture();
        $form = $this->createForm(FactureType::class, $facture);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
          $em->persist($facture);
          $em->flush();
        }
        return $this->render('facture/index.html.twig', [
            'form'=>$form->createView(),'mainNavHome' => true, 'title' => 'Créer une facture'
        ]);
    }
}
