<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/product/{ref}', name: 'app_product')]
    public function show(
        ProductRepository $ProductRepository
        ,string $ref  
    ): Response
    {   
        $product = $ProductRepository->findOneBy([  //Trouve un produit
         'ref'=> $ref // valeur di filtre
    ]);
        return $this->render('product/show.html.twig', [
            'product' => $product, // variable à passer à la vue (Template)
            
        ]);
    }
}
