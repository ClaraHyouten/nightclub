<?php

namespace App\Entity;

use App\Repository\MaterielSoireeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterielSoireeRepository::class)]
class MaterielSoiree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $bookingDate = null;

    #[ORM\ManyToOne(inversedBy: 'party')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Material $materiel = null;

    #[ORM\ManyToOne(inversedBy: 'materielSoirees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Party $party = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookingDate(): ?\DateTimeInterface
    {
        return $this->bookingDate;
    }

    public function setBookingDate(\DateTimeInterface $bookingDate): static
    {
        $this->bookingDate = $bookingDate;

        return $this;
    }

    public function getMateriel(): ?Material
    {
        return $this->materiel;
    }

    public function setMateriel(?Material $materiel): static
    {
        $this->materiel = $materiel;

        return $this;
    }

    public function getParty(): ?Party
    {
        return $this->party;
    }

    public function setParty(?Party $party): static
    {
        $this->party = $party;

        return $this;
    }
}
