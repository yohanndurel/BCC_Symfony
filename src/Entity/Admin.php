<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin
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
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroTel;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $motDePasse;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity=Lieu::class, mappedBy="admin")
     */
    private $idLieu;

    public function __construct()
    {
        $this->idLieu = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getNumeroTel(): ?int
    {
        return $this->numeroTel;
    }

    public function setNumeroTel(int $numeroTel): self
    {
        $this->numeroTel = $numeroTel;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection|lieu[]
     */
    public function getIdLieu(): Collection
    {
        return $this->idLieu;
    }

    public function addIdLieu(lieu $idLieu): self
    {
        if (!$this->idLieu->contains($idLieu)) {
            $this->idLieu[] = $idLieu;
            $idLieu->setAdmin($this);
        }

        return $this;
    }

    public function removeIdLieu(lieu $idLieu): self
    {
        if ($this->idLieu->removeElement($idLieu)) {
            // set the owning side to null (unless already changed)
            if ($idLieu->getAdmin() === $this) {
                $idLieu->setAdmin(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return (string)($this->getPrenom()." ".$this->getNom());
    }
}
