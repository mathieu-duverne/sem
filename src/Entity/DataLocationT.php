<?php

namespace App\Entity;

use App\Repository\DataLocationTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataLocationTRepository::class)]
#[ORM\UniqueConstraint(
    name: 'data_location_uniquekey_1_i',
    columns: ['name', 'type_id']
)]
class DataLocationT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $descr;

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'typeDataLocationTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;

    #[ORM\Column(type: 'json')]
    private $perimeter_ids = [];

    #[ORM\OneToMany(mappedBy: 'data_source', targetEntity: InterfaceT::class)]
    private $dataSourceTs;

    #[ORM\OneToMany(mappedBy: 'data_target', targetEntity: InterfaceT::class)]
    private $dataTargetTs;

    #[ORM\OneToOne(mappedBy: 'data_location', targetEntity: ContactT::class, cascade: ['persist', 'remove'])]
    private $DataLocationContactTs;

    public function __construct()
    {
        $this->dataSourceTs = new ArrayCollection();
        $this->dataTargetTs = new ArrayCollection();
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

    public function getDescr(): ?string
    {
        return $this->descr;
    }

    public function setDescr(string $descr): self
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
     * @return Collection<int, InterfaceT>
     */
    public function getDataSourceTs(): Collection
    {
        return $this->dataSourceTs;
    }

    public function addDataSourceT(InterfaceT $dataSourceT): self
    {
        if (!$this->dataSourceTs->contains($dataSourceT)) {
            $this->dataSourceTs[] = $dataSourceT;
            $dataSourceT->setDataSource($this);
        }

        return $this;
    }

    public function removeDataSourceT(InterfaceT $dataSourceT): self
    {
        if ($this->dataSourceTs->removeElement($dataSourceT)) {
            // set the owning side to null (unless already changed)
            if ($dataSourceT->getDataSource() === $this) {
                $dataSourceT->setDataSource(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, InterfaceT>
     */
    public function getDataTargetTs(): Collection
    {
        return $this->dataTargetTs;
    }

    public function addDataTargetT(InterfaceT $dataTargetT): self
    {
        if (!$this->dataTargetTs->contains($dataTargetT)) {
            $this->dataTargetTs[] = $dataTargetT;
            $dataTargetT->setDataTarget($this);
        }

        return $this;
    }

    public function removeDataTargetT(InterfaceT $dataTargetT): self
    {
        if ($this->dataTargetTs->removeElement($dataTargetT)) {
            // set the owning side to null (unless already changed)
            if ($dataTargetT->getDataTarget() === $this) {
                $dataTargetT->setDataTarget(null);
            }
        }

        return $this;
    }

    public function getDataLocationContactTs(): ?ContactT
    {
        return $this->DataLocationContactTs;
    }

    public function setDataLocationContactTs(?ContactT $DataLocationContactTs): self
    {
        // unset the owning side of the relation if necessary
        if ($DataLocationContactTs === null && $this->DataLocationContactTs !== null) {
            $this->DataLocationContactTs->setDataLocation(null);
        }

        // set the owning side of the relation if necessary
        if ($DataLocationContactTs !== null && $DataLocationContactTs->getDataLocation() !== $this) {
            $DataLocationContactTs->setDataLocation($this);
        }

        $this->DataLocationContactTs = $DataLocationContactTs;

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
