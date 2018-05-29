<?php

namespace App\Controller\Admin;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/admin")
 */
class HomepageController extends Controller
{

     /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('homepage/index.html.twig', [
            'mainNavHome' => true, 'title'=>'Accueil'
        ]);
    }
}
