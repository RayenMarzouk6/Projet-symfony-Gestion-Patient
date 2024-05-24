<?php

namespace App\Entity;

use App\Repository\SeancesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeancesRepository::class)]
class Seances
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'seances')]
    private ?User $CodeP = null;

    #[ORM\ManyToOne(inversedBy: 'seances')]
    private ?Soins $CodeSoin = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateSoin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeP(): ?user
    {
        return $this->CodeP;
    }

    public function setCodeP(?user $CodeP): static
    {
        $this->CodeP = $CodeP;

        return $this;
    }

    public function getCodeSoin(): ?soins
    {
        return $this->CodeSoin;
    }

    public function setCodeSoin(?soins $CodeSoin): static
    {
        $this->CodeSoin = $CodeSoin;

        return $this;
    }

    public function getDateSoin(): ?\DateTimeInterface
    {
        return $this->DateSoin;
    }

    public function setDateSoin(\DateTimeInterface $DateSoin): static
    {
        $this->DateSoin = $DateSoin;

        return $this;
    }
}
