<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quantiteentree
 *
 * @ORM\Table(name="quantiteentree")
 * @ORM\Entity
 */
class Quantiteentree
{
    /**
     * @var integer
     *
     * @ORM\Column(name="qteEntree", type="integer", nullable=true)
     */
    private $qteentree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEntree", type="datetime", nullable=true)
     */
    private $dateentree;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AdminBundle\Entity\Fournisseur
     *
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Fournisseur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Fou_id", referencedColumnName="id")
     * })
     */
    private $fou;

    /**
     * @var \AdminBundle\Entity\Produit
     *
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Pro_id", referencedColumnName="id")
     * })
     */
    private $pro;



    /**
     * Set qteentree
     *
     * @param integer $qteentree
     *
     * @return Quantiteentree
     */
    public function setQteentree($qteentree)
    {
        $this->qteentree = $qteentree;

        return $this;
    }

    /**
     * Get qteentree
     *
     * @return integer
     */
    public function getQteentree()
    {
        return $this->qteentree;
    }

    /**
     * Set dateentree
     *
     * @param \DateTime $dateentree
     *
     * @return Quantiteentree
     */
    public function setDateentree($dateentree)
    {
        $this->dateentree = $dateentree;

        return $this;
    }

    /**
     * Get dateentree
     *
     * @return \DateTime
     */
    public function getDateentree()
    {
        return $this->dateentree;
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
     * Set fou
     *
     * @param \AdminBundle\Entity\Fournisseur $fou
     *
     * @return Quantiteentree
     */
    public function setFou(\AdminBundle\Entity\Fournisseur $fou = null)
    {
        $this->fou = $fou;

        return $this;
    }

    /**
     * Get fou
     *
     * @return \AdminBundle\Entity\Fournisseur
     */
    public function getFou()
    {
        return $this->fou;
    }

    /**
     * Set pro
     *
     * @param \AdminBundle\Entity\Produit $pro
     *
     * @return Quantiteentree
     */
    public function setPro(\AdminBundle\Entity\Produit $pro = null)
    {
        $this->pro = $pro;

        return $this;
    }

    /**
     * Get pro
     *
     * @return \AdminBundle\Entity\Produit
     */
    public function getPro()
    {
        return $this->pro;
    }
}
