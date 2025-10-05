<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServiceController extends AbstractController
{
   



     #[Route('/service/{name}', name: 'service_show')]
    public function showService(string $name="abdallah hh"): Response
    {
        return $this->render('service/showServices.html.twig', [
            'name' => $name,
        ]);
    }
    #[Route('/go', name: 'app_go_to_index')]
    public function goToIndex(): Response
    {
        // Redirection vers la méthode index() du HomeController
        return $this->redirectToRoute('app_home');
    }
}
