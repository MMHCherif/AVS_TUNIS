<?php

namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\Mapping as ORM;


/**
 * Carte
 *
 * @ORM\Table(name="carte")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarteRepository")
 */
class Carte
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
     * @ORM\Column(name="numCarte", type="string", unique=true,length=15)
     * * @ORM\OneToMany(targetEntity="AppBundle\Entity\Passage",mappedBy="carte",cascade={"persist", "remove"})
     */
    private $numCarte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_exp", type="date")
     */
    private $dateExp;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=8, scale=3)
     */
    private $prix;
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
     * Set numCarte
     *
     * 
     *
     * @return Carte
     */
    public function setNumCarte($date)
    {
        $date=str_replace(' ','',str_replace(':','',str_replace('-', '', $date)));

        
        
        
        $this->numCarte = $date;

        return $this;
    }

    /**
     * Get numCarte
     *
     * @return int
     */
    public function getNumCarte()
    {
        return $this->numCarte;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Carte
     */
    public function setDateCreation($dateCreation)
    {
     
      
      $this->dateCreation=$dateCreation;

        return  $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateExp
     *
     * 
     *
     * 
     */
    public function setDateExp($date)
    {
        
        

        $this->dateExp = $date->modify('+'.$this->duree.'month');

        
       

        return $this->dateExp;
    }

    /**
     * Get dateExp
     *
     * @return \DateTime
     */
    public function getDateExp()
    {
        return $this->dateExp;
    }

    /**
     * Set duree
     *
     * @param string $duree
     *
     * @return Carte
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return decimal
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Carte
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Carte
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Carte
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
