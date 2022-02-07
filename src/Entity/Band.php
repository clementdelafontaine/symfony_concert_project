<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Band
 *
 * @ORM\Table(name="band")
 * @ORM\Entity
 */
class Band
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
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="style", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $style = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=30, nullable=false)
     */
    private $picture;

    /**
     * @var string|null
     *
     * @ORM\Column(name="info", type="string", length=256, nullable=true, options={"default"="NULL"})
     */
    private $info = 'NULL';

    /**
     * @ORM\ManyToMany(targetEntity=Artist::class, inversedBy="bands")
     */
    private $Artists;

    /**
     * @ORM\OneToMany(targetEntity=Concert::class, mappedBy="openingBand")
     */
    private $concerts;

    /**
     * @ORM\OneToMany(targetEntity=Concert::class, mappedBy="mainBand")
     */
    private $concertsAsMain;

    public function __construct()
    {
        $this->Artists = new ArrayCollection();
        $this->concerts = new ArrayCollection();
        $this->concertsAsMain = new ArrayCollection();
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

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(?string $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

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

    /**
     * @return Collection|Artist[]
     */
    public function getArtists(): Collection
    {
        return $this->Artists;
    }

    public function addArtist(Artist $Artist): self
    {
        if (!$this->Artists->contains($Artist)) {
            $this->Artists[] = $Artist;
        }

        return $this;
    }

    public function removeArtist(Artist $Artist): self
    {
        $this->Artists->removeElement($Artist);

        return $this;
    }

    /**
     * @return Collection|Concert[]
     */
    public function getConcerts(): Collection
    {
        return $this->concerts;
    }

    public function addConcert(Concert $concert): self
    {
        if (!$this->concerts->contains($concert)) {
            $this->concerts[] = $concert;
            $concert->setOpeningBand($this);
        }

        return $this;
    }

    public function removeConcert(Concert $concert): self
    {
        if ($this->concerts->removeElement($concert)) {
            // set the owning side to null (unless already changed)
            if ($concert->getOpeningBand() === $this) {
                $concert->setOpeningBand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Concert[]
     */
    public function getConcertsAsMain(): Collection
    {
        return $this->concertsAsMain;
    }

    public function addConcertsAsMain(Concert $concertsAsMain): self
    {
        if (!$this->concertsAsMain->contains($concertsAsMain)) {
            $this->concertsAsMain[] = $concertsAsMain;
            $concertsAsMain->setMainBand($this);
        }

        return $this;
    }

    public function removeConcertsAsMain(Concert $concertsAsMain): self
    {
        if ($this->concertsAsMain->removeElement($concertsAsMain)) {
            // set the owning side to null (unless already changed)
            if ($concertsAsMain->getMainBand() === $this) {
                $concertsAsMain->setMainBand(null);
            }
        }

        return $this;
    }


}
