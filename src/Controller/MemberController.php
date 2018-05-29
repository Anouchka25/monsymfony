<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\User;
use App\Form\Type\UserType;

  /** @Route("/member") */
class MemberController extends Controller
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('member/index.html.twig', [
            'mainNavMember' =>true, 'title'=>'Espace Membre'
        ]);
    }


}
