<?php

namespace App\Controller;
 

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage',methods:['GET'])]
    public function index(
        ProductRepository $productRepository
    ): Response
    {$products = $productRepository->findBy(
        [], // valeur du filtre
        ['name'=> 'ASC'], // order de tri basé sur le nm
        10 // nombre dans le resultat
        );
        // dd($products); //Dum une variable et Die pour arreter le script
        return $this->render('homepage/index.html.twig', [
            'products' => $products,
        ]);
    }
}
