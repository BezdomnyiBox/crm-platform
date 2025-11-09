<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class EntityType
{
    #[ORM\Id]
    #[ORM\GeneratedValue('uuid')]
    #[ORM\Column(type: 'uuid')]
    private string $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\ManyToOne(targetEntity: Organization::class)]
    private Organization $organization;
}
