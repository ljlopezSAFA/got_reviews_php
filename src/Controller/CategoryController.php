<?php

namespace App\Controller;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/category', name: 'categories')]
    public function index(Request $request, CharacterRepository $characterRepository): Response
    {





        if ($request->isMethod('POST')) {

//            $category = new Category();

//            $categoria->setNombre($request->request->get('nombre'));
//            $categoria->setFotoUrl($request->request->get('fotoUrl'));


//            $itemsIds = $request->request->get('items');
//            foreach ($itemsIds as $id) {
//                if ($id) {
//                   $character = $characterRepository->find($id);
//                   $character->addCharacter($character);
//                }
//            }

//            $em->persist($categoria);
//            $em->flush();

            $this->addFlash('success', 'Category created');
            return $this->redirectToRoute('admin_site');
        }else{

            // Obtenemos todos los characters
            $items = $characterRepository->findAll();

            return $this->render('category/categories.html.twig', [
                'items' => $items,
            ]);
        }




    }
}
