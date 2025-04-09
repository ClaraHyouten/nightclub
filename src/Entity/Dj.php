<?php

namespace App\Entity;

use App\Repository\DjRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DjRepository::class)]
class Dj
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    /**
     * @var Collection<int, Party>
     */
    #[ORM\ManyToMany(targetEntity: Party::class, inversedBy: 'djs')]
    private Collection $party;

    public function __construct()
    {
        $this->party = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return Collection<int, Party>
     */
    public function getParty(): Collection
    {
        return $this->party;
    }

    public function addParty(Party $party): static
    {
        if (!$this->party->contains($party)) {
            $this->party->add($party);
        }

        return $this;
    }

    public function removeParty(Party $party): static
    {
        $this->party->removeElement($party);

        return $this;
    }
}
