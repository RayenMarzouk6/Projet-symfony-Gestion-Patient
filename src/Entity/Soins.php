<?php

namespace App\Entity;

use App\Repository\SoinsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoinsRepository::class)]
class Soins
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\OneToMany(targetEntity: Seances::class, mappedBy: 'CodeSoin')]
    private Collection $seances;

    public function __construct()
    {
        $this->seances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): static
    {
        $this->designation = $designation;

        return $this;
    }

    public function __toString()
        {
            return $this->id; // Vous pouvez remplacer "id" par n'importe quelle propriété que vous voulez afficher dans une chaîne de caractères.
        }
    /**
     * @return Collection<int, Seances>
     */
    public function getSeances(): Collection
    {
        return $this->seances;
    }

    public function addSeance(Seances $seance): static
    {
        if (!$this->seances->contains($seance)) {
            $this->seances->add($seance);
            $seance->setCodeSoin($this);
        }

        return $this;
    }

    public function removeSeance(Seances $seance): static
    {
        if ($this->seances->removeElement($seance)) {
            // set the owning side to null (unless already changed)
            if ($seance->getCodeSoin() === $this) {
                $seance->setCodeSoin(null);
            }
        }

        return $this;
    }
}
