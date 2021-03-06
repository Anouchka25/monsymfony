<?php

namespace App\Controller;

use App\Entity\Prestation;
use App\Entity\Facture;
use App\Form\Type\FactureType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Collection;
use Doctrine\Common\Collections\ArrayCollection;
//use App\Service\FileUploader;

class FactureController extends Controller
{
    /**
     * @Route("/facture", name="facture")
     */
    public function index(Request $request)
    {
         $facture = new Facture();
         $prestation1=new Prestation();
         $prestation1->designation='desigation1';
         $prestation1->prixht=500;
         $prestation1->quantite=6;
         $prestation1->taxe=20;
         $facture->getPrestations()->add($prestation1);
        // $facture->setNum('num1');
        // $facture->setNumtva('numtva1');
        // $facture->setDatefacture('12/05/2018');
        // $facture->setFacturede('facturede1');
        // $facture->setClient('client1');
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        $em   = $this->getDoctrine()->getManager();

        if($form->isSubmitted() && $form->isValid()){
          // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            //$file = $facture->getLogo();

            //$fileName = $fileUploader->upload($file);

            // moves the file to the directory where logos are stored
            // $file->move(
            //     $this->getParameter('logos_directory'),
            //     $fileName
            // );

            // updates the 'logo' property to store the PDF file name
            // instead of its contents
          //$facture->setLogo($fileName);

          $em->persist($facture);
          $em->flush();

          $this->addFlash('success', 'Votre facture à bien été enregistrée.');

          //return $this->redirect($this->generateUrl('app_facture_list'));
        }
        return $this->render('facture/index.html.twig', [
            'form'=>$form->createView(),'mainNavRegistration' => true, 'title' => 'Créer une facture'
        ]);
    }

    // /**
    //  * @return string
    //  */
    // private function generateUniqueFileName()
    // {
    //     // md5() reduces the similarity of the file names generated by
    //     // uniqid(), which is based on timestamps
    //     return md5(uniqid());
    // }

    /**
    *@Route("facture/{id}", name="onefacture", requirements={"id"="\d+"})
    */
    public function show($id)
    {
      $facture=$this->getDoctrine()
         ->getRepository(Facture::class)
         ->find($id);
         if(!$facture){
           throw $this->createNotFoundException('Aucune facture à l\'id '.$id);
         }
         //return new Response('Numero de facture est : '.$facture->getNum());
         return $this->render('facture/show.html.twig', ['facture' => $facture,
             'mainNavRegistration' => true, 'title' => 'Afficher une facture'
         ]);
    }

    /**
    *@Route("allfactures", name="allfactures")
    */
    public function showAll()
    {
      $factures=$this->getDoctrine()
         ->getRepository(Facture::class)
         ->findAll();
         if(!$factures){
           throw $this->createNotFoundException('Aucune facture à l\'id');
         }

         return $this->render('facture/showAll.html.twig', ['factures' => $factures]);
            // 'form'=>$form->createView(),'mainNavRegistration' => true, 'title' => 'Afficher toutes les factures'
        //]);

         //return new Response(count($factures). ' factures dans la base ');
    }
}
