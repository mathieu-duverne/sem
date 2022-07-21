<?php

namespace App\Entity;

use App\Repository\ParameterTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParameterTRepository::class)]
#[UniqueEntity('code')]
class ParameterT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $type;

    #[ORM\Column(name: 'code', type: 'string', length: 100, unique: true)]
    private $code;

    #[ORM\Column(type: 'string', length: 100)]
    private $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $descr;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $symbol;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $picture_url;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: DataLocationT::class)]
    private $typeDataLocationTs;
 
    #[ORM\OneToMany(mappedBy: 'etl', targetEntity: InterfaceT::class)]
    private $etlTs;

    #[ORM\OneToMany(mappedBy: 'domain', targetEntity: KpiT::class)]
    private $domainKpiTs;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: KpiT::class)]
    private $categoryKpiTs;

    #[ORM\OneToMany(mappedBy: 'role', targetEntity: KpiT::class)]
    private $roleKpiTs;

    #[ORM\OneToMany(mappedBy: 'unit', targetEntity: KpiVersionT::class)]
    private $unitKpiVersionTs;

    #[ORM\OneToMany(mappedBy: 'frequency', targetEntity: KpiVersionT::class)]
    private $frequencyKpiVersionTs;

    #[ORM\OneToMany(mappedBy: 'organism', targetEntity: KpiVersionT::class)]
    private $organismKpiVersionTs;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: ReportT::class)]
    private $typeReportTs;

    #[ORM\OneToMany(mappedBy: 'bi_tool', targetEntity: ReportT::class)]
    private $biToolsReportTs;

    #[ORM\OneToMany(mappedBy: 'frequency', targetEntity: PublishT::class)]
    private $frequencyPublishTs;

    #[ORM\OneToMany(mappedBy: 'frequency', targetEntity: WarningT::class)]
    private $parameter_warning;


    public function __construct()
    {
        $this->typeDataLocationTs = new ArrayCollection();
        $this->etlTs = new ArrayCollection();
        $this->domainKpiTs = new ArrayCollection();
        $this->categoryKpiTs = new ArrayCollection();
        $this->roleKpiTs = new ArrayCollection();
        $this->unitKpiVersionTs = new ArrayCollection();
        $this->frequencyKpiVersionTs = new ArrayCollection();
        $this->organismKpiVersionTs = new ArrayCollection();
        $this->typeReportTs = new ArrayCollection();
        $this->biToolsReportTs = new ArrayCollection();
        $this->frequencyPublishTs = new ArrayCollection();
        $this->parameter_warning = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
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

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(?string $symbol): self
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getPictureUrl(): ?string
    {
        return $this->picture_url;
    }

    public function setPictureUrl(?string $picture_url): self
    {
        $this->picture_url = $picture_url;

        return $this;
    }

    /**
     * @return Collection<int, DataLocationT>
     */
    public function getTypeDataLocationTs(): Collection
    {
        return $this->typeDataLocationTs;
    }

    public function addTypeDataLocationT(DataLocationT $typeDataLocationT): self
    {
        if (!$this->typeDataLocationTs->contains($typeDataLocationT)) {
            $this->typeDataLocationTs[] = $typeDataLocationT;
            $typeDataLocationT->setType($this);
        }

        return $this;
    }

    public function removeTypeDataLocationT(DataLocationT $typeDataLocationT): self
    {
        if ($this->typeDataLocationTs->removeElement($typeDataLocationT)) {
            // set the owning side to null (unless already changed)
            if ($typeDataLocationT->getType() === $this) {
                $typeDataLocationT->setType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, InterfaceT>
     */
    public function getEtlTs(): Collection
    {
        return $this->etlTs;
    }

    public function addEtlT(InterfaceT $etlT): self
    {
        if (!$this->etlTs->contains($etlT)) {
            $this->etlTs[] = $etlT;
            $etlT->setEtl($this);
        }

        return $this;
    }

    public function removeEtlT(InterfaceT $etlT): self
    {
        if ($this->etlTs->removeElement($etlT)) {
            // set the owning side to null (unless already changed)
            if ($etlT->getEtl() === $this) {
                $etlT->setEtl(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, KpiT>
     */
    public function getDomainKpiTs(): Collection
    {
        return $this->domainKpiTs;
    }

    public function addDomainKpiT(KpiT $domainKpiT): self
    {
        if (!$this->domainKpiTs->contains($domainKpiT)) {
            $this->domainKpiTs[] = $domainKpiT;
            $domainKpiT->setDomain($this);
        }

        return $this;
    }

    public function removeDomainKpiT(KpiT $domainKpiT): self
    {
        if ($this->domainKpiTs->removeElement($domainKpiT)) {
            // set the owning side to null (unless already changed)
            if ($domainKpiT->getDomain() === $this) {
                $domainKpiT->setDomain(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, KpiT>
     */
    public function getCategoryKpiTs(): Collection
    {
        return $this->categoryKpiTs;
    }

    public function addCategoryKpiT(KpiT $categoryKpiT): self
    {
        if (!$this->categoryKpiTs->contains($categoryKpiT)) {
            $this->categoryKpiTs[] = $categoryKpiT;
            $categoryKpiT->setCategory($this);
        }

        return $this;
    }

    public function removeCategoryKpiT(KpiT $categoryKpiT): self
    {
        if ($this->categoryKpiTs->removeElement($categoryKpiT)) {
            // set the owning side to null (unless already changed)
            if ($categoryKpiT->getCategory() === $this) {
                $categoryKpiT->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, KpiT>
     */
    public function getRoleKpiTs(): Collection
    {
        return $this->roleKpiTs;
    }

    public function addRoleKpiT(KpiT $roleKpiT): self
    {
        if (!$this->roleKpiTs->contains($roleKpiT)) {
            $this->roleKpiTs[] = $roleKpiT;
            $roleKpiT->setRole($this);
        }

        return $this;
    }

    public function removeRoleKpiT(KpiT $roleKpiT): self
    {
        if ($this->roleKpiTs->removeElement($roleKpiT)) {
            // set the owning side to null (unless already changed)
            if ($roleKpiT->getRole() === $this) {
                $roleKpiT->setRole(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, KpiVersionT>
     */
    public function getUnitKpiVersionTs(): Collection
    {
        return $this->unitKpiVersionTs;
    }

    public function addUnitKpiVersionT(KpiVersionT $unitKpiVersionT): self
    {
        if (!$this->unitKpiVersionTs->contains($unitKpiVersionT)) {
            $this->unitKpiVersionTs[] = $unitKpiVersionT;
            $unitKpiVersionT->setUnit($this);
        }

        return $this;
    }

    public function removeUnitKpiVersionT(KpiVersionT $unitKpiVersionT): self
    {
        if ($this->unitKpiVersionTs->removeElement($unitKpiVersionT)) {
            // set the owning side to null (unless already changed)
            if ($unitKpiVersionT->getUnit() === $this) {
                $unitKpiVersionT->setUnit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, KpiVersionT>
     */
    public function getFrequencyKpiVersionTs(): Collection
    {
        return $this->frequencyKpiVersionTs;
    }

    public function addFrequencyKpiVersionT(KpiVersionT $frequencyKpiVersionT): self
    {
        if (!$this->frequencyKpiVersionTs->contains($frequencyKpiVersionT)) {
            $this->frequencyKpiVersionTs[] = $frequencyKpiVersionT;
            $frequencyKpiVersionT->setFrequency($this);
        }

        return $this;
    }

    public function removeFrequencyKpiVersionT(KpiVersionT $frequencyKpiVersionT): self
    {
        if ($this->frequencyKpiVersionTs->removeElement($frequencyKpiVersionT)) {
            // set the owning side to null (unless already changed)
            if ($frequencyKpiVersionT->getFrequency() === $this) {
                $frequencyKpiVersionT->setFrequency(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, KpiVersionT>
     */
    public function getOrganismKpiVersionTs(): Collection
    {
        return $this->organismKpiVersionTs;
    }

    public function addOrganismKpiVersionT(KpiVersionT $organismKpiVersionT): self
    {
        if (!$this->organismKpiVersionTs->contains($organismKpiVersionT)) {
            $this->organismKpiVersionTs[] = $organismKpiVersionT;
            $organismKpiVersionT->setOrganism($this);
        }

        return $this;
    }

    public function removeOrganismKpiVersionT(KpiVersionT $organismKpiVersionT): self
    {
        if ($this->organismKpiVersionTs->removeElement($organismKpiVersionT)) {
            // set the owning side to null (unless already changed)
            if ($organismKpiVersionT->getOrganism() === $this) {
                $organismKpiVersionT->setOrganism(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReportT>
     */
    public function getTypeReportTs(): Collection
    {
        return $this->typeReportTs;
    }

    public function addTypeReportT(ReportT $typeReportT): self
    {
        if (!$this->typeReportTs->contains($typeReportT)) {
            $this->typeReportTs[] = $typeReportT;
            $typeReportT->setType($this);
        }

        return $this;
    }

    public function removeTypeReportT(ReportT $typeReportT): self
    {
        if ($this->typeReportTs->removeElement($typeReportT)) {
            // set the owning side to null (unless already changed)
            if ($typeReportT->getType() === $this) {
                $typeReportT->setType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReportT>
     */
    public function getBiToolsReportTs(): Collection
    {
        return $this->biToolsReportTs;
    }

    public function addBiToolsReportT(ReportT $biToolsReportT): self
    {
        if (!$this->biToolsReportTs->contains($biToolsReportT)) {
            $this->biToolsReportTs[] = $biToolsReportT;
            $biToolsReportT->setBiTool($this);
        }

        return $this;
    }

    public function removeBiToolsReportT(ReportT $biToolsReportT): self
    {
        if ($this->biToolsReportTs->removeElement($biToolsReportT)) {
            // set the owning side to null (unless already changed)
            if ($biToolsReportT->getBiTool() === $this) {
                $biToolsReportT->setBiTool(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PublishT>
     */
    public function getFrequencyPublishTs(): Collection
    {
        return $this->frequencyPublishTs;
    }

    public function addFrequencyPublishT(PublishT $frequencyPublishT): self
    {
        if (!$this->frequencyPublishTs->contains($frequencyPublishT)) {
            $this->frequencyPublishTs[] = $frequencyPublishT;
            $frequencyPublishT->setFrequency($this);
        }

        return $this;
    }

    public function removeFrequencyPublishT(PublishT $frequencyPublishT): self
    {
        if ($this->frequencyPublishTs->removeElement($frequencyPublishT)) {
            // set the owning side to null (unless already changed)
            if ($frequencyPublishT->getFrequency() === $this) {
                $frequencyPublishT->setFrequency(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection<int, WarningT>
     */
    public function getParameterWarning(): Collection
    {
        return $this->Parameter_warning;
    }

    public function addParameterWarning(WarningT $parameterWarning): self
    {
        if (!$this->Parameter_warning->contains($parameterWarning)) {
            $this->Parameter_warning[] = $parameterWarning;
            $parameterWarning->setFrequency($this);
        }

        return $this;
    }

    public function removeParameterWarning(WarningT $parameterWarning): self
    {
        if ($this->Parameter_warning->removeElement($parameterWarning)) {
            // set the owning side to null (unless already changed)
            if ($parameterWarning->getFrequency() === $this) {
                $parameterWarning->setFrequency(null);
            }
        }

        return $this;
    }
}
