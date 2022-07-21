<?php

namespace App\Entity;

use App\Repository\ReportTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReportTRepository::class)]
#[UniqueEntity('code')]
class ReportT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(name: 'code', type: 'string', length: 50, unique: true)]
    private $code;
 
    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 1000, nullable: true)]
    private $descr;

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'typeReportTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'biToolsReportTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $bi_tool;

    #[ORM\Column(type: 'string', length: 255)]
    private $path;

    #[ORM\Column(type: 'array')]
    private $data_location_ids = [];

    #[ORM\OneToOne(mappedBy: 'report', targetEntity: PublishT::class, cascade: ['persist', 'remove'])]
    private $reportPublishTs;

    #[ORM\OneToOne(mappedBy: 'report', targetEntity: ContactT::class, cascade: ['persist', 'remove'])]
    private $ReportContactTs;

    #[ORM\OneToMany(mappedBy: 'report', targetEntity: WarningT::class)]
    private $report_warning;

    public function __construct()
    {
        $this->report_warning = new ArrayCollection();
    }

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

    public function getDescr(): ?string
    {
        return $this->descr;
    }

    public function setDescr(?string $descr): self
    {
        $this->descr = $descr;

        return $this;
    }

    public function getType(): ?ParameterT
    {
        return $this->type;
    }

    public function setType(?ParameterT $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getBiTool(): ?ParameterT
    {
        return $this->bi_tool;
    }

    public function setBiTool(?ParameterT $bi_tool): self
    {
        $this->bi_tool = $bi_tool;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getDataLocationIds(): ?array
    {
        return $this->data_location_ids;
    }

    public function setDataLocationIds(array $data_location_ids): self
    {
        $this->data_location_ids = $data_location_ids;

        return $this;
    }

    public function getReportPublishTs(): ?PublishT
    {
        return $this->reportPublishTs;
    }

    public function setReportPublishTs(PublishT $reportPublishTs): self
    {
        // set the owning side of the relation if necessary
        if ($reportPublishTs->getReport() !== $this) {
            $reportPublishTs->setReport($this);
        }

        $this->reportPublishTs = $reportPublishTs;

        return $this;
    }

    public function getReportContactTs(): ?ContactT
    {
        return $this->ReportContactTs;
    }

    public function setReportContactTs(?ContactT $ReportContactTs): self
    {
        // unset the owning side of the relation if necessary
        if ($ReportContactTs === null && $this->ReportContactTs !== null) {
            $this->ReportContactTs->setReport(null);
        }

        // set the owning side of the relation if necessary
        if ($ReportContactTs !== null && $ReportContactTs->getReport() !== $this) {
            $ReportContactTs->setReport($this);
        }

        $this->ReportContactTs = $ReportContactTs;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection<int, WarningT>
     */
    public function getReportWarning(): Collection
    {
        return $this->report_warning;
    }

    public function addReportWarning(WarningT $reportWarning): self
    {
        if (!$this->report_warning->contains($reportWarning)) {
            $this->report_warning[] = $reportWarning;
            $reportWarning->setPublish($this);
        }

        return $this;
    }

    public function removeReportWarning(WarningT $reportWarning): self
    {
        if ($this->report_warning->removeElement($reportWarning)) {
            // set the owning side to null (unless already changed)
            if ($reportWarning->getPublish() === $this) {
                $reportWarning->setPublish(null);
            }
        }

        return $this;
    }
}
