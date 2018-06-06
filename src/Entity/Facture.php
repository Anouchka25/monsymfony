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

    public function getNum()
    {
        return $this->num;
    }

    public function setNum(string $num)
    {
        $this->num = $num;

        return $this;
    }

    public function getNumtva()
    {
        return $this->numtva;
    }

    public function setNumtva(string $numtva)
    {
        $this->numtva = $numtva;

        return $this;
    }

    public function getDatefacture(): ?\DateTimeInterface
    {
        return $this->datefacture;
    }

    public function setDatefacture(\DateTimeInterface $datefacture)
    {
        $this->datefacture = $datefacture;

        return $this;
    }

    public function getFacturede()
    {
        return $this->facturede;
    }

    public function setFacturede(string $facturede)
    {
        $this->facturede = $facturede;

        return $this;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient(string $client)
    {
        $this->client = $client;

        return $this;
    }

    public function getConditions()
    {
        return $this->conditions;
    }

    public function setConditions(string $conditions)
    {
        $this->conditions = $conditions;

        return $this;
    }

    // public function getUser()
    // {
    //     return $this->user;
    // }
    //
    // public function setUser(string $user)
    // {
    //     $this->user = $user;
    //
    //     return $this;
    // }

    // public function getLogo()
    // {
    //     return $this->logo;
    // }
    //
    // public function setLogo(string $logo)
    // {
    //     $this->logo = $logo;
    //
    //     return $this;
    // }

    public function getPrestations()
    {
        return $this->prestations;
    }

    // public function setPrestations(Collection $prestations)
    // {
    //     $this->prestations = $prestations;
    //
    //     return $this;
    // }

    public function addPrestation(Prestation $prestation)
    {
            $this->prestations->add($prestation);

    }

    public function removePrestation(Prestation $prestation)
    {
            $this->prestations->removeElement($prestation);

    }
}
