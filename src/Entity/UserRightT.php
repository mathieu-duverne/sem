<?php

namespace App\Entity;
 
use App\Repository\UserRightTRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRightTRepository::class)]
#[ORM\UniqueConstraint(
    name: 'user_right_uniquekey_1_i',
    columns: ['people_id', 'perimeter_id']
)]
class UserRightT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: PeopleT::class, inversedBy: 'userRightTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $people;

    #[ORM\ManyToOne(targetEntity: PerimeterT::class, inversedBy: 'userPerimeterTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $perimeter;

    #[ORM\Column(type: 'date')]
    private $start_date;

    #[ORM\Column(type: 'date', nullable: true)]
    private $end_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeople(): ?PeopleT
    {
        return $this->people;
    }

    public function setPeople(?PeopleT $people): self
    {
        $this->people = $people;

        return $this;
    }

    public function getPerimeter(): ?PerimeterT
    {
        return $this->perimeter;
    }

    public function setPerimeter(?PerimeterT $perimeter): self
    {
        $this->perimeter = $perimeter;

        return $this;
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
}
