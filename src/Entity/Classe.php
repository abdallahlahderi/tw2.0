<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ref = null;

    #[ORM\Column(length: 255)]
    private ?string $nomC = null;

    #[ORM\Column(length: 255)]
    private ?string $nombreE = null;

    #[ORM\ManyToOne(inversedBy: 'classes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Test $Test = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): static
    {
        $this->ref = $ref;

        return $this;
    }

    public function getNomC(): ?string
    {
        return $this->nomC;
    }

    public function setNomC(string $nomC): static
    {
        $this->nomC = $nomC;

        return $this;
    }

    public function getNombreE(): ?string
    {
        return $this->nombreE;
    }

    public function setNombreE(string $nombreE): static
    {
        $this->nombreE = $nombreE;

        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->Test;
    }

    public function setTest(?Test $Test): static
    {
        $this->Test = $Test;

        return $this;
    }
}
