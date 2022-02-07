<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ConcertHall
 *
 * @ORM\Table(name="concert_hall")
 * @ORM\Entity
 */
class ConcertHall
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
     * @ORM\Column(name="picture", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $picture = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="adress", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $adress = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="info", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $info = 'NULL';

    /**
     * @ORM\OneToOne(targetEntity=Concert::class, mappedBy="concertHall", cascade={"persist", "remove"})
     */
    private $concert;

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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

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

    public function getConcert(): ?Concert
    {
        return $this->concert;
    }

    public function setConcert(Concert $concert): self
    {
        // set the owning side of the relation if necessary
        if ($concert->getConcertHall() !== $this) {
            $concert->setConcertHall($this);
        }

        $this->concert = $concert;

        return $this;
    }
}
