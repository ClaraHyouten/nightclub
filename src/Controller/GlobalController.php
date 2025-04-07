<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GlobalController {
 #[Route("/")]
 function index (): Response
 {
 return new Response('Hello world !');
 }
 #[Route("/contact")]
 function contact (): Response
 {
 return new Response('Me contacter');
 }
 #[Route("/about")]
 function about (): Response
 {
 return new Response('A propos');
 }
}