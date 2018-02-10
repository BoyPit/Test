<?php // src/Controller/JobController.php

namespace App\Controller;

use App\Entity\Job;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JobController extends AbstractController
{
    public function index(EntityManagerInterface $em)
    {
        $jobs = $em->getRepository(Job::class)->findAll();

        return $this->render('job/index.html.twig', [
            'jobs' => $jobs,
        ]);
    }
}