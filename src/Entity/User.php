<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Is_verified = false;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="user")
     */
    private $commandes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressliv;

    /**
     * @ORM\Column(type="float")
     */
    private $cpliv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villeliv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressfact;

    /**
     * @ORM\Column(type="float")
     */
    private $cpfact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villefact;

    /**
     * @ORM\OneToMany(targetEntity=Adresselivraison::class, mappedBy="user")
     */
    private $adresselivraisons;

    /**
     * @ORM\OneToMany(targetEntity=Adressefacturation::class, mappedBy="user")
     */
    private $adressefacturations;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->adresselivraisons = new ArrayCollection();
        $this->adressefacturations = new ArrayCollection();
    }

   

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getIsVerified(): bool
    {
        return $this->Is_verified;
    }

    public function setIsVerified(bool $Is_verified): self
    {
        $this->Is_verified = $Is_verified;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getUser() === $this) {
                $commande->setUser(null);
            }
        }

        return $this;
    }

    public function getAdressliv(): ?string
    {
        return $this->adressliv;
    }

    public function setAdressliv(string $adressliv): self
    {
        $this->adressliv = $adressliv;

        return $this;
    }

    public function getCpliv(): ?float
    {
        return $this->cpliv;
    }

    public function setCpliv(float $cpliv): self
    {
        $this->cpliv = $cpliv;

        return $this;
    }

    public function getVilleliv(): ?string
    {
        return $this->villeliv;
    }

    public function setVilleliv(string $villeliv): self
    {
        $this->villeliv = $villeliv;

        return $this;
    }

    public function getAdressfact(): ?string
    {
        return $this->adressfact;
    }

    public function setAdressfact(string $adressfact): self
    {
        $this->adressfact = $adressfact;

        return $this;
    }

    public function getCpfact(): ?float
    {
        return $this->cpfact;
    }

    public function setCpfact(float $cpfact): self
    {
        $this->cpfact = $cpfact;

        return $this;
    }

    public function getVillefact(): ?string
    {
        return $this->villefact;
    }

    public function setVillefact(string $villefact): self
    {
        $this->villefact = $villefact;

        return $this;
    }

    // public function __toString()
    // {
    //     return $this->getNom();
    // }
    public function getFullname(): ?string
    {
        return $this->getNom() . ' ' . $this->getPrenom();
    }

    /**
     * @return Collection<int, Adresselivraison>
     */
    public function getAdresselivraisons(): Collection
    {
        return $this->adresselivraisons;
    }

    public function addAdresselivraison(Adresselivraison $adresselivraison): self
    {
        if (!$this->adresselivraisons->contains($adresselivraison)) {
            $this->adresselivraisons[] = $adresselivraison;
            $adresselivraison->setUser($this);
        }

        return $this;
    }

    public function removeAdresselivraison(Adresselivraison $adresselivraison): self
    {
        if ($this->adresselivraisons->removeElement($adresselivraison)) {
            // set the owning side to null (unless already changed)
            if ($adresselivraison->getUser() === $this) {
                $adresselivraison->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Adressefacturation>
     */
    public function getAdressefacturations(): Collection
    {
        return $this->adressefacturations;
    }

    public function addAdressefacturation(Adressefacturation $adressefacturation): self
    {
        if (!$this->adressefacturations->contains($adressefacturation)) {
            $this->adressefacturations[] = $adressefacturation;
            $adressefacturation->setUser($this);
        }

        return $this;
    }

    public function removeAdressefacturation(Adressefacturation $adressefacturation): self
    {
        if ($this->adressefacturations->removeElement($adressefacturation)) {
            // set the owning side to null (unless already changed)
            if ($adressefacturation->getUser() === $this) {
                $adressefacturation->setUser(null);
            }
        }

        return $this;
    }

   

      
     
}
