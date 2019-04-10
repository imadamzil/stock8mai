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


    /**
     * Set proId
     *
     * @param integer $proId
     *
     * @return Quantitelivree
     */
    public function setProId($proId)
    {
        $this->proId = $proId;

        return $this;
    }

    /**
     * Get proId
     *
     * @return integer
     */
    public function getProId()
    {
        return $this->proId;
    }

    /**
     * Set quaBonId
     *
     * @param integer $quaBonId
     *
     * @return Quantitelivree
     */
    public function setQuaBonId($quaBonId)
    {
        $this->quaBonId = $quaBonId;

        return $this;
    }

    /**
     * Get quaBonId
     *
     * @return integer
     */
    public function getQuaBonId()
    {
        return $this->quaBonId;
    }

    /**
     * Set qtelivree
     *
     * @param integer $qtelivree
     *
     * @return Quantitelivree
     */
    public function setQtelivree($qtelivree)
    {
        $this->qtelivree = $qtelivree;

        return $this;
    }

    /**
     * Get qtelivree
     *
     * @return integer
     */
    public function getQtelivree()
    {
        return $this->qtelivree;
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
     * Set qua
     *
     * @param \AdminBundle\Entity\Quantitecommande $qua
     *
     * @return Quantitelivree
     */
    public function setQua(\AdminBundle\Entity\Quantitecommande $qua = null)
    {
        $this->qua = $qua;

        return $this;
    }

    /**
     * Get qua
     *
     * @return \AdminBundle\Entity\Quantitecommande
     */
    public function getQua()
    {
        return $this->qua;
    }

    /**
     * Set bon
     *
     * @param \AdminBundle\Entity\Bonlivraison $bon
     *
     * @return Quantitelivree
     */
    public function setBon(\AdminBundle\Entity\Bonlivraison $bon = null)
    {
        $this->bon = $bon;

        return $this;
    }

    /**
     * Get bon
     *
     * @return \AdminBundle\Entity\Bonlivraison
     */
    public function getBon()
    {
        return $this->bon;
    }
}
