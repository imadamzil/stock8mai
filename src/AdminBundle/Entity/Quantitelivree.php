<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quantitelivree
 *
 * @ORM\Table(name="quantitelivree", uniqueConstraints={@ORM\UniqueConstraint(name="QUANTITELIVREE_PK", columns={"id"})}, indexes={@ORM\Index(name="ASSOCIATION4_FK", columns={"Bon_id"}), @ORM\Index(name="ASSOCIATION4_FK2", columns={"Qua_id"})})
 * @ORM\Entity
 */
class Quantitelivree
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Pro_id", type="integer", nullable=true)
     */
    private $proId;

    /**
     * @var integer
     *
     * @ORM\Column(name="Qua_Bon_id", type="integer", nullable=true)
     */
    private $quaBonId;

    /**
     * @var integer
     *
     * @ORM\Column(name="qteLivree", type="integer", nullable=true)
     */
    private $qtelivree;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AdminBundle\Entity\Quantitecommande
     *
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Quantitecommande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Qua_id", referencedColumnName="id")
     * })
     */
    private $qua;

    /**
     * @var \AdminBundle\Entity\Bonlivraison
     *
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Bonlivraison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Bon_id", referencedColumnName="id")
     * })
     */
    private $bon;


}

