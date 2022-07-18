<?php

namespace App\Entity;

use App\Repository\FormationScpRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationScpRepository::class)
 */
class FormationScp
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $info;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $plaquette;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $planning;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prerequis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dureeFormation;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="formationScp")
     */
    private $formations;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
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

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): self
    {
        $this->info = $info;

        return $this;
    }


    public function getPlaquette(): ?string
    {
        return $this->plaquette;
    }

    public function setPlaquette(string $plaquette): self
    {
        $this->plaquette = $plaquette;

        return $this;
    }

    public function getPlanning(): ?string
    {
        return $this->planning;
    }

    public function setPlanning(string $planning): self
    {
        $this->planning = $planning;

        return $this;
    }

    public function getPrerequis(): ?string
    {
        return $this->prerequis;
    }

    public function setPrerequis(string $prerequis): self
    {
        $this->prerequis = $prerequis;

        return $this;
    }

    public function getDureeFormation(): ?string
    {
        return $this->dureeFormation;
    }

    public function setDureeFormation(string $dureeFormation): self
    {
        $this->dureeFormation = $dureeFormation;

        return $this;
    }

    /**
     * @return Collection<int, Formation>
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setFormationScp($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getFormationScp() === $this) {
                $formation->setFormationScp(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitre();
    }
}
