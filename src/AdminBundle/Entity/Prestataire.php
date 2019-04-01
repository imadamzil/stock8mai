<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestataire
 *
 * @ORM\Table(name="prestataire", uniqueConstraints={@ORM\UniqueConstraint(name="PRESTATAIRE_PK", columns={"id"})})
 * @ORM\Entity
 */
class Prestataire
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=254, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=254, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=254, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=254, nullable=true)
     */
    private $adress;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

