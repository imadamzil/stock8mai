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


}

