<?php

namespace App\Controller;

use App\Entity\EntityType;
use App\Repository\EntityTypeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

#[Route('/api/entity-types')]
class EntityTypeController
{
    #[Route('', methods: ['GET'])]
    public function index(EntityTypeRepository $entityTypeRepository): JsonResponse
    {
        return new JsonResponse($entityTypeRepository->findAll());
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request, EntityTypeRepository $entityTypeRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $entityType = new EntityType();
        $entityType->setName($data['name']);
        $entityTypeRepository->save($entityType);
        return new JsonResponse(['id' => $entityType->getId()], Response::HTTP_CREATED);
    }
}
