<?php

namespace App\Repository;

use App\Entity\EntityType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EntityType>
 */
class EntityTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EntityType::class);
    }

    public function findOneById(string $id): ?EntityType
    {
        return $this->findOneBy(['id' => $id]);
    }

    public function save(EntityType $entityType): void
    {
        $this->getEntityManager()->persist($entityType);
        $this->getEntityManager()->flush();
    }
}

