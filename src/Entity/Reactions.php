<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reactions
 *
 * @ORM\Table(name="reactions", indexes={@ORM\Index(name="id_article", columns={"id_article"})})
 * @ORM\Entity(repositoryClass=App\Repository\ReactionsRepository::class)
 */
class Reactions
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
     * @var int
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     */
    private $idArticle;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="type_react", type="string", length=45, nullable=false)
     */
    private $typeReact;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getTypeReact(): ?string
    {
        return $this->typeReact;
    }

    public function setTypeReact(string $typeReact): static
    {
        $this->typeReact = $typeReact;

        return $this;
    }


}
