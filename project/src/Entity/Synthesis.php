<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Attribute\Groups;
use App\Repository\SynthesisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SynthesisRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'synthesis:item']),
        new GetCollection(normalizationContext: ['groups' => 'synthesis:list'])
    ],
    paginationEnabled: false,
    order: ['id' => 'ASC'],
    forceEager: false,
)]
class Synthesis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['synthesis:list', 'synthesis:item'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'syntheses')]
    #[Groups(['synthesis:list', 'synthesis:item'])]
    private ?Company $company = null;

    /**
     * @var Collection<int, Score>
     */
    #[ORM\OneToMany(targetEntity: Score::class, mappedBy: 'synthesis', orphanRemoval: true)]
    private Collection $scores;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['company:list', 'company:item'])]
    private ?\DateTimeInterface $created = null;

    public function __construct()
    {
        $this->scores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): static
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return Collection<int, Score>
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function addScore(Score $score): static
    {
        if (!$this->scores->contains($score)) {
            $this->scores->add($score);
            $score->setSynthesis($this);
        }

        return $this;
    }

    public function removeScore(Score $score): static
    {
        if ($this->scores->removeElement($score)) {
            // set the owning side to null (unless already changed)
            if ($score->getSynthesis() === $this) {
                $score->setSynthesis(null);
            }
        }

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): static
    {
        $this->created = $created;

        return $this;
    }
}
