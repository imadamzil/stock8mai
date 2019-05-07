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


    /**
     * Set labelle
     *
     * @param string $labelle
     *
     * @return Categorie
     */
    public function setLabelle($labelle)
    {
        $this->labelle = $labelle;

        return $this;
    }

    /**
     * Get labelle
     *
     * @return string
     */
    public function getLabelle()
    {
        return $this->labelle;
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

    public function __toString()
    {
        return $this->getLabelle();
    }

}
