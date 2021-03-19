<?php

namespace App\Entity;

use App\Repository\VendeurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VendeurRepository::class)
 */
class Vendeur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idPersonne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPersonne(): ?personne
    {
        return $this->idPersonne;
    }

    public function setIdPersonne(?personne $idPersonne): self
    {
        $this->idPersonne = $idPersonne;

        return $this;
    }
}
