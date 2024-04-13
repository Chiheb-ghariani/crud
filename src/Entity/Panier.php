<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_article", columns={"id_article"})})
 * @ORM\Entity(repositoryClass=App\Repository\PanierRepository::class)
 */
class Panier
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_panier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPanier;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_article", type="integer", nullable=false)
     */
    private $nbrArticle;

    /**
     * @var int
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     */
    private $idArticle;

    public function getIdPanier(): ?int
    {
        return $this->idPanier;
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

    public function getNbrArticle(): ?int
    {
        return $this->nbrArticle;
    }

    public function setNbrArticle(int $nbrArticle): static
    {
        $this->nbrArticle = $nbrArticle;

        return $this;
    }

    public function getIdArticle(): ?int
    {
        return $this->idArticle;
    }

    public function setIdArticle(int $idArticle): static
    {
        $this->idArticle = $idArticle;

        return $this;
    }


}
