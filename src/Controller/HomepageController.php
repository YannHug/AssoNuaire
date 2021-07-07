<?php

namespace App\Controller;

use App\Repository\AssociationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(AssociationRepository $associationRepository): Response
    {
        return $this->render('homepage/index.html.twig', [
            'associations' => $associationRepository->findLastFive()
        ]);
    }
}
