<?php

namespace App\Controller;

use App\Entity\Box;
use App\Entity\Book;
use App\Entity\Borrow;
use App\Entity\Category;
use App\Repository\BoxRepository;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Uid\Uuid;

class UsersController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/api/v1/book', name: 'app_users', methods: ["GET"])]
    public function getLivre(SerializerInterface $normalize, BookRepository $bokks)
    {
        $livre = $bokks->findAll();

        $json = $normalize->serialize($livre, 'json', ['groups' => 'music:read']);

        $reponse = new JsonResponse($json, 200, [], true);

        return $reponse;
    }

    #[Route('/api/v1/box', name: 'app_box', methods: ["GET"])]
    public function getBox(SerializerInterface $normalize, BoxRepository $box)
    {

        $livre = $box->findAll();

        $json = $normalize->serialize($livre, 'json', ['groups' => 'music:read']);

        $reponse = new JsonResponse($json, 200, [], true);

        return $reponse;
    }

    #[Route('/api/v1/category', name: 'app_category', methods: ["GET"])]
    public function getCategory(SerializerInterface $normalize, CategoryRepository $category)
    {
        $category = $category->findAll();


        $json = $normalize->serialize($category, 'json', ['groups' => 'music:read']);

        $reponse = new JsonResponse($json, 200, [], true);


        return $reponse;
    }

    #[Route('/api/v1/post/category', name: 'cc', methods: "POST")]
    public function postCategory(SerializerInterface $normalize, Request $request, EntityManagerInterface $em)
    {
        $jsonrecu = $request->getContent();

        $json = $normalize->deserialize($jsonrecu, Borrow::class, 'json');
        $em->persist($json);
        $em->flush();

        return $this->json($json, 201, []);
    }

    #[Route('/api/v1/post/book', name: 'app_book_post', methods: "POST")]
    public function PosttLivre(SerializerInterface $normalize, BookRepository $bokkk, Request $request, EntityManagerInterface $em)
    {
        // $jsonrecu = $request->getContent();
        // dd($jsonrecu);

        // $json = $normalize->deserialize($jsonrecu, Book::class, 'json');

        // $em->persist($json);
        // $em->flush();
        // return $this->json($json, 201, [], ['groups' => 'music:read']);
        // return $request->get('id');
        $userid = json_decode($request->getContent(), true);
        $id = $userid['id'];
        dd($id);
    }
}