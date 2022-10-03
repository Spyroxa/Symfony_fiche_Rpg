<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnageRepository::class)
 */
class Personnage
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
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau;

    /**
     * @ORM\Column(type="integer")
     */
    private $experience;

    /**
     * @ORM\Column(type="integer")
     */
    private $vie;

    /**
     * @ORM\ManyToOne(targetEntity=TypePersonnage::class, inversedBy="personnages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Type;

    /**
     * @ORM\Column(type="integer")
     */
    private $Forces;

    /**
     * @ORM\Column(type="integer")
     */
    private $Intelligence;

    /**
     * @ORM\Column(type="integer")
     */
    private $Endurance;

    /**
     * @ORM\Column(type="integer")
     */
    private $Magie;

    /**
     * @ORM\Column(type="integer")
     */
    private $Agilite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;



    public function __construct()
    {
        $this->Competences = new ArrayCollection();
        $this->Competence = new ArrayCollection();
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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getVie(): ?int
    {
        return $this->vie;
    }

    public function setVie(int $vie): self
    {
        $this->vie = $vie;

        return $this;
    }

    public function getType(): ?TypePersonnage
    {
        return $this->Type;
    }

    public function setType(?TypePersonnage $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return Collection<int, CompetencesPersonnage>
     */
    public function getCompetences(): Collection
    {
        return $this->Competences;
    }

    public function addCompetence(CompetencesPersonnage $competence): self
    {
        if (!$this->Competences->contains($competence)) {
            $this->Competences[] = $competence;
        }

        return $this;
    }

    public function removeCompetence(CompetencesPersonnage $competence): self
    {
        $this->Competences->removeElement($competence);

        return $this;
    }

    /**
     * @return Collection<int, CompetencesPersonnage>
     */
    public function getCompetence(): Collection
    {
        return $this->Competence;
    }

    public function getForces(): ?int
    {
        return $this->Forces;
    }

    public function setForces(int $Forces): self
    {
        $this->Forces = $Forces;

        return $this;
    }

    public function getIntelligence(): ?int
    {
        return $this->Intelligence;
    }

    public function setIntelligence(int $Intelligence): self
    {
        $this->Intelligence = $Intelligence;

        return $this;
    }

    public function getEndurance(): ?int
    {
        return $this->Endurance;
    }

    public function setEndurance(int $Endurance): self
    {
        $this->Endurance = $Endurance;

        return $this;
    }

    public function getMagie(): ?int
    {
        return $this->Magie;
    }

    public function setMagie(int $Magie): self
    {
        $this->Magie = $Magie;

        return $this;
    }

    public function getAgilite(): ?int
    {
        return $this->Agilite;
    }

    public function setAgilite(int $Agilite): self
    {
        $this->Agilite = $Agilite;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }
}
