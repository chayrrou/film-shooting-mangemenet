<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column(length: 25)]
    private ?string $genre = null;

    #[ORM\Column(length: 20)]
    private ?string $langue = null;

    #[ORM\Column(length: 30)]
    private ?string $typeDeTournage = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?SocieteDeProduction $societeDeProduction = null;

    #[ORM\ManyToMany(targetEntity: Realisateur::class)]
    private Collection $realisateur;

    public function __construct()
    {
        $this->realisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getTypeDeTournage(): ?string
    {
        return $this->typeDeTournage;
    }

    public function setTypeDeTournage(string $typeDeTournage): self
    {
        $this->typeDeTournage = $typeDeTournage;

        return $this;
    }

    public function getSocieteDeProduction(): ?SocieteDeProduction
    {
        return $this->societeDeProduction;
    }

    public function setSocieteDeProduction(?SocieteDeProduction $societeDeProduction): self
    {
        $this->societeDeProduction = $societeDeProduction;

        return $this;
    }

    /**
     * @return Collection<int, Realisateur>
     */
    public function getRealisateur(): Collection
    {
        return $this->realisateur;
    }

    public function addRealisateur(Realisateur $realisateur): self
    {
        if (!$this->realisateur->contains($realisateur)) {
            $this->realisateur->add($realisateur);
        }

        return $this;
    }

    public function removeRealisateur(Realisateur $realisateur): self
    {
        $this->realisateur->removeElement($realisateur);

        return $this;
    }

    public function __toString(){
        return $this->titre; // Remplacer champ par une propriété "string" de l'entité
    }


   
}
