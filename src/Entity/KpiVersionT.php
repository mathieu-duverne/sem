<?php

namespace App\Entity;
 
use App\Repository\KpiVersionTRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KpiVersionTRepository::class)]
#[ORM\UniqueConstraint(
    name: 'kpi_version_uniquekey_1_i',
    columns: ['kpi_id', 'version']
)]
class KpiVersionT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: KpiT::class, inversedBy: 'kpiVersionTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $kpi;

    #[ORM\Column(type: 'float')]
    private $version;

    #[ORM\Column(type: 'date')]
    private $start_date;

    #[ORM\Column(type: 'date', nullable: true)]
    private $end_date;

    #[ORM\Column(type: 'string', length: 1000)]
    private $calc_descr;

    #[ORM\Column(type: 'integer')]
    private $criticity;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $penalty;

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'unitKpiVersionTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $unit;

    #[ORM\Column(type: 'float')]
    private $accuracy;

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'frequencyKpiVersionTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $frequency;

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'organismKpiVersionTs')]
    private $organism;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $ext_ref;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $doc_url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKpi(): ?KpiT
    {
        return $this->kpi;
    }

    public function setKpi(?KpiT $kpi): self
    {
        $this->kpi = $kpi;

        return $this;
    }

    public function getVersion(): ?float
    {
        return $this->version;
    }

    public function setVersion(float $version): self
    {
        $this->version = $version;

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

    public function getCalcDescr(): ?string
    {
        return $this->calc_descr;
    }

    public function setCalcDescr(string $calc_descr): self
    {
        $this->calc_descr = $calc_descr;

        return $this;
    }

    public function getCriticity(): ?int
    {
        return $this->criticity;
    }

    public function setCriticity(int $criticity): self
    {
        $this->criticity = $criticity;

        return $this;
    }

    public function getPenalty(): ?int
    {
        return $this->penalty;
    }

    public function setPenalty(?int $penalty): self
    {
        $this->penalty = $penalty;

        return $this;
    }

    public function getUnit(): ?ParameterT
    {
        return $this->unit;
    }

    public function setUnit(?ParameterT $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getAccuracy(): ?float
    {
        return $this->accuracy;
    }

    public function setAccuracy(float $accuracy): self
    {
        $this->accuracy = $accuracy;

        return $this;
    }

    public function getFrequency(): ?ParameterT
    {
        return $this->frequency;
    }

    public function setFrequency(?ParameterT $frequency): self
    {
        $this->frequency = $frequency;

        return $this;
    }

    public function getOrganism(): ?ParameterT
    {
        return $this->organism;
    }

    public function setOrganism(?ParameterT $organism): self
    {
        $this->organism = $organism;

        return $this;
    }

    public function getExtRef(): ?string
    {
        return $this->ext_ref;
    }

    public function setExtRef(?string $ext_ref): self
    {
        $this->ext_ref = $ext_ref;

        return $this;
    }

    public function getDocUrl(): ?string
    {
        return $this->doc_url;
    }

    public function setDocUrl(?string $doc_url): self
    {
        $this->doc_url = $doc_url;

        return $this;
    }
}
