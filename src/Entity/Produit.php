<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
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
    private $Nom;

    /**
     * @ORM\Column(type="float")
     */
    private $Stock;

    /**
     * @ORM\Column(type="float")
     */
    private $Prix;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="text")
     */
    private $Image;

   

   

    /**
     * @ORM\OneToMany(targetEntity=CommandeProduit::class, mappedBy="Produit")
     */
    private $commandeProduits;


    /**
     * @ORM\Column(type="float")
     */
    private $qte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $noteDeTete;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $noteDeCoeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $noteDeFond;

    /**
     * @ORM\Column(type="text")
     */
    private $caractere;

  

 
   

    public function __construct()
    {
        $this->commandeProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getStock(): ?float
    {
        return $this->Stock;
    }

    public function setStock(float $Stock): self
    {
        $this->Stock = $Stock;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

   

   
  
    /**
     * @return Collection<int, CommandeProduit>
     */
    public function getCommandeProduits(): Collection
    {
        return $this->commandeProduits;
    }

    public function addCommandeProduit(CommandeProduit $commandeProduit): self
    {
        if (!$this->commandeProduits->contains($commandeProduit)) {
            $this->commandeProduits[] = $commandeProduit;
            $commandeProduit->setProduit($this);
        }

        return $this;
    }

    public function removeCommandeProduit(CommandeProduit $commandeProduit): self
    {
        if ($this->commandeProduits->removeElement($commandeProduit)) {
            // set the owning side to null (unless already changed)
            if ($commandeProduit->getProduit() === $this) {
                $commandeProduit->setProduit(null);
            }
        }

        return $this;
    }


    public function getQte(): ?float
    {
        return $this->qte;
    }

    public function setQte(float $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getNoteDeTete(): ?string
    {
        return $this->noteDeTete;
    }

    public function setNoteDeTete(string $noteDeTete): self
    {
        $this->noteDeTete = $noteDeTete;

        return $this;
    }

    public function getNoteDeCoeur(): ?string
    {
        return $this->noteDeCoeur;
    }

    public function setNoteDeCoeur(string $noteDeCoeur): self
    {
        $this->noteDeCoeur = $noteDeCoeur;

        return $this;
    }

    public function getNoteDeFond(): ?string
    {
        return $this->noteDeFond;
    }

    public function setNoteDeFond(string $noteDeFond): self
    {
        $this->noteDeFond = $noteDeFond;

        return $this;
    }

    public function getCaractere(): ?string
    {
        return $this->caractere;
    }

    public function setCaractere(string $caractere): self
    {
        $this->caractere = $caractere;

        return $this;
    }

   

    

}
