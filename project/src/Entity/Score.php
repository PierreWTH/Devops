<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Attribute\Groups;
use App\Repository\ScoreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'score:item']),
        new GetCollection(normalizationContext: ['groups' => 'score:list'])
    ],
    paginationEnabled: false,
    order: ['id' => 'ASC'],
)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['score:list', 'score:item'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['score:list', 'score:item'])]
    private ?string $comment = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Groups(['score:list', 'score:item'])]
    private ?int $grade = null;

    #[ORM\ManyToOne(inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['score:list', 'score:item'])]
    private ?Synthesis $synthesis = null;

    #[ORM\ManyToOne(inversedBy: 'scores')]
    #[Groups(['score:list', 'score:item'])]
    private ?Question $question = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): static
    {
        $this->grade = $grade;

        return $this;
    }

    public function getSynthesis(): ?Synthesis
    {
        return $this->synthesis;
    }

    public function setSynthesis(?Synthesis $synthesis): static
    {
        $this->synthesis = $synthesis;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): static
    {
        $this->question = $question;

        return $this;
    }
}
