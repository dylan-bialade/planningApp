<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningRepository::class)]
class Planning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(length: 255)]
    private ?string $plage = null;

    #[ORM\ManyToOne(inversedBy: 'plannings')]
    private ?Personnel $personnel = null;

    #[ORM\Column(length: 255)]
    private ?string $source = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dateFin = null;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $libelle = null;

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;
        return $this;
    }


    public function getDuree(): int
    {
        if ($this->dateDebut && $this->dateFin) {
            return $this->dateDebut->diff($this->dateFin)->h;
        }
        return 0;
    }
    public function getNomAffichage(): string
    {
        if ($this->getPersonnel() === null) {
            return '🚨 Besoin de personnel';
        }

        $prenom = $this->getPersonnel()->getPrenom();
        $nom = $this->getPersonnel()->getNom();
        $groupe = $this->getPersonnel()->getGroupe()?->getId();

        return sprintf('%s %s (Groupe %d)', $prenom, $nom, $groupe);
    }



    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }
    
    public function setDateFin(\DateTimeInterface $dateFin): static
    {
        $this->dateFin = $dateFin;
        return $this;
    }
    
    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

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

    public function getPersonnel(): ?Personnel
    {
        return $this->personnel;
    }

    public function setPersonnel(?Personnel $personnel): static
    {
        $this->personnel = $personnel;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): static
    {
        $this->source = $source;

        return $this;
    }
    
    public function peutAccepterPlanning(Planning $planning): bool
    {
        $duree = $planning->getDuree();
        return $this->getTempsTravailRestant() >= $duree;

    }


}
