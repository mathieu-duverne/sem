<?php

namespace App\Entity;

use App\Repository\ContactTRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactTRepository::class)]
class ContactT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id; 

    #[ORM\ManyToOne(targetEntity: PeopleT::class, inversedBy: 'PeopleContactTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $people;

    #[ORM\ManyToOne(targetEntity: PeopleT::class, inversedBy: 'OwnerContactTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $owner;

    #[ORM\OneToOne(inversedBy: 'KpiContactTs', targetEntity: KpiT::class, cascade: ['persist', 'remove'])]
    private $data_kpi;

    #[ORM\OneToOne(inversedBy: 'ReportContactTs', targetEntity: ReportT::class, cascade: ['persist', 'remove'])]
    private $report;

    #[ORM\OneToOne(inversedBy: 'DataLocationContactTs', targetEntity: DataLocationT::class, cascade: ['persist', 'remove'])]
    private $data_location;

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

    public function getOwner(): ?PeopleT
    {
        return $this->owner;
    }

    public function setOwner(?PeopleT $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getDataKpi(): ?KpiT
    {
        return $this->data_kpi;
    }

    public function setDataKpi(?KpiT $data_kpi): self
    {
        $this->data_kpi = $data_kpi;

        return $this;
    }

    public function getReport(): ?ReportT
    {
        return $this->report;
    }

    public function setReport(?ReportT $report): self
    {
        $this->report = $report;

        return $this;
    }

    public function getDataLocation(): ?DataLocationT
    {
        return $this->data_location;
    }

    public function setDataLocation(?DataLocationT $data_location): self
    {
        $this->data_location = $data_location;

        return $this;
    }
    public function  __toString()
    {
        return $this->owner;
    }
}
