<?php

namespace App\Entity;
 
use App\Repository\PublishTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PublishTRepository::class)]

class PublishT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(inversedBy: 'reportPublishTs', targetEntity: ReportT::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $report;

    #[ORM\ManyToOne(targetEntity: ParameterT::class, inversedBy: 'frequencyPublishTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $frequency;

    #[ORM\Column(type: 'date')]
    private $first_release_of_month;

    #[ORM\Column(type: 'date')]
    private $start_date;

    #[ORM\Column(type: 'date', nullable: true)]
    private $end_date;

    #[ORM\OneToMany(mappedBy: 'publish', targetEntity: WarningT::class)]
    private $publish_warning;

    public function __construct()
    {
        $this->publish_warning = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReport(): ?ReportT
    {
        return $this->report;
    }

    public function setReport(ReportT $report): self
    {
        $this->report = $report;

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

    public function getFirstReleaseOfMonth(): ?\DateTimeInterface
    {
        return $this->first_release_of_month;
    }

    public function setFirstReleaseOfMonth(\DateTimeInterface $first_release_of_month): self
    {
        $this->first_release_of_month = $first_release_of_month;

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
    function __toString()
    {
        return $this->report;
    }

    /**
     * @return Collection<int, WarningT>
     */
    public function getPublishWarning(): Collection
    {
        return $this->publish_warning;
    }

    public function addPublishWarning(WarningT $publishWarning): self
    {
        if (!$this->publish_warning->contains($publishWarning)) {
            $this->publish_warning[] = $publishWarning;
            $publishWarning->setFrequency($this);
        }

        return $this;
    }

    public function removePublishWarning(WarningT $publishWarning): self
    {
        if ($this->publish_warning->removeElement($publishWarning)) {
            // set the owning side to null (unless already changed)
            if ($publishWarning->getFrequency() === $this) {
                $publishWarning->setFrequency(null);
            }
        }

        return $this;
    }
}
