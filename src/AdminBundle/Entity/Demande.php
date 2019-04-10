<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\DemandeRepository")
 */
class Demande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="projet", type="string", length=255, nullable=true)
     */
    private $projet;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=255, nullable=true)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="intervenant", type="string", length=255, nullable=true)
     */
    private $intervenant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="sip", type="string", length=255, nullable=true)
     */
    private $sip;

    /**
     * @var string
     *
     * @ORM\Column(name="login_internet", type="string", length=255, nullable=true)
     */
    private $loginInternet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_installation", type="date", nullable=true)
     */
    private $dateInstallation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mes", type="date", nullable=true)
     */
    private $dateMes;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="probleme_client", type="string", length=255, nullable=true)
     */
    private $problemeClient;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_installation", type="string", length=3, nullable=true)
     */
    private $etatInstallation;

    /**
     * @var string
     *
     * @ORM\Column(name="probleme_installation", type="string", length=3, nullable=true)
     */
    private $problemeInstallation;

    /**
     * @var string
     *
     * @ORM\Column(name="blocage_client", type="string", length=255, nullable=true)
     */
    private $blocageClient;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_activite", type="string", length=255, nullable=true)
     */
    private $statutActivite;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=255, nullable=true)
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="technologie", type="string", length=255, nullable=true)
     */
    private $technologie;

    /**
     * @var string
     *
     * @ORM\Column(name="type_offre", type="string", length=255, nullable=true)
     */
    private $typeOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="kam", type="string", length=255, nullable=true)
     */
    private $kam;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_go_installation", type="date", nullable=true)
     */
    private $dateGoInstallation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_activation", type="date", nullable=true)
     */
    private $dateActivation;

    /**
     * @var string
     *
     * @ORM\Column(name="proprietaire", type="string", length=255, nullable=true)
     */
    private $proprietaire;

    /**
     * @var string
     *
     * @ORM\Column(name="offre", type="string", length=255, nullable=true)
     */
    private $offre;

    /**
     * @var string
     *
     * @ORM\Column(name="modifie_par", type="string", length=255, nullable=true)
     */
    private $modifiePar;

    /**
     * @var string
     *
     * @ORM\Column(name="portabilite", type="string", length=3, nullable=true)
     */
    private $portabilite;

    /**
     * @var string
     *
     * @ORM\Column(name="adress_mac", type="string", length=255, nullable=true)
     */
    private $adressMac;

    /**
     * @var string
     *
     * @ORM\Column(name="changement_effectue", type="string", length=3, nullable=true)
     */
    private $changementEffectue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_envoi_file", type="date", nullable=true)
     */
    private $dateEnvoiFile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_maj", type="datetime", nullable=true)
     */
    private $dateMaj;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set projet
     *
     * @param string $projet
     *
     * @return Demande
     */
    public function setProjet($projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return string
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     *
     * @return Demande
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set intervenant
     *
     * @param string $intervenant
     *
     * @return Demande
     */
    public function setIntervenant($intervenant)
    {
        $this->intervenant = $intervenant;

        return $this;
    }

    /**
     * Get intervenant
     *
     * @return string
     */
    public function getIntervenant()
    {
        return $this->intervenant;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Demande
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set sip
     *
     * @param string $sip
     *
     * @return Demande
     */
    public function setSip($sip)
    {
        $this->sip = $sip;

        return $this;
    }

    /**
     * Get sip
     *
     * @return string
     */
    public function getSip()
    {
        return $this->sip;
    }

    /**
     * Set loginInternet
     *
     * @param string $loginInternet
     *
     * @return Demande
     */
    public function setLoginInternet($loginInternet)
    {
        $this->loginInternet = $loginInternet;

        return $this;
    }

    /**
     * Get loginInternet
     *
     * @return string
     */
    public function getLoginInternet()
    {
        return $this->loginInternet;
    }

    /**
     * Set dateInstallation
     *
     * @param \DateTime $dateInstallation
     *
     * @return Demande
     */
    public function setDateInstallation($dateInstallation)
    {
        $this->dateInstallation = $dateInstallation;

        return $this;
    }

    /**
     * Get dateInstallation
     *
     * @return \DateTime
     */
    public function getDateInstallation()
    {
        return $this->dateInstallation;
    }

    /**
     * Set dateMes
     *
     * @param \DateTime $dateMes
     *
     * @return Demande
     */
    public function setDateMes($dateMes)
    {
        $this->dateMes = $dateMes;

        return $this;
    }

    /**
     * Get dateMes
     *
     * @return \DateTime
     */
    public function getDateMes()
    {
        return $this->dateMes;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Demande
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set problemeClient
     *
     * @param string $problemeClient
     *
     * @return Demande
     */
    public function setProblemeClient($problemeClient)
    {
        $this->problemeClient = $problemeClient;

        return $this;
    }

    /**
     * Get problemeClient
     *
     * @return string
     */
    public function getProblemeClient()
    {
        return $this->problemeClient;
    }

    /**
     * Set etatInstallation
     *
     * @param string $etatInstallation
     *
     * @return Demande
     */
    public function setEtatInstallation($etatInstallation)
    {
        $this->etatInstallation = $etatInstallation;

        return $this;
    }

    /**
     * Get etatInstallation
     *
     * @return string
     */
    public function getEtatInstallation()
    {
        return $this->etatInstallation;
    }

    /**
     * Set problemeInstallation
     *
     * @param string $problemeInstallation
     *
     * @return Demande
     */
    public function setProblemeInstallation($problemeInstallation)
    {
        $this->problemeInstallation = $problemeInstallation;

        return $this;
    }

    /**
     * Get problemeInstallation
     *
     * @return string
     */
    public function getProblemeInstallation()
    {
        return $this->problemeInstallation;
    }

    /**
     * Set blocageClient
     *
     * @param string $blocageClient
     *
     * @return Demande
     */
    public function setBlocageClient($blocageClient)
    {
        $this->blocageClient = $blocageClient;

        return $this;
    }

    /**
     * Get blocageClient
     *
     * @return string
     */
    public function getBlocageClient()
    {
        return $this->blocageClient;
    }

    /**
     * Set statutActivite
     *
     * @param string $statutActivite
     *
     * @return Demande
     */
    public function setStatutActivite($statutActivite)
    {
        $this->statutActivite = $statutActivite;

        return $this;
    }

    /**
     * Get statutActivite
     *
     * @return string
     */
    public function getStatutActivite()
    {
        return $this->statutActivite;
    }

    /**
     * Set file
     *
     * @param string $file
     *
     * @return Demande
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set technologie
     *
     * @param string $technologie
     *
     * @return Demande
     */
    public function setTechnologie($technologie)
    {
        $this->technologie = $technologie;

        return $this;
    }

    /**
     * Get technologie
     *
     * @return string
     */
    public function getTechnologie()
    {
        return $this->technologie;
    }

    /**
     * Set typeOffre
     *
     * @param string $typeOffre
     *
     * @return Demande
     */
    public function setTypeOffre($typeOffre)
    {
        $this->typeOffre = $typeOffre;

        return $this;
    }

    /**
     * Get typeOffre
     *
     * @return string
     */
    public function getTypeOffre()
    {
        return $this->typeOffre;
    }

    /**
     * Set kam
     *
     * @param string $kam
     *
     * @return Demande
     */
    public function setKam($kam)
    {
        $this->kam = $kam;

        return $this;
    }

    /**
     * Get kam
     *
     * @return string
     */
    public function getKam()
    {
        return $this->kam;
    }

    /**
     * Set dateGoInstallation
     *
     * @param \DateTime $dateGoInstallation
     *
     * @return Demande
     */
    public function setDateGoInstallation($dateGoInstallation)
    {
        $this->dateGoInstallation = $dateGoInstallation;

        return $this;
    }

    /**
     * Get dateGoInstallation
     *
     * @return \DateTime
     */
    public function getDateGoInstallation()
    {
        return $this->dateGoInstallation;
    }

    /**
     * Set dateActivation
     *
     * @param \DateTime $dateActivation
     *
     * @return Demande
     */
    public function setDateActivation($dateActivation)
    {
        $this->dateActivation = $dateActivation;

        return $this;
    }

    /**
     * Get dateActivation
     *
     * @return \DateTime
     */
    public function getDateActivation()
    {
        return $this->dateActivation;
    }

    /**
     * Set proprietaire
     *
     * @param string $proprietaire
     *
     * @return Demande
     */
    public function setProprietaire($proprietaire)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return string
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Set offre
     *
     * @param string $offre
     *
     * @return Demande
     */
    public function setOffre($offre)
    {
        $this->offre = $offre;

        return $this;
    }

    /**
     * Get offre
     *
     * @return string
     */
    public function getOffre()
    {
        return $this->offre;
    }

    /**
     * Set modifiePar
     *
     * @param string $modifiePar
     *
     * @return Demande
     */
    public function setModifiePar($modifiePar)
    {
        $this->modifiePar = $modifiePar;

        return $this;
    }

    /**
     * Get modifiePar
     *
     * @return string
     */
    public function getModifiePar()
    {
        return $this->modifiePar;
    }

    /**
     * Set portabilite
     *
     * @param string $portabilite
     *
     * @return Demande
     */
    public function setPortabilite($portabilite)
    {
        $this->portabilite = $portabilite;

        return $this;
    }

    /**
     * Get portabilite
     *
     * @return string
     */
    public function getPortabilite()
    {
        return $this->portabilite;
    }

    /**
     * Set adressMac
     *
     * @param string $adressMac
     *
     * @return Demande
     */
    public function setAdressMac($adressMac)
    {
        $this->adressMac = $adressMac;

        return $this;
    }

    /**
     * Get adressMac
     *
     * @return string
     */
    public function getAdressMac()
    {
        return $this->adressMac;
    }

    /**
     * Set changementEffectue
     *
     * @param string $changementEffectue
     *
     * @return Demande
     */
    public function setChangementEffectue($changementEffectue)
    {
        $this->changementEffectue = $changementEffectue;

        return $this;
    }

    /**
     * Get changementEffectue
     *
     * @return string
     */
    public function getChangementEffectue()
    {
        return $this->changementEffectue;
    }

    /**
     * Set dateEnvoiFile
     *
     * @param \DateTime $dateEnvoiFile
     *
     * @return Demande
     */
    public function setDateEnvoiFile($dateEnvoiFile)
    {
        $this->dateEnvoiFile = $dateEnvoiFile;

        return $this;
    }

    /**
     * Get dateEnvoiFile
     *
     * @return \DateTime
     */
    public function getDateEnvoiFile()
    {
        return $this->dateEnvoiFile;
    }

    /**
     * Set dateMaj
     *
     * @param \DateTime $dateMaj
     *
     * @return Demande
     */
    public function setDateMaj($dateMaj)
    {
        $this->dateMaj = $dateMaj;

        return $this;
    }

    /**
     * Get dateMaj
     *
     * @return \DateTime
     */
    public function getDateMaj()
    {
        return $this->dateMaj;
    }
}
