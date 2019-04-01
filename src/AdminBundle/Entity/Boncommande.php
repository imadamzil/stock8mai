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
     * @var \AdminBundle\Entity\Prestataire
     *
     * @ORM\ManyToOne(targetEntity="AdminBundle\Entity\Prestataire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Pre_id", referencedColumnName="id")
     * })
     */
    private $pre;


}

