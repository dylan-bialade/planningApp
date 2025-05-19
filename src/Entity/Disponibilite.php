<?php

namespace App\Entity;

use App\Repository\DisponibiliteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisponibiliteRepository::class)]
class Disponibilite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'jourSemaine')]
    private ?Personnel $personnel = null;

    #[ORM\Column(length: 255)]
    private ?string $jourSemaine = null;

    #[ORM\Column(length: 255)]
    private ?string $plage = null;

    #[ORM\Column]
    private ?bool $dispo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonnel(): ?Personnel
    {
        return $this->personnel;
    }

    public function setPersonnel(?Personnel $personnel): static
    {
        $this->personnel = $personnel;

        return $this;
    }

    public function getJourSemaine(): ?string
    {
        return $this->jourSemaine;
    }

    public function setJourSemaine(string $jourSemaine): static
    {
        $this->jourSemaine = $jourSemaine;

        return $this;
    }

    public function getPlage(): ?string
    {
        return $this->plage;
    }

    public function setPlage(string $plage): static
    {
        $this->plage = $plage;

        return $this;
    }

    public function isDispo(): ?bool
    {
        return $this->dispo;
    }

    public function setDispo(bool $dispo): static
    {
        $this->dispo = $dispo;

        return $this;
    }
}
