<?php

namespace App\Entity;

use App\Repository\OrdreAchatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdreAchatRepository::class)
 */
class OrdreAchat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idProduit;

    /**
     * @ORM\ManyToOne(targetEntity=Acheteur::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idAcheteur;

    /**
     * @ORM\ManyToOne(targetEntity=Enchere::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEnchere;

    /**
     * @ORM\Column(type="float")
     */
    private $montantMax;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseDepot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduit(): ?produit
    {
        return $this->idProduit;
    }

    public function setIdProduit(?produit $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    public function getIdAcheteur(): ?acheteur
    {
        return $this->idAcheteur;
    }

    public function setIdAcheteur(?acheteur $idAcheteur): self
    {
        $this->idAcheteur = $idAcheteur;

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

    public function getMontantMax(): ?float
    {
        return $this->montantMax;
    }

    public function setMontantMax(float $montantMax): self
    {
        $this->montantMax = $montantMax;

        return $this;
    }

    public function getAdresseDepot(): ?string
    {
        return $this->adresseDepot;
    }

    public function setAdresseDepot(string $adresseDepot): self
    {
        $this->adresseDepot = $adresseDepot;

        return $this;
    }
}
