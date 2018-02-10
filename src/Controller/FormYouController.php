<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace App\Controller;

namespace App\Controller;

use App\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class FormYouController extends Controller
{
  public function addAction(Request $request): Response
  {
    // creates a task and gives it some dummy data for this example
    $job = new Job();
    
    $form = $this->createFormBuilder($job)
    //->add('company', TextType::class)
    ->add('expiresAt', DateType::class)
    ->add('save', SubmitType::class, array('label' => 'Create Task'))
    ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values 
        // but, the original `$task` variable has also been updated
        $job = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($task);
        // $em->flush();

        return $this->redirectToRoute('task_success');
    }

    return $this->render('Job/index.html.twig', array(
        'form' => $form->createView(),
    ));

    }
  
}