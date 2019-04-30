<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boncommande
 *
 * @ORM\Table(name="boncommande", uniqueConstraints={@ORM\UniqueConstraint(name="BONCOMMANDE_PK", columns={"id"})}, indexes={@ORM\Index(name="ASSOCIATION3_FK", columns={"Pre_id"})})
 * @ORM\Entity
 */
class Boncommande
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateComm", type="date", nullable=true)
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
     * @var \AdminBundle\Entity\Prestataire
     *
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Prestataire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Pre_id", referencedColumnName="id")
     * })
     */
    private $pre;



    /**
     * Set datecomm
     *
     * @param \DateTime $datecomm
     *
     * @return Boncommande
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
     * Set pre
     *
     * @param \AdminBundle\Entity\Prestataire $pre
     *
     * @return Boncommande
     */
    public function setPre(\AdminBundle\Entity\Prestataire $pre = null)
    {
        $this->pre = $pre;

        return $this;
    }

    /**
     * Get pre
     *
     * @return \AdminBundle\Entity\Prestataire
     */
    public function getPre()
    {
        return $this->pre;
    }
}
