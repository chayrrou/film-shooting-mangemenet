<?php

namespace App\Entity;

use App\Repository\LieuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LieuRepository::class)]
class Lieu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $localisationDeScene = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocalisationDeScene(): ?string
    {
        return $this->localisationDeScene;
    }

    public function setLocalisationDeScene(string $localisationDeScene): self
    {
        $this->localisationDeScene = $localisationDeScene;

        return $this;
    }
    public function __toString(){
        return $this->id; // Remplacer champ par une propriété "string" de l'entité
    }
}
