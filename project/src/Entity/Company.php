<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Attribute\Groups;
use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'company:item']),
        new GetCollection(normalizationContext: ['groups' => 'company:list'])
    ],
    order: ['name' => 'ASC'],
    paginationEnabled: false,
    forceEager: false,
)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Company implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['company:list', 'company:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    #[Groups(['company:list', 'company:item'])]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    #[Groups(['company:list', 'company:item'])]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    /**
     * @var Collection<int, Synthesis>
     */
    #[ORM\OneToMany(targetEntity: Synthesis::class, mappedBy: 'company')]
    #[Groups(['company:list', 'company:item'])]
    private Collection $syntheses;

    #[ORM\Column(length: 255)]
    #[Groups(['company:list', 'company:item', 'synthesis:list', 'synthesis:item'])]
    private ?string $name = null;

    public function __construct()
    {
        $this->syntheses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Synthesis>
     */
    public function getSyntheses(): Collection
    {
        return $this->syntheses;
    }

    public function addSynthesis(Synthesis $synthesis): static
    {
        if (!$this->syntheses->contains($synthesis)) {
            $this->syntheses->add($synthesis);
            $synthesis->setCompany($this);
        }

        return $this;
    }

    public function removeSynthesis(Synthesis $synthesis): static
    {
        if ($this->syntheses->removeElement($synthesis)) {
            // set the owning side to null (unless already changed)
            if ($synthesis->getCompany() === $this) {
                $synthesis->setCompany(null);
            }
        }

        return $this;
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
}
