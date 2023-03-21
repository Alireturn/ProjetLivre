<?php

namespace App\Controller;

use App\Entity\Box;
use App\Entity\Book;
use App\Entity\Category;
use App\Repository\BoxRepository;
use App\Repository\BookRepository;
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



class UsersController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/api/v1/users', name: 'app_users', methods: ["GET"])]
    public function index(SerializerInterface $normalize, BookRepository $bokks)
    {
        $livre = $bokks->findAll();

        $json = $normalize->serialize($livre, 'json', ['groups' => 'music:read']);

        $reponse = new JsonResponse($json, 200, [], true);
        return $reponse;
    }
}