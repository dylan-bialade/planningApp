<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Besoin>
     */
    #[ORM\OneToMany(targetEntity: Besoin::class, mappedBy: 'groupe')]
    private Collection $besoins;

    #[ORM\ManyToOne(inversedBy: 'groupes')]
    private ?Structure $structure = null;

    /**
     * @var Collection<int, Personnel>
     */
    #[ORM\OneToMany(targetEntity: Personnel::class, mappedBy: 'groupe')]
    private Collection $personnels;

    public function __construct()
    {
        $this->besoins = new ArrayCollection();
        $this->personnels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Besoin>
     */
    public function getBesoins(): Collection
    {
        return $this->besoins;
    }

    public function addBesoin(Besoin $besoin): static
    {
        if (!$this->besoins->contains($besoin)) {
            $this->besoins->add($besoin);
            $besoin->setGroupe($this);
        }

        return $this;
    }

    public function removeBesoin(Besoin $besoin): static
    {
        if ($this->besoins->removeElement($besoin)) {
            // set the owning side to null (unless already changed)
            if ($besoin->getGroupe() === $this) {
                $besoin->setGroupe(null);
            }
        }

        return $this;
    }

    public function getStructure(): ?Structure
    {
        return $this->structure;
    }

    public function setStructure(?Structure $structure): static
    {
        $this->structure = $structure;

        return $this;
    }

    /**
     * @return Collection<int, Personnel>
     */
    public function getPersonnels(): Collection
    {
        return $this->personnels;
    }

    public function addPersonnel(Personnel $personnel): static
    {
        if (!$this->personnels->contains($personnel)) {
            $this->personnels->add($personnel);
            $personnel->setGroupe($this);
        }

        return $this;
    }

    public function removePersonnel(Personnel $personnel): static
    {
        if ($this->personnels->removeElement($personnel)) {
            // set the owning side to null (unless already changed)
            if ($personnel->getGroupe() === $this) {
                $personnel->setGroupe(null);
            }
        }

        return $this;
    }
}
