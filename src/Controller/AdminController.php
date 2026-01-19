<?php

namespace App\Controller;

use App\Entity\Character;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class AdminController extends AbstractController
{
    #[Route('/admin/character/load', name: 'app_admin')]
    public function index(HttpClientInterface $httpClient, EntityManagerInterface $entityManager): Response
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
}
