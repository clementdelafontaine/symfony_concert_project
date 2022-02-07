<?php

namespace App\Entity;

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
     * @ORM\OneToOne(targetEntity=ConcertHall::class, inversedBy="concert", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $concertHall;

    /**
     * @ORM\ManyToOne(targetEntity=Band::class, inversedBy="concerts")
     */
    private $openingBand;

    /**
     * @ORM\ManyToOne(targetEntity=Band::class, inversedBy="concertsAsMain")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mainBand;

    /**
     * @ORM\ManyToOne(targetEntity=Management::class, inversedBy="concertsAsMain")
     */
    private $management;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $info;

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

    public function getConcertHall(): ?ConcertHall
    {
        return $this->concertHall;
    }

    public function setConcertHall(ConcertHall $concertHall): self
    {
        $this->concertHall = $concertHall;

        return $this;
    }

    public function getOpeningBand(): ?Band
    {
        return $this->openingBand;
    }

    public function setOpeningBand(?Band $openingBand): self
    {
        $this->openingBand = $openingBand;

        return $this;
    }

    public function getMainBand(): ?Band
    {
        return $this->mainBand;
    }

    public function setMainBand(?Band $mainBand): self
    {
        $this->mainBand = $mainBand;

        return $this;
    }

    public function getManagement(): ?Management
    {
        return $this->management;
    }

    public function setManagement(?Management $management): self
    {
        $this->management = $management;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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


}
