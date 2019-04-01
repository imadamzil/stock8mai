<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie", uniqueConstraints={@ORM\UniqueConstraint(name="CATEGORIE_PK", columns={"id"})})
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var string
     *
     * @ORM\Column(name="labelle", type="string", length=254, nullable=true)
     */
    private $labelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

