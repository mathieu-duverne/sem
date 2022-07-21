<?php

namespace App\Entity;

use App\Repository\WarningTRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WarningTRepository::class)]
class WarningT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $code;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'parameter_warning')]
    #[ORM\JoinColumn(nullable: false)]
    private $frequency;

    #[ORM\ManyToOne(targetEntity: PublishT::class, inversedBy: 'publish_warning')]
    private $publish;

    #[ORM\ManyToOne(targetEntity: ReportT::class, inversedBy: 'report_warning')]
    private $report;

    #[ORM\ManyToOne(targetEntity: KpiT::class, inversedBy: 'kpi_warning')]
    private $kpi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

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

    public function getFrequency(): ?ParameterT
    {
        return $this->frequency;
    }

    public function setFrequency(?ParameterT $frequency): self
    {
        $this->frequency = $frequency;

        return $this;
    }

    public function getPublish(): ?PublishT
    {
        return $this->publish;
    }

    public function setPublish(?PublishT $publish): self
    {
        $this->publish = $publish;

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

    public function getKpi(): ?KpiT
    {
        return $this->kpi;
    }

    public function setKpi(?KpiT $kpi): self
    {
        $this->kpi = $kpi;

        return $this;
    }
}
