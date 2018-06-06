<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PrestationRepository")
 */
class Prestation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $designation;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    public $quantite;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    public $prixht;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    public $taxe;

    // /**
    //  * @ORM\ManyToOne(targetEntity="Facture", inversedBy="prestations")
    //  * @ORM\JoinColumn(name="genre_id", referencedColumnName="id")
    //  */
    // protected $facture;

    public function getId()
    {
        return $this->id;
    }

    public function getDesignation()
    {
        return $this->designation;
    }

    public function setDesignation(string $designation)
    {
        $this->designation = $designation;

        return $this;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite(string $quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixht()
    {
        return $this->prixht;
    }

    public function setPrixht($prixht)
    {
        $this->prixht = $prixht;

        return $this;
    }

    public function getTaxe()
    {
        return $this->taxe;
    }

    public function setTaxe($taxe)
    {
        $this->taxe = $taxe;

        return $this;
    }

    // public function setFacture(Facture $facture)
    // {
    //     $this->facture = $facture;
    //
    //     return $this;
    // }
    //
    // public function getFacture()
    // {
    //     return $this->facture;
    // }
}
