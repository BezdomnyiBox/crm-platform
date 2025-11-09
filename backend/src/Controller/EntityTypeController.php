<?php

namespace App\Controller;

use App\Entity\EntityType;
use App\Repository\EntityTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/entity-types')]
class EntityTypeController
{
    #[Route('', methods: ['GET'])]
    public function index(EntityTypeRepository $repo): JsonResponse
    {
        return new JsonResponse($repo->findAll());
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $entityType = new EntityType();
        $entityType->setName($data['name']);
        $em->persist($entityType);
        $em->flush();
        return new JsonResponse(['id' => $entityType->getId()], 201);
    }
}
