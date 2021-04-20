<?php

namespace App\Entity;

use App\Repository\LotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LotRepository::class)
 */
class Lot
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Enchere::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEnchere;

    /**
     * @ORM\ManyToMany(targetEntity=Encherir::class, mappedBy="idLot")
     */
    private $encherir;

    /**
     * @ORM\Column(type="float")
     */
    private $estimationActuelle;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixVente;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixReserve;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEstimation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateVente;

    public function __construct()
    {
        $this->encherir = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIdEnchere(): ?enchere
    {
        return $this->idEnchere;
    }

    public function setIdEnchere(?enchere $idEnchere): self
    {
        $this->idEnchere = $idEnchere;

        return $this;
    }

    /**
     * @return Collection|Encherir[]
     */
    public function getEncherir(): Collection
    {
        return $this->encherir;
    }

    public function addEncherir(Encherir $encherir): self
    {
        if (!$this->encherir->contains($encherir)) {
            $this->encherir[] = $encherir;
            $encherir->addIdLot($this);
        }

        return $this;
    }

    public function removeEncherir(Encherir $encherir): self
    {
        if ($this->encherir->removeElement($encherir)) {
            $encherir->removeIdLot($this);
        }

        return $this;
    }

    public function getEstimationActuelle(): ?float
    {
        return $this->estimationActuelle;
    }

    public function setEstimationActuelle(float $estimationActuelle): self
    {
        $this->estimationActuelle = $estimationActuelle;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->prixVente;
    }

    public function setPrixVente(?float $prixVente): self
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    public function getPrixReserve(): ?float
    {
        return $this->prixReserve;
    }

    public function setPrixReserve(?float $prixReserve): self
    {
        $this->prixReserve = $prixReserve;

        return $this;
    }

    public function getDateEstimation(): ?\DateTimeInterface
    {
        return $this->dateEstimation;
    }

    public function setDateEstimation(\DateTimeInterface $dateEstimation): self
    {
        $this->dateEstimation = $dateEstimation;

        return $this;
    }

    public function getDateVente(): ?\DateTimeInterface
    {
        return $this->dateVente;
    }

    public function setDateVente(?\DateTimeInterface $dateVente): self
    {
        $this->dateVente = $dateVente;

        return $this;
    }
}
