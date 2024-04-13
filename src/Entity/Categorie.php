<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass=App\Repository\CategorieRepository::class)
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_categorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategorie;

    /**
     * @var bool
     *
     * @ORM\Column(name="espaceCouvert", type="boolean", nullable=false)
     */
    private $espacecouvert;

    /**
     * @var bool
     *
     * @ORM\Column(name="espaceEnfants", type="boolean", nullable=false)
     */
    private $espaceenfants;

    /**
     * @var bool
     *
     * @ORM\Column(name="espaceFumeur", type="boolean", nullable=false)
     */
    private $espacefumeur;

    /**
     * @var bool
     *
     * @ORM\Column(name="serviceRestauration", type="boolean", nullable=false)
     */
    private $servicerestauration;

    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
    }

    public function isEspacecouvert(): ?bool
    {
        return $this->espacecouvert;
    }

    public function setEspacecouvert(bool $espacecouvert): static
    {
        $this->espacecouvert = $espacecouvert;

        return $this;
    }

    public function isEspaceenfants(): ?bool
    {
        return $this->espaceenfants;
    }

    public function setEspaceenfants(bool $espaceenfants): static
    {
        $this->espaceenfants = $espaceenfants;

        return $this;
    }

    public function isEspacefumeur(): ?bool
    {
        return $this->espacefumeur;
    }

    public function setEspacefumeur(bool $espacefumeur): static
    {
        $this->espacefumeur = $espacefumeur;

        return $this;
    }

    public function isServicerestauration(): ?bool
    {
        return $this->servicerestauration;
    }

    public function setServicerestauration(bool $servicerestauration): static
    {
        $this->servicerestauration = $servicerestauration;

        return $this;
    }


}
