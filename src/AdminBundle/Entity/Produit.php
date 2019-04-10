<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=254, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=254, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AdminBundle\Entity\Categorie
     *
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Cat_id", referencedColumnName="id")
     * })
     */
    private $cat;

    /**
     * @var \AdminBundle\Entity\Personne
     *
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Per_id", referencedColumnName="id")
     * })
     */
    private $per;

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Produit
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set per
     *
     * @param \AdminBundle\Entity\Personne $per
     *
     * @return Produit
     */
    public function setPer(\AdminBundle\Entity\Personne $per = null)
    {
        $this->per = $per;

        return $this;
    }

    /**
     * Set cat
     *
     * @param \AdminBundle\Entity\Categorie $cat
     *
     * @return Produit
     */
    public function setCat(\AdminBundle\Entity\Categorie $cat = null)
    {
        $this->cat = $cat;

        return $this;
    }

    /**
     * Get cat
     *
     * @return \AdminBundle\Entity\Categorie
     */
    public function getCat()
    {
        return $this->cat;
    }

    /**
     * Get per
     *
     * @return \AdminBundle\Entity\Personne
     */
    public function getPer()
    {
        return $this->per;
    }

    public function __toString()
    {
        return $this->getReference() . ' ' . $this->getDescription();
    }
}
