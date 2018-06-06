<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
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
    private $ecole;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    public function getId()
    {
        return $this->id;
    }

    public function getEcole()
    {
        return $this->ecole;
    }

    public function setEcole(string $ecole)
    {
        $this->ecole = $ecole;

        return $this;
    }

    public function getAnnee()
    {
        return $this->annee;
    }

    public function setAnnee(int $annee)
    {
        $this->annee = $annee;

        return $this;
    }
}
