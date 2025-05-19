<?php

namespace App\Entity;

use App\Repository\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnelRepository::class)]
class Personnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(type: 'integer')]
    private ?int $age = null;

    #[ORM\Column(type: 'integer')]
    private ?int $heuresMensuelles = null;

    #[ORM\Column(length: 20)]
    private ?string $statut = null;

    /**
     * @var Collection<int, Disponibilite>
     */
    #[ORM\OneToMany(targetEntity: Disponibilite::class, mappedBy: 'personnel', cascade: ['persist', 'remove'])]
    private Collection $jourSemaine;

    /**
     * @var Collection<int, Indisponibilite>
     */
    #[ORM\OneToMany(targetEntity: Indisponibilite::class, mappedBy: 'personnel', cascade: ['persist', 'remove'])]
    private Collection $indisponibilites;

    /**
     * @var Collection<int, Planning>
     */
    #[ORM\OneToMany(targetEntity: Planning::class, mappedBy: 'personnel', cascade: ['persist', 'remove'])]
    private Collection $plannings;

    #[ORM\Column(length: 255)]
    private ?string $typeContrat = null;

    #[ORM\ManyToOne(targetEntity: Groupe::class, inversedBy: 'personnels')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Groupe $groupe = null;

    public function __construct()
    {
        $this->jourSemaine = new ArrayCollection();
        $this->indisponibilites = new ArrayCollection();
        $this->plannings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;
        return $this;
    }

    public function getHeuresMensuelles(): ?int
    {
        return $this->heuresMensuelles;
    }

    public function setHeuresMensuelles(int $heuresMensuelles): self
    {
        $this->heuresMensuelles = $heuresMensuelles;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * @return Collection<int, Disponibilite>
     */
    public function getJourSemaine(): Collection
    {
        return $this->jourSemaine;
    }

    public function addJourSemaine(Disponibilite $disponibilite): self
    {
        if (!$this->jourSemaine->contains($disponibilite)) {
            $this->jourSemaine->add($disponibilite);
            $disponibilite->setPersonnel($this);
        }
        return $this;
    }

    public function removeJourSemaine(Disponibilite $disponibilite): self
    {
        if ($this->jourSemaine->removeElement($disponibilite)) {
            if ($disponibilite->getPersonnel() === $this) {
                $disponibilite->setPersonnel(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Indisponibilite>
     */
    public function getIndisponibilites(): Collection
    {
        return $this->indisponibilites;
    }

    public function addIndisponibilite(Indisponibilite $indisponibilite): self
    {
        if (!$this->indisponibilites->contains($indisponibilite)) {
            $this->indisponibilites->add($indisponibilite);
            $indisponibilite->setPersonnel($this);
        }
        return $this;
    }

    public function removeIndisponibilite(Indisponibilite $indisponibilite): self
    {
        if ($this->indisponibilites->removeElement($indisponibilite)) {
            if ($indisponibilite->getPersonnel() === $this) {
                $indisponibilite->setPersonnel(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Planning>
     */
    public function getPlannings(): Collection
    {
        return $this->plannings;
    }

    public function addPlanning(Planning $planning): self
    {
        if (!$this->plannings->contains($planning)) {
            $this->plannings->add($planning);
            $planning->setPersonnel($this);
        }
        return $this;
    }

    public function removePlanning(Planning $planning): self
    {
        if ($this->plannings->removeElement($planning)) {
            if ($planning->getPersonnel() === $this) {
                $planning->setPersonnel(null);
            }
        }
        return $this;
    }

    public function getTypeContrat(): ?string
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(string $typeContrat): self
    {
        $this->typeContrat = $typeContrat;
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
}
