<?php

namespace App\Entity;

use App\Repository\EnchereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnchereRepository::class)
 */
class Enchere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=Lieu::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idLieu;

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idAdmin;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getIdLieu(): ?lieu
    {
        return $this->idLieu;
    }

    public function setIdLieu(?lieu $idLieu): self
    {
        $this->idLieu = $idLieu;

        return $this;
    }

    public function getIdAdmin(): ?admin
    {
        return $this->idAdmin;
    }

    public function setIdAdmin(?admin $idAdmin): self
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }

    public function __toString()
    {
        return (string)($this->getNom());
    }
}
