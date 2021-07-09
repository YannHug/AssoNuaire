<?php

namespace App\Controller\Association;

use App\Repository\AssociationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/association', name: 'association_')]
class AssociationController extends AbstractController
{
    #[Route('/{id}', name: 'read')]
    public function index(AssociationRepository $associationRepository, $id): Response
    {
        return $this->render('association/read.html.twig', [
            'association' => $associationRepository->find($id),
        ]);
    }
}
