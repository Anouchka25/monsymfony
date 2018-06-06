<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtudiantRepository")
 */
class Etudiant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\OneToMany(targetEntity="Formation", mappedBy="etudiant")
     */
    protected $formations;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge(int $age)
    {
        $this->age = $age;

        return $this;
    }

    public function getFormations()
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation)
    {
            $this->formations->add($formation);

    }

    public function removeFormation(Formation $formation)
    {
            $this->formations->removeElement($formation);

    }
}
