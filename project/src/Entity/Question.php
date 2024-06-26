<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Attribute\Groups;
use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
#[ApiResource(
        operations: [
            new Get(normalizationContext: ['groups' => 'question:item']),
            new GetCollection(normalizationContext: ['groups' => 'question:list'])
        ],
        paginationEnabled: false,
        order: ['id' => 'ASC'],
    )]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['question:list', 'question:item'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['question:list', 'question:item'])]
    private ?string $text = null;
    
    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['question:list', 'question:item'])]
    private ?string $answer0 = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['question:list', 'question:item'])]
    private ?string $answer1 = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['question:list', 'question:item'])]
    private ?string $answer2 = null;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    #[Groups(['question:list', 'question:item'])]
    private ?Category $category = null;

    /**
     * @var Collection<int, Score>
     */
    #[ORM\OneToMany(targetEntity: Score::class, mappedBy: 'questions')]
    private Collection $scores;

    public function __construct()
    {
        $this->scores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getAnswer1(): ?string
    {
        return $this->answer1;
    }

    public function setAnswer1(string $answer1): static
    {
        $this->answer1 = $answer1;

        return $this;
    }

    public function getAnswer2(): ?string
    {
        return $this->answer2;
    }

    public function setAnswer2(string $answer2): static
    {
        $this->answer2 = $answer2;

        return $this;
    }

    public function getAnswer0(): ?string
    {
        return $this->answer0;
    }

    public function setAnswer0(string $answer0): static
    {
        $this->answer0 = $answer0;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

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
            $score->setQuestion($this);
        }

        return $this;
    }

    public function removeScore(Score $score): static
    {
        if ($this->scores->removeElement($score)) {
            // set the owning side to null (unless already changed)
            if ($score->getQuestion() === $this) {
                $score->setQuestion(null);
            }
        }

        return $this;
    }
}
