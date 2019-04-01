<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quantiteentree
 *
 * @ORM\Table(name="quantiteentree", uniqueConstraints={@ORM\UniqueConstraint(name="QUANTITEENTREE_PK", columns={"id"})}, indexes={@ORM\Index(name="ASSOCIATION1_FK", columns={"Fou_id"}), @ORM\Index(name="ASSOCIATION1_FK2", columns={"Pro_id"})})
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


}

