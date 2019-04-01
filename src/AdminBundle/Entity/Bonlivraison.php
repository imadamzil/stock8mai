<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bonlivraison
 *
 * @ORM\Table(name="bonlivraison", uniqueConstraints={@ORM\UniqueConstraint(name="BONLIVRAISON_PK", columns={"id"})})
 * @ORM\Entity
 */
class Bonlivraison
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLivraison", type="datetime", nullable=true)
     */
    private $datelivraison;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

