<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Espacepartenaire
 *
 * @ORM\Table(name="espacepartenaire", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_categorie", columns={"id_categorie"})})
 * @ORM\Entity(repositoryClass=App\Repository\EspacepartenaireRepository::class)
 */
class Espacepartenaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_espace", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEspace;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false, options={"default"="2"})
     */
    private $idUser = 2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=false)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="photos", type="string", length=255, nullable=false)
     */
    private $photos;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_categorie", type="integer", nullable=true)
     */
    private $idCategorie;

    /**
     * @var bool
     *
     * @ORM\Column(name="accepted", type="boolean", nullable=false)
     */
    private $accepted = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="nbclick", type="integer", nullable=false)
     */
    private $nbclick = '0';

    public function getIdEspace(): ?int
    {
        return $this->idEspace;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): static
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPhotos(): ?string
    {
        return $this->photos;
    }

    public function setPhotos(string $photos): static
    {
        $this->photos = $photos;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getIdCategorie(): ?int
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?int $idCategorie): static
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    public function isAccepted(): ?bool
    {
        return $this->accepted;
    }

    public function setAccepted(bool $accepted): static
    {
        $this->accepted = $accepted;

        return $this;
    }

    public function getNbclick(): ?int
    {
        return $this->nbclick;
    }

    public function setNbclick(int $nbclick): static
    {
        $this->nbclick = $nbclick;

        return $this;
    }


}
