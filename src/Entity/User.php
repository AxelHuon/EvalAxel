<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\ManyToOne(targetEntity: Specialite::class, inversedBy: 'users')]
    private $specialite;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Mediations::class)]
    private $mediations;

    #[ORM\OneToMany(mappedBy: 'mediateur', targetEntity: Mediations::class)]
    private $mediateur;

    public function __construct()
    {
        $this->mediations = new ArrayCollection();
        $this->mediateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
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
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
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

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getSpecialite(): ?Specialite
    {
        return $this->specialite;
    }

    public function setSpecialite(?Specialite $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * @return Collection<int, Mediations>
     */
    public function getMediations(): Collection
    {
        return $this->mediations;
    }

    public function addMediation(Mediations $mediation): self
    {
        if (!$this->mediations->contains($mediation)) {
            $this->mediations[] = $mediation;
            $mediation->setUserId($this);
        }

        return $this;
    }

    public function removeMediation(Mediations $mediation): self
    {
        if ($this->mediations->removeElement($mediation)) {
            // set the owning side to null (unless already changed)
            if ($mediation->getUserId() === $this) {
                $mediation->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Mediations>
     */
    public function getMediateur(): Collection
    {
        return $this->mediateur;
    }

    public function addMediateur(Mediations $mediateur): self
    {
        if (!$this->mediateur->contains($mediateur)) {
            $this->mediateur[] = $mediateur;
            $mediateur->setMediateur($this);
        }

        return $this;
    }

    public function removeMediateur(Mediations $mediateur): self
    {
        if ($this->mediateur->removeElement($mediateur)) {
            // set the owning side to null (unless already changed)
            if ($mediateur->getMediateur() === $this) {
                $mediateur->setMediateur(null);
            }
        }

        return $this;
    }
}
