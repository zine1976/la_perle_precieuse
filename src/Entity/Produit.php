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
     * @ORM\Column(type="float")
     */
    private $Taux_tva;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Compo;

    /**
     * @ORM\OneToMany(targetEntity=CommandeProduit::class, mappedBy="Produit")
     */
    private $commandeProduits;

    /**
     * @ORM\Column(type="float")
     */
    private $prix50ml;

    /**
     * @ORM\Column(type="float")
     */
    private $prix200ml;

    /**
     * @ORM\Column(type="float")
     */
    private $qte;

    /**
     * @ORM\Column(type="float")
     */
    private $qte50ml;

    /**
     * @ORM\Column(type="float")
     */
    private $qte200ml;

    

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

    public function getTauxTva(): ?float
    {
        return $this->Taux_tva;
    }

    public function setTauxTva(float $Taux_tva): self
    {
        $this->Taux_tva = $Taux_tva;

        return $this;
    }

    public function getCompo(): ?string
    {
        return $this->Compo;
    }

    public function setCompo(string $Compo): self
    {
        $this->Compo = $Compo;

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

    public function getPrix50ml(): ?float
    {
        return $this->prix50ml;
    }

    public function setPrix50ml(float $prix50ml): self
    {
        $this->prix50ml = $prix50ml;

        return $this;
    }

    public function getPrix200ml(): ?float
    {
        return $this->prix200ml;
    }

    public function setPrix200ml(float $prix200ml): self
    {
        $this->prix200ml = $prix200ml;

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

    public function getQte50ml(): ?float
    {
        return $this->qte50ml;
    }

    public function setQte50ml(float $qte50ml): self
    {
        $this->qte50ml = $qte50ml;

        return $this;
    }

    public function getQte200ml(): ?float
    {
        return $this->qte200ml;
    }

    public function setQte200ml(float $qte200ml): self
    {
        $this->qte200ml = $qte200ml;

        return $this;
    }

   

    
}
