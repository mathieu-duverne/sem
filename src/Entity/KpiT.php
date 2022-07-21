<?php

namespace App\Entity;

use App\Repository\KpiTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KpiTRepository::class)]
#[UniqueEntity('ref')]
class KpiT
{ 
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(name: 'ref', type: 'string', length: 100, unique: true)]
    private $ref;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 1000)]
    private $descr;

    #[ORM\Column(type: 'string', length: 1000)]
    private $goal;

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'domainKpiTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $domain;

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'categoryKpiTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $category;

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'roleKpiTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $role;

    #[ORM\Column(type: 'date')]
    private $start_date;

    #[ORM\Column(type: 'date', nullable: true)]
    private $end_date;

    #[ORM\Column(type: 'json')]
    private $perimeter_ids = [];

    #[ORM\OneToMany(mappedBy: 'kpi', targetEntity: KpiVersionT::class)]
    private $kpiVersionTs;

    #[ORM\OneToOne(mappedBy: 'data_kpi', targetEntity: ContactT::class, cascade: ['persist', 'remove'])]
    private $KpiContactTs;

    #[ORM\OneToMany(mappedBy: 'kpi', targetEntity: WarningT::class)]
    private $kpi_warning;


    public function __construct()
    {
        $this->kpiVersionTs = new ArrayCollection();
        $this->kpi_warning = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
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

    public function getDescr(): ?string
    {
        return $this->descr;
    }

    public function setDescr(string $descr): self
    {
        $this->descr = $descr;

        return $this;
    }

    public function getGoal(): ?string
    {
        return $this->goal;
    }

    public function setGoal(string $goal): self
    {
        $this->goal = $goal;

        return $this;
    }

    public function getDomain(): ?ParameterT
    {
        return $this->domain;
    }

    public function setDomain(?ParameterT $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function getCategory(): ?ParameterT
    {
        return $this->category;
    }

    public function setCategory(?ParameterT $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getRole(): ?ParameterT
    {
        return $this->role;
    }

    public function setRole(?ParameterT $role): self
    {
        $this->role = $role;

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

    public function getPerimeterIds(): ?array
    {
        return $this->perimeter_ids;
    }

    public function setPerimeterIds(array $perimeter_ids): self
    {
        $this->perimeter_ids = $perimeter_ids;

        return $this;
    }

    /**
     * @return Collection<int, KpiVersionT>
     */
    public function getKpiVersionTs(): Collection
    {
        return $this->kpiVersionTs;
    }

    public function addKpiVersionT(KpiVersionT $kpiVersionT): self
    {
        if (!$this->kpiVersionTs->contains($kpiVersionT)) {
            $this->kpiVersionTs[] = $kpiVersionT;
            $kpiVersionT->setKpi($this);
        }

        return $this;
    }

    public function removeKpiVersionT(KpiVersionT $kpiVersionT): self
    {
        if ($this->kpiVersionTs->removeElement($kpiVersionT)) {
            // set the owning side to null (unless already changed)
            if ($kpiVersionT->getKpi() === $this) {
                $kpiVersionT->setKpi(null);
            }
        }

        return $this;
    }

    public function getKpiContactTs(): ?ContactT
    {
        return $this->KpiContactTs;
    }

    public function setKpiContactTs(?ContactT $KpiContactTs): self
    {
        // unset the owning side of the relation if necessary
        if ($KpiContactTs === null && $this->KpiContactTs !== null) {
            $this->KpiContactTs->setDataKpi(null);
        }

        // set the owning side of the relation if necessary
        if ($KpiContactTs !== null && $KpiContactTs->getDataKpi() !== $this) {
            $KpiContactTs->setDataKpi($this);
        }

        $this->KpiContactTs = $KpiContactTs;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection<int, WarningT>
     */
    public function getKpiWarning(): Collection
    {
        return $this->kpi_warning;
    }

    public function addKpiWarning(WarningT $kpiWarning): self
    {
        if (!$this->kpi_warning->contains($kpiWarning)) {
            $this->kpi_warning[] = $kpiWarning;
            $kpiWarning->setKpi($this);
        }

        return $this;
    }

    public function removeKpiWarning(WarningT $kpiWarning): self
    {
        if ($this->kpi_warning->removeElement($kpiWarning)) {
            // set the owning side to null (unless already changed)
            if ($kpiWarning->getKpi() === $this) {
                $kpiWarning->setKpi(null);
            }
        }

        return $this;
    }
}
