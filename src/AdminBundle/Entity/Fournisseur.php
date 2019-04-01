<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur", uniqueConstraints={@ORM\UniqueConstraint(name="FOURNISSEUR_PK", columns={"id"})})
 * @ORM\Entity
 */
class Fournisseur
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
     * @ORM\Column(name="adresse", type="string", length=254, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=254, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=254, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

