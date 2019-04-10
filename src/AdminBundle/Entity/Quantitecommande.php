<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quantitecommande
 *
 * @ORM\Table(name="quantitecommande", uniqueConstraints={@ORM\UniqueConstraint(name="QUANTITECOMMANDE_PK", columns={"id"})}, indexes={@ORM\Index(name="ASSOCIATION2_FK", columns={"Pro_id"}), @ORM\Index(name="ASSOCIATION2_FK2", columns={"Bon_id"})})
 * @ORM\Entity
 */
class Quantitecommande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="qteComm", type="integer", nullable=true)
     */
    private $qtecomm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateComm", type="datetime", nullable=true)
     */
    private $datecomm;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AdminBundle\Entity\Boncommande
     *
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Boncommande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Bon_id", referencedColumnName="id")
     * })
     */
    private $bon;

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
     * Set qtecomm
     *
     * @param integer $qtecomm
     *
     * @return Quantitecommande
     */
    public function setQtecomm($qtecomm)
    {
        $this->qtecomm = $qtecomm;

        return $this;
    }

    /**
     * Get qtecomm
     *
     * @return integer
     */
    public function getQtecomm()
    {
        return $this->qtecomm;
    }

    /**
     * Set datecomm
     *
     * @param \DateTime $datecomm
     *
     * @return Quantitecommande
     */
    public function setDatecomm($datecomm)
    {
        $this->datecomm = $datecomm;

        return $this;
    }

    /**
     * Get datecomm
     *
     * @return \DateTime
     */
    public function getDatecomm()
    {
        return $this->datecomm;
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
     * Set bon
     *
     * @param \AdminBundle\Entity\Boncommande $bon
     *
     * @return Quantitecommande
     */
    public function setBon(\AdminBundle\Entity\Boncommande $bon = null)
    {
        $this->bon = $bon;

        return $this;
    }

    /**
     * Get bon
     *
     * @return \AdminBundle\Entity\Boncommande
     */
    public function getBon()
    {
        return $this->bon;
    }

    /**
     * Set pro
     *
     * @param \AdminBundle\Entity\Produit $pro
     *
     * @return Quantitecommande
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
