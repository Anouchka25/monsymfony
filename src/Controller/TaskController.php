<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\Tag;
use App\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends Controller
{
    /**
     * @Route("/task", name="task")
     */
     public function new(Request $request)
     {
         $task = new Task();

         // dummy code - this is here just so that the Task has some tags
         // otherwise, this isn't an interesting example
         $tag1 = new Tag();
         $tag1->setName('tag1');
         $task->getTags()->add($tag1);
         $tag2 = new Tag();
         $tag2->setName('tag2');
         $task->getTags()->add($tag2);
         // end dummy code

         $form = $this->createForm(TaskType::class, $task);

         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
             // ... maybe do some form processing, like saving the Task and Tag objects
         }

         return $this->render('task/new.html.twig', array(
             'form' => $form->createView(),
         ));
     }
}
