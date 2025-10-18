<?php

namespace App\Controller;
#-----------------------------------------------------#
use App\Entity\Test;
use App\Form\TestType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
#-----------------------------------------------------#
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $test = $entityManager->getRepository(Test::class)->findAll();
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'test' => $test,
        ]);
    }


    #[Route('/test/new', name: 'test_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $test = new Test();
        $form = $this->createForm(TestType::class, $test);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($test); // Corrigé: "persist" pas "presist"
            $entityManager->flush();

            return $this->redirectToRoute('app_test'); 
        }

        return $this->render('test/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
