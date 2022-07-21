<?php
 
namespace App\Entity;

use App\Repository\InterfaceTRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterfaceTRepository::class)]
#[ORM\UniqueConstraint(
    name: 'interface_uniquekey_1_i',
    columns: ['name', 'data_source_id', 'data_target_id']
)]
class InterfaceT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 1000)]
    private $descr;

    #[ORM\ManyToOne(targetEntity: DataLocationT::class, inversedBy: 'dataSourceTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $data_source;

    #[ORM\ManyToOne(targetEntity: DataLocationT::class, inversedBy: 'dataTargetTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $data_target;

    #[ORM\Column(type: 'json')]
    private $perimeter_ids = [];

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'etlTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $etl;

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

    public function getDataSource(): ?DataLocationT
    {
        return $this->data_source;
    }

    public function setDataSource(?DataLocationT $data_source): self
    {
        $this->data_source = $data_source;

        return $this;
    }

    public function getDataTarget(): ?DataLocationT
    {
        return $this->data_target;
    }

    public function setDataTarget(?DataLocationT $data_target): self
    {
        $this->data_target = $data_target;

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

    public function getEtl(): ?ParameterT
    {
        return $this->etl;
    }

    public function setEtl(?ParameterT $etl): self
    {
        $this->etl = $etl;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
