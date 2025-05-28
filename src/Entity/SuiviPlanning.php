<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class SuiviPlanning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Planning::class, inversedBy: 'suiviPlannings')]
    private $planning;

    #[ORM\ManyToOne(targetEntity: Etat::class)]
    private $etat;

    #[ORM\Column(type: 'datetime')]
    private $date;

    public function getId(): ?int { return $this->id; }

    public function getPlanning(): ?Planning { return $this->planning; }
    public function setPlanning(?Planning $planning): self { $this->planning = $planning; return $this; }

    public function getEtat(): ?Etat { return $this->etat; }
    public function setEtat(?Etat $etat): self { $this->etat = $etat; return $this; }

    public function getDate(): ?\DateTimeInterface { return $this->date; }
    public function setDate(\DateTimeInterface $date): self { $this->date = $date ; return $this; }
}
