<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
// use Doctrine\Common\Collections\Collection;
// use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\OneToMany(targetEntity="Prestation", mappedBy="facture")
     */
    protected $prestations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $num;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $numtva;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $datefacture;

    /**
     * @ORM\Column(type="text")
     */
    protected $facturede;

    /**
     * @ORM\Column(type="text")
     */
    protected $client;

    /**
     * @ORM\Column(type="text")
     */
    protected $conditions;

    // /**
    // * @ORM\ManyToOne(targetEntity=User::class, inversedBy="factures")
    // */
    // protected $user;

    // /**
    //  * @ORM\Column(type="string", length=255)
    //  * @Assert\NotBlank(message="Ajouter une logo jpg")
    //  * @Assert\File(mimeTypes={ "image/jpeg" })
    //  */
    // protected $logo;

    public function __construct()
    {
        $this->prestations = new ArrayCollection();
    }



    public function getId()
    {
        return $this->id;
    }

    public function getNum(): ?string
    {
        return $this->num;
    }

    public function setNum(string $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getNumtva(): ?string
    {
        return $this->numtva;
    }

    public function setNumtva(string $numtva): self
    {
        $this->numtva = $numtva;

        return $this;
    }

    public function getDatefacture(): ?\DateTimeInterface
    {
        return $this->datefacture;
    }

    public function setDatefacture(\DateTimeInterface $datefacture): self
    {
        $this->datefacture = $datefacture;

        return $this;
    }

    public function getFacturede(): ?string
    {
        return $this->facturede;
    }

    public function setFacturede(string $facturede): self
    {
        $this->facturede = $facturede;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(string $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getConditions(): ?string
    {
        return $this->conditions;
    }

    public function setConditions(string $conditions): self
    {
        $this->conditions = $conditions;

        return $this;
    }

    // public function getUser(): ?string
    // {
    //     return $this->user;
    // }
    //
    // public function setUser(string $user): self
    // {
    //     $this->user = $user;
    //
    //     return $this;
    // }

    // public function getLogo(): ?string
    // {
    //     return $this->logo;
    // }
    //
    // public function setLogo(string $logo): self
    // {
    //     $this->logo = $logo;
    //
    //     return $this;
    // }

    public function getPrestations(): ?string
    {
        return $this->prestations;
    }

    public function setPrestations(Collection $prestations): self
    {
        $this->prestations = $prestations;

        return $this;
    }

    public function addPrestation(Prestation $prestation)
    {
        if ( ! $this->prestations->contains($prestation) ) {
            $this->prestations->add($prestation);
        }

        return $this->prestations;
    }
}
