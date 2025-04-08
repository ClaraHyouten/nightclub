<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Form\ContactType;

final class GlobalController extends AbstractController {
 #[Route("/", name: 'home')]
//  function index (WelcomeService $welcome): Response
 function index (): Response
 {
    return $this->render('pages/index.html.twig', [
        'main_title' => 'Home',
    ]);
 }
 
 #[Route("/contact", name: 'contact')]
 function contact (Request $request): Response
 {
    $form = $this->createForm(ContactType::class);
    // ->getForm();
    $form->handleRequest($request);

    return $this->render('pages/contact.html.twig', [
        'main_title' => 'Contact',
        'form' => $form,
    ]);
 }
 
 #[Route("/about", name: 'about')]
 function about (): Response
 {
    $steps_key = [
        ['year' => '1978', 'description' => 'Ouverture du nightclub'],
        ['year' => '2000', 'description' => 'Ouverture de l\'espace VIP'],
        ['year' => '2010', 'description' => 'Ouverture de la salle de concert'],
        ['year' => '2015', 'description' => 'Ouverture de la salle de jeux'],
        ['year' => '2020', 'description' => 'Déménagement dans les locaux actuels'],
    ];
    // dd($steps_key);
    return $this->render('pages/about.html.twig', [
        'main_title' => 'About',
        'steps_key' => $steps_key,
    ]);
}

 #[Route("/404", name: '404')]
 function error_404 (): Response
 {
    return $this->render('pages/404.html.twig', [
        'main_title' => 'Error 404',
    ]);
}
}