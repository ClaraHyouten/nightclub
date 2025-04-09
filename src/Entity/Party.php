<?php

namespace App\Entity;

use App\Repository\PartyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartyRepository::class)]
class Party
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateParty = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    /**
     * @var Collection<int, Dj>
     */
    #[ORM\ManyToMany(targetEntity: Dj::class, mappedBy: 'party')]
    private Collection $djs;

    /**
     * @var Collection<int, MaterielSoiree>
     */
    #[ORM\OneToMany(targetEntity: MaterielSoiree::class, mappedBy: 'party')]
    private Collection $materielSoirees;

    public function __construct()
    {
        $this->djs = new ArrayCollection();
        $this->materielSoirees = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDateParty(): ?\DateTimeInterface
    {
        return $this->dateParty;
    }

    public function setDateParty(\DateTimeInterface $dateParty): static
    {
        $this->dateParty = $dateParty;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): static
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * @return Collection<int, Dj>
     */
    public function getDjs(): Collection
    {
        return $this->djs;
    }

    public function addDj(Dj $dj): static
    {
        if (!$this->djs->contains($dj)) {
            $this->djs->add($dj);
            $dj->addParty($this);
        }

        return $this;
    }

    public function removeDj(Dj $dj): static
    {
        if ($this->djs->removeElement($dj)) {
            $dj->removeParty($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, MaterielSoiree>
     */
    public function getMaterielSoirees(): Collection
    {
        return $this->materielSoirees;
    }

    public function addMaterielSoiree(MaterielSoiree $materielSoiree): static
    {
        if (!$this->materielSoirees->contains($materielSoiree)) {
            $this->materielSoirees->add($materielSoiree);
            $materielSoiree->setParty($this);
        }

        return $this;
    }

    public function removeMaterielSoiree(MaterielSoiree $materielSoiree): static
    {
        if ($this->materielSoirees->removeElement($materielSoiree)) {
            // set the owning side to null (unless already changed)
            if ($materielSoiree->getParty() === $this) {
                $materielSoiree->setParty(null);
            }
        }

        return $this;
    }
}