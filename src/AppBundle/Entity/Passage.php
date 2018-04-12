<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Passage
 *
 * @ORM\Table(name="passage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PassageRepository")
 */
class Passage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="num_Billet", type="string", length=20)
     */
    private $numBillet;

    /**
     * @var string
     *
     * @ORM\Column(name="num_Vol", type="string", length=15)
     */
    private $numVol;

    /**
     * @var string
     *
     * @ORM\Column(name="num_Passeport", type="string", length=20)
     */
    private $numPasseport;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_passage", type="date")
     */
    private $datePassage;
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Carte")
     */
    private $carte;
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Client")
     */
    private $client;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Passage
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Passage
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set numBillet
     *
     * @param string $numBillet
     *
     * @return Passage
     */
    public function setNumBillet($numBillet)
    {
        $this->numBillet = $numBillet;

        return $this;
    }

    /**
     * Get numBillet
     *
     * @return string
     */
    public function getNumBillet()
    {
        return $this->numBillet;
    }

    /**
     * Set numVol
     *
     * @param string $numVol
     *
     * @return Passage
     */
    public function setNumVol($numVol)
    {
        $this->numVol = $numVol;

        return $this;
    }

    /**
     * Get numVol
     *
     * @return string
     */
    public function getNumVol()
    {
        return $this->numVol;
    }

    /**
     * Set numPasseport
     *
     * @param string $numPasseport
     *
     * @return Passage
     */
    public function setNumPasseport($numPasseport)
    {
        $this->numPasseport = $numPasseport;

        return $this;
    }

    /**
     * Get numPasseport
     *
     * @return string
     */
    public function getNumPasseport()
    {
        return $this->numPasseport;
    }

    /**
     * Set datePassage
     *
     * @param \DateTime $datePassage
     *
     * @return Passage
     */
    public function setDatePassage($datePassage)
    {
        $this->datePassage = $datePassage;

        return $this;
    }

    /**
     * Get datePassage
     *
     * @return \DateTime
     */
    public function getDatePassage()
    {
        return $this->datePassage;
    }

    /**
     * Set carte
     *
     * @param \AppBundle\Entity\Carte $carte
     *
     * @return Passage
     */
    public function setCarte(\AppBundle\Entity\Carte $carte = null)
    {
        $this->carte = $carte;

        return $this;
    }

    /**
     * Get carte
     *
     * @return \AppBundle\Entity\Carte
     */
    public function getCarte()
    {
        return $this->carte;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Passage
     */
    public function setClient(\AppBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
