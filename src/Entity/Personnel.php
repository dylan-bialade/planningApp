<?php

namespace App\Entity;

use App\Repository\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: PersonnelRepository::class)]
class Personnel implements UserInterface, PasswordAuthenticatedUserInterface
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
    #[Assert\NotBlank(message: "L'âge est requis.")]
    private ?int $age = null;

    #[ORM\Column(type: 'integer')]
    private ?int $heuresMensuelles = null;

    #[ORM\Column(length: 20)]
    private ?string $statut = null;

    #[ORM\Column(length: 255)]
    private ?string $typeContrat = null;

    #[ORM\ManyToOne(targetEntity: Groupe::class, inversedBy: 'personnels')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Groupe $groupe = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: 'json', options: ['default' => '[]'])]
    private array $roles = [];

    #[ORM\OneToMany(targetEntity: Disponibilite::class, mappedBy: 'personnel', cascade: ['persist', 'remove'])]
    private Collection $jourSemaine;

    #[ORM\OneToMany(targetEntity: Indisponibilite::class, mappedBy: 'personnel', cascade: ['persist', 'remove'])]
    private Collection $indisponibilites;

    #[ORM\OneToMany(targetEntity: Planning::class, mappedBy: 'personnel', cascade: ['persist', 'remove'])]
    private Collection $plannings;

    public function __construct()
    {
        $this->jourSemaine = new ArrayCollection();
        $this->indisponibilites = new ArrayCollection();
        $this->plannings = new ArrayCollection();
        $this->roles = ['ROLE_USER'];
    }

    public function getId(): ?int { return $this->id; }

    public function getNom(): ?string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }

    public function getPrenom(): ?string { return $this->prenom; }
    public function setPrenom(string $prenom): self { $this->prenom = $prenom; return $this; }

    public function getAge(): ?int { return $this->age; }
    public function setAge(int $age): self { $this->age = $age; return $this; }

    public function getHeuresMensuelles(): ?int { return $this->heuresMensuelles; }
    public function setHeuresMensuelles(int $heuresMensuelles): self { $this->heuresMensuelles = $heuresMensuelles; return $this; }

    public function getStatut(): ?string { return $this->statut; }
    public function setStatut(string $statut): self { $this->statut = $statut; return $this; }

    public function getTypeContrat(): ?string { return $this->typeContrat; }
    public function setTypeContrat(string $typeContrat): self { $this->typeContrat = $typeContrat; return $this; }

    public function getGroupe(): ?Groupe { return $this->groupe; }
    public function setGroupe(?Groupe $groupe): self { $this->groupe = $groupe; return $this; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): self { $this->email = $email; return $this; }

    public function getPassword(): string { return $this->password; }
    public function setPassword(string $password): self { $this->password = $password; return $this; }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function eraseCredentials(): void {}
    public function getUserIdentifier(): string { return $this->email; }

    public function getJourSemaine(): Collection { return $this->jourSemaine; }
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

    public function getIndisponibilites(): Collection { return $this->indisponibilites; }
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

    public function getPlannings(): Collection { return $this->plannings; }
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

    public function getTempsTravailRestant(): int
    {
        $totalHeures = 0;
        foreach ($this->plannings as $planning) {
            $totalHeures += $planning->getDuree();
        }
        return max(0, $this->heuresMensuelles - $totalHeures);
    }

    public function isDisponible(\DateTime $day, string $plage): bool
    {
        foreach ($this->indisponibilites as $indispo) {
            if (
                $indispo->getDate()->format('Y-m-d') === $day->format('Y-m-d') &&
                $indispo->getPlage() === $plage
            ) {
                return false;
            }
        }

        foreach ($this->jourSemaine as $disp) {
            if (
                $disp->getJourSemaine() === $day->format('l') &&
                $disp->getPlage() === $plage
            ) {
                return $disp->isDispo();
            }
        }

        return $this->statut === 'interimaire';
    }

    public function peutAccepterHeures(\DateTime $day, string $plage): bool
    {
        $previous = [];
        foreach ($this->plannings as $pl) {
            if ($pl->getDate() < $day) {
                $previous[] = $pl;
            }
        }
        usort($previous, fn($a, $b) => $b->getDate()->getTimestamp() <=> $a->getDate()->getTimestamp());

        if (!empty($previous)) {
            $last = $previous[0];
            $diff = $last->getDateFin()->diff(new \DateTime($day->format('Y-m-d').' 00:00:00'));
            if ($diff->h < 11) {
                return false;
            }
        }

        $weekNum = (int)$day->format('W');
        $countDays = [];
        foreach ($this->plannings as $pl) {
            if ((int)$pl->getDate()->format('W') === $weekNum) {
                $countDays[$pl->getDate()->format('Y-m-d')] = true;
            }
        }

        return count($countDays) < 5;
    }
    
    public function peutAccepterPlanning(Planning $planning): bool
    {
        // Vérifier si le personnel a suffisamment d'heures disponibles
        $dateDebut = $planning->getDateDebut();
        $dateFin = $planning->getDateFin();
        
        if (!$dateDebut || !$dateFin) {
            return false;
        }
        
        // Calculer la durée du planning en heures
        $duree = ($dateFin->getTimestamp() - $dateDebut->getTimestamp()) / 3600;
        
        // Vérifier si le personnel a suffisamment d'heures restantes
        if ($duree > $this->getTempsTravailRestant()) {
            return false;
        }
        
        // Vérifier si le personnel est disponible à ce créneau
        $date = $planning->getDate();
        $plage = $planning->getPlage();
        
        if (!$date || !$plage) {
            return false;
        }
        
        if (!$this->isDisponible($date, $plage)) {
            return false;
        }
        
        // Vérifier si le personnel peut accepter plus d'heures ce jour-là
        if (!$this->peutAccepterHeures($date, $plage)) {
            return false;
        }
        
        // Vérifier s'il y a des conflits avec d'autres plannings
        foreach ($this->plannings as $existingPlanning) {
            // Ignorer le planning actuel s'il est déjà dans la collection
            if ($existingPlanning->getId() === $planning->getId()) {
                continue;
            }
            
            $existingDebut = $existingPlanning->getDateDebut();
            $existingFin = $existingPlanning->getDateFin();
            
            // Vérifier s'il y a chevauchement
            if ($dateDebut < $existingFin && $dateFin > $existingDebut) {
                return false;
            }
        }
        
        return true;
    }
}
