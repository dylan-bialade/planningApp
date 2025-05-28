<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\Personnel;
use App\Entity\Groupe;
use App\Entity\SuiviPlanning;

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

    #[ORM\ManyToOne(targetEntity: Groupe::class)]
    private ?Groupe $groupe = null;

    #[ORM\OneToMany(mappedBy: 'planning', targetEntity: SuiviPlanning::class, cascade: ['persist', 'remove'])]
    private Collection $suiviPlannings;

    public function __construct()
    {
        $this->suiviPlannings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getPlage(): ?string
    {
        return $this->plage;
    }

    public function setPlage(string $plage): self
    {
        $this->plage = $plage;
        return $this;
    }

    public function getPersonnel(): ?Personnel
    {
        return $this->personnel;
    }

    public function setPersonnel(?Personnel $personnel): self
    {
        $this->personnel = $personnel;
        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;
        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;
        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;
        return $this;
    }

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;
        return $this;
    }

    /**
     * @return Collection<int, SuiviPlanning>
     */
    public function getSuiviPlannings(): Collection
    {
        return $this->suiviPlannings;
    }

    public function addSuiviPlanning(SuiviPlanning $suiviPlanning): self
    {
        if (!$this->suiviPlannings->contains($suiviPlanning)) {
            $this->suiviPlannings[] = $suiviPlanning;
            $suiviPlanning->setPlanning($this);
        }
        return $this;
    }

    public function removeSuiviPlanning(SuiviPlanning $suiviPlanning): self
    {
        if ($this->suiviPlannings->removeElement($suiviPlanning)) {
            if ($suiviPlanning->getPlanning() === $this) {
                $suiviPlanning->setPlanning(null);
            }
        }
        return $this;
    }
    
    /**
     * Calcule la durée du planning en heures
     * 
     * @return float
     */
    public function getDuree(): float
    {
        if (!$this->dateDebut || !$this->dateFin) {
            return 0;
        }
        
        // Calculer la différence en secondes et convertir en heures
        $dureeEnSecondes = $this->dateFin->getTimestamp() - $this->dateDebut->getTimestamp();
        return $dureeEnSecondes / 3600;
    }
    
    /**
     * Vérifie si le planning est compatible avec les disponibilités du personnel
     * 
     * @return bool
     */
    public function estCompatibleAvecDisponibilites(): bool
    {
        $personnel = $this->getPersonnel();
        if (!$personnel) {
            return true; // Pas de personnel assigné, donc pas de contrainte
        }
        
        return $personnel->isDisponible($this->date, $this->plage);
    }
}
