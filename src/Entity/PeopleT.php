<?php

namespace App\Entity;

use App\Repository\PeopleTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeopleTRepository::class)]
#[ORM\Table(name: '`people_t`')]
#[UniqueEntity(fields: ['email'])]
class PeopleT 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(name: 'email', type: 'string', length: 100, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'date')]
    private $start_date;

    #[ORM\Column(type: 'date', nullable: true)]
    private $end_date;

    #[ORM\Column(type: 'boolean')]
    private $is_user;

    #[ORM\OneToMany(mappedBy: 'people', targetEntity: UserRightT::class)]
    private $userRightTs;

    #[ORM\OneToMany(mappedBy: 'perimeter', targetEntity: UserRightT::class)]
    private $userPerimeterTs;

    #[ORM\OneToMany(mappedBy: 'people', targetEntity: ContactT::class)]
    private $PeopleContactTs;

    #[ORM\OneToMany(mappedBy: 'owner', targetEntity: ContactT::class)]
    private $OwnerContactTs;

    public function __construct()
    {
        $this->userRightTs = new ArrayCollection();
        $this->PeopleContactTs = new ArrayCollection();
        $this->OwnerContactTs = new ArrayCollection();
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

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(?\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getIsUser(): ?bool
    {
        return $this->is_user;
    }

    public function setIsUser(bool $is_user): self
    {
        $this->is_user = $is_user;

        return $this;
    }

    /**
     * @return Collection<int, UserRightT>
     */
    public function getUserRightTs(): Collection
    {
        return $this->userRightTs;
    }

    public function addUserRightT(UserRightT $userRightT): self
    {
        if (!$this->userRightTs->contains($userRightT)) {
            $this->userRightTs[] = $userRightT;
            $userRightT->setPeople($this);
        }

        return $this;
    }

    public function removeUserRightT(UserRightT $userRightT): self
    {
        if ($this->userRightTs->removeElement($userRightT)) {
            // set the owning side to null (unless already changed)
            if ($userRightT->getPeople() === $this) {
                $userRightT->setPeople(null);
            }
        }

        return $this;
    }
    /**
     * @return Collection<int, ContactT>
     */
    public function getPeopleContactTs(): Collection
    {
        return $this->PeopleContactTs;
    }

    public function addPeopleContactT(ContactT $peopleContactT): self
    {
        if (!$this->PeopleContactTs->contains($peopleContactT)) {
            $this->PeopleContactTs[] = $peopleContactT;
            $peopleContactT->setPeople($this);
        }

        return $this;
    }

    public function removePeopleContactT(ContactT $peopleContactT): self
    {
        if ($this->PeopleContactTs->removeElement($peopleContactT)) {
            // set the owning side to null (unless already changed)
            if ($peopleContactT->getPeople() === $this) {
                $peopleContactT->setPeople(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ContactT>
     */
    public function getOwnerContactTs(): Collection
    {
        return $this->OwnerContactTs;
    }

    public function addOwnerContactT(ContactT $ownerContactT): self
    {
        if (!$this->OwnerContactTs->contains($ownerContactT)) {
            $this->OwnerContactTs[] = $ownerContactT;
            $ownerContactT->setOwner($this);
        }

        return $this;
    }

    public function removeOwnerContactT(ContactT $ownerContactT): self
    {
        if ($this->OwnerContactTs->removeElement($ownerContactT)) {
            // set the owning side to null (unless already changed)
            if ($ownerContactT->getOwner() === $this) {
                $ownerContactT->setOwner(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->email;
    }
}
