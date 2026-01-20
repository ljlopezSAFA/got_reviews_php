<?php

namespace App\Controller;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class AdminController extends AbstractController
{

    #[Route('/admin', name: 'admin_site')]
    public function index(): Response
    {


        return $this->render('admin/admin.html.twig');
    }


    #[Route('/admin/character/load', name: 'data_load_api')]
    public function data_load(HttpClientInterface $httpClient, EntityManagerInterface $entityManager): Response
    {

        #PETICION A LA API
        $response = $httpClient->request(
            'GET',
            'https://thronesapi.com/api/v2/Characters'
        );


        $content = $response->toArray();

        foreach ( $content as $element ) {
            $character = new Character();
            $character->setFirtsName($element['firstName']);
            $character->setLastName($element['lastName']);
            $character->setFamily($element['family']);
            $character->setTitle($element['title']);
            $character->setFullName($element['fullName']);
            $character->setImage($element['image']);
            $character->setImageUrl($element['imageUrl']);
            $character->setCode($element['id']);

            $entityManager->persist($character);
        }

        $entityManager->flush();



        return $this->render('admin/admin.html.twig', [
            'controller_name' => 'AdminController',
            'content' => $content,
        ]);
    }


//    #[Route('/', name: 'categoria_index', methods: ['GET','POST'])]
//    public function category(Request $request, EntityManagerInterface $em): Response
//    {
//        // Crear nueva categoría
//        $categoria = new Categoria();
//
//        // Tomamos los datos manualmente del formulario
//        if ($request->isMethod('POST')) {
//            $categoria->setNombre($request->request->get('nombre'));
//            $categoria->setFotoUrl($request->request->get('fotoUrl'));
//
//            // Asociar items seleccionados
//            $itemsIds = $request->request->get('items', []); // array de ids
//            foreach ($itemsIds as $id) {
//                $item = $em->getRepository(Item::class)->find($id);
//                if ($item) {
//                    $categoria->addItem($item); // asumiendo relación ManyToMany
//                }
//            }
//
//            $em->persist($categoria);
//            $em->flush();
//
//            $this->addFlash('success', 'Categoría creada y elementos asociados');
//            return $this->redirectToRoute('categoria_index');
//        }
//
//        // Obtener todos los items disponibles
//        $items = $em->getRepository(Item::class)->findAll();
//
//        return $this->render('categoria/categories.html.twig', [
//            'items' => $items,
//        ]);
//    }

}
