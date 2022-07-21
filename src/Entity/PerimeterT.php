<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\PerimeterTRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Entity(repositoryClass: PerimeterTRepository::class)]
#[UniqueEntity('name')]
class PerimeterT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(name: 'name', type: 'string', length: 100, unique: true)]
    private $name;

    public function __construct()
    {
        $this->userPerimeterTs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, UserRightT>
     */
    public function getUserPerimeterTs(): Collection
    {
        return $this->userPerimeterTs;
    }

    public function addUserPerimeterT(UserRightT $userPerimeterT): self
    {
        if (!$this->userPerimeterTs->contains($userPerimeterT)) {
            $this->userPerimeterTs[] = $userPerimeterT;
            $userPerimeterT->setPerimeter($this);
        }

        return $this;
    }

    public function removeUserPerimeterT(UserRightT $userPerimeterT): self
    {
        if ($this->userPerimeterTs->removeElement($userPerimeterT)) {
            // set the owning side to null (unless already changed)
            if ($userPerimeterT->getPerimeter() === $this) {
                $userPerimeterT->setPerimeter(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
