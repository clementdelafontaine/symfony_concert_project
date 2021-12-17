<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Concert
 *
 * @ORM\Table(name="concert")
 * @ORM\Entity
 */
class Concert
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="poster", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $poster = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="info", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $info = 'NULL';

    /**
     * @ORM\OneToOne(targetEntity=ConcertHall::class, inversedBy="concert", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $concertHall;

    /**
     * @ORM\ManyToOne(targetEntity=band::class, inversedBy="concerts")
     */
    private $openingBand;

    /**
     * @ORM\ManyToOne(targetEntity=band::class, inversedBy="concertsAsMain")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mainBand;

    /**
     * @ORM\ManyToMany(targetEntity=management::class, inversedBy="concerts")
     */
    private $management;

    /**
     * @ORM\OneToMany(targetEntity=Date::class, mappedBy="concert")
     */
    private $dates;

    public function __construct()
    {
        $this->management = new ArrayCollection();
        $this->dates = new ArrayCollection();
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

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getConcertHall(): ?ConcertHall
    {
        return $this->concertHall;
    }

    public function setConcertHall(ConcertHall $concertHall): self
    {
        $this->concertHall = $concertHall;

        return $this;
    }

    public function getOpeningBand(): ?band
    {
        return $this->openingBand;
    }

    public function setOpeningBand(?band $openingBand): self
    {
        $this->openingBand = $openingBand;

        return $this;
    }

    public function getMainBand(): ?band
    {
        return $this->mainBand;
    }

    public function setMainBand(?band $mainBand): self
    {
        $this->mainBand = $mainBand;

        return $this;
    }

    /**
     * @return Collection|management[]
     */
    public function getManagement(): Collection
    {
        return $this->management;
    }

    public function addManagement(management $management): self
    {
        if (!$this->management->contains($management)) {
            $this->management[] = $management;
        }

        return $this;
    }

    public function removeManagement(management $management): self
    {
        $this->management->removeElement($management);

        return $this;
    }

    /**
     * @return Collection|Date[]
     */
    public function getDates(): Collection
    {
        return $this->dates;
    }

    public function addDate(Date $date): self
    {
        if (!$this->dates->contains($date)) {
            $this->dates[] = $date;
            $date->setConcert($this);
        }

        return $this;
    }

    public function removeDate(Date $date): self
    {
        if ($this->dates->removeElement($date)) {
            // set the owning side to null (unless already changed)
            if ($date->getConcert() === $this) {
                $date->setConcert(null);
            }
        }

        return $this;
    }


}
