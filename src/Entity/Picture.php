<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 */
class Picture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    public function __toString()
    {
        return $this->name;
    }

    /**
     * @ORM\ManyToOne(targetEntity=Association::class, inversedBy="pictures")
     */
    private $associations;

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

    public function getAssociations(): ?Association
    {
        return $this->associations;
    }

    public function setAssociations(?Association $associations): self
    {
        $this->associations = $associations;

        return $this;
    }
}
