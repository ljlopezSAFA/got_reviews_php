<?php

namespace App\Controller;

use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/category', name: 'categories')]
    public function index(CharacterRepository $characterRepository): Response
    {

        // Obtener todos los items disponibles
        $items = $characterRepository->findAll();

        return $this->render('category/categories.html.twig', [
            'items' => $items,
        ]);


    }
}
