<?php


namespace AdminBundle\Controller;

use AdminBundle\Entity\Demande;
use DateTime;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use PhpOffice\PhpSpreadsheet\IOFactory;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet as Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        $inputFileName = $this->get('kernel')->getRootDir() . '\..\web\crm.xlsx';
        $spreadsheet = IOFactory::load($inputFileName);
        /*  $spreadsheet->getActiveSheet()->getStyle('D4:D1000')
              ->getNumberFormat()
              ->setFormatCode(
                  NumberFormat::FORMAT_DATE_DATETIME
              ); */
        //   $worksheet = $spreadsheet->getActiveSheet();
        //  $spreadsheet->getActiveSheet()->getColumnDimension('C')->setVisible(true);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        // var_dump($sheetData);
        set_time_limit(500); //


        foreach ($sheetData AS $row) {
            if ($row[0] == 'Projet' or $row[1] == 'Sujet') {

            } else {

                $em = $this->getDoctrine()->getManager();
                $sipp = $row[4];
                $ssujet = $row[1];
                $date_maj = DateTime::createFromFormat('m/d/Y H:i', $row[27]);
                $date_maj->format('d-m-Y H:i');
                $date_creation = DateTime::createFromFormat('m/d/Y H:i', $row[3]);
                $date_creation->format('d-m-Y H:i');
                $dem_maj = $em->getRepository('AdminBundle:Demande')->findOneBy(array('dateMaj' => $date_maj
                ));
                // dump($dem_maj);
                $dem_sip = $em->getRepository('AdminBundle:Demande')->findOneBy(array('sip' => $sipp,
                    'sujet' => $ssujet));
                $dem_date_creation = $em->getRepository('AdminBundle:Demande')->findOneBy(array('sip' => $sipp,
                    'dateCreation' => $date_creation));
                $dem_sip_array = $em->getRepository('AdminBundle:Demande')->findBy(array('sip' => $sipp));


                if ($dem_sip == null) {

                    $demande = new Demande();

                    //projet
                    $projet = $row[0];
                    $demande->setProjet($projet);
                    //sujet
                    $sujet = $row[1];
                    $demande->setSujet($sujet);
                    //intervenant
                    $intervenant = $row[2];
                    $demande->setIntervenant($intervenant);
                    //date_creation
                    $dateCreatio = $row[3];

                    if ($dateCreatio != "") {

                        $dateCreation = DateTime::createFromFormat('m/d/Y  H:i', $dateCreatio);
                        $dateCreation->format('m/d/Y  H:i:s');
                        //$dateCreation = new \DateTime($dateCreatio);

                        $demande->setDateCreation($dateCreation);

                    }
                    //sip
                    $sip = $row[4];
                    $demande->setSip($sip);
                    //internet login
                    $loginInternet = $row[5];
                    $demande->setLoginInternet($loginInternet);
                    //date_installation
                    $dateInstallatio = $row[6];
                    if ($dateInstallatio != "") {
                        $dateInstallation = DateTime::createFromFormat('m/d/Y', $dateInstallatio);
                        $dateInstallation->format('m/d/Y');
                        $demande->setDateInstallation($dateInstallation);
                    }

                    //date_mes
                    $dateMe = $row[7];
                    if ($dateMe != "") {

                        $dateMes = DateTime::createFromFormat('m/d/Y', $dateMe);
                        $dateMes->format('d-m-Y');
                        $demande->setDateMes($dateMes);

                    }

                    //etat
                    $etat = $row[8];
                    $demande->setEtat($etat);
                    //
                    $problemeClient = $row[9];
                    $demande->setProblemeClient($problemeClient);
                    $etatInstallation = $row[10];
                    $demande->setEtatInstallation($etatInstallation);
                    $problemeInstallation = $row[11];
                    $demande->setProblemeInstallation($problemeInstallation);
                    $blocageClient = $row[12];
                    $demande->setBlocageClient($blocageClient);
                    $statutActivite = $row[13];
                    $demande->setStatutActivite($statutActivite);
                    $file = $row[14];
                    $demande->setFile($file);
                    $technologie = $row[15];
                    $demande->setTechnologie($technologie);
                    $typeOffre = $row[16];
                    $demande->setTypeOffre($typeOffre);
                    $kam = $row[17];
                    $demande->setKam($kam);
                    $dateGoInstallatio = $row[18];
                    if ($dateGoInstallatio != "") {

                        $dateGoInstallation = DateTime::createFromFormat('m/d/Y', $dateGoInstallatio);
                        $dateGoInstallation->format('d-m-Y');
                        $demande->setDateGoInstallation($dateGoInstallation);
                    }


                    $dateActivatio = $row[19];
                    if ($dateActivatio != "") {
                        $dateActivation = DateTime::createFromFormat('m/d/Y', $dateActivatio);
                        $dateActivation->format('d-m-Y');
                        $demande->setDateActivation($dateActivation);
                    }

                    $proprietaire = $row[20];
                    $demande->setProprietaire($proprietaire);
                    $offre = $row[21];
                    $demande->setOffre($offre);
                    $modifiePar = $row[22];
                    $demande->setModifiePar($modifiePar);
                    $portabilite = $row[23];
                    $demande->setPortabilite($portabilite);
                    $adressMac = $row[24];
                    $demande->setAdressMac($adressMac);
                    $changementEffectue = $row[25];
                    $demande->setChangementEffectue($changementEffectue);
                    $dateEnvoiFil = $row[26];
                    if ($dateEnvoiFil != "") {

                        $dateEnvoiFile = DateTime::createFromFormat('m/d/Y H:i', $dateEnvoiFil);
                        $dateEnvoiFile->format('d-m-Y H:i');
                        $demande->setDateEnvoiFile($dateEnvoiFile);
                    }

                    $dateMa = $row[27];
                    if ($dateMa != "") {
                        $dateMaj = DateTime::createFromFormat('m/d/Y H:i', $dateMa);
                        $dateMaj->format('d-m-Y H:i');
                        $demande->setDateMaj($dateMaj);
                    }

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($demande);
                    $em->flush();


                } else {
                    if ($dem_date_creation == null)
                    {

                        $demande = new Demande();

                        //projet
                        $projet = $row[0];
                        $demande->setProjet($projet);
                        //sujet
                        $sujet = $row[1];
                        $demande->setSujet($sujet);
                        //intervenant
                        $intervenant = $row[2];
                        $demande->setIntervenant($intervenant);
                        //date_creation
                        $dateCreatio = $row[3];

                        if ($dateCreatio != "") {

                            $dateCreation = DateTime::createFromFormat('m/d/Y  H:i', $dateCreatio);
                            $dateCreation->format('m/d/Y  H:i:s');
                            //$dateCreation = new \DateTime($dateCreatio);

                            $demande->setDateCreation($dateCreation);

                        }
                        //sip
                        $sip = $row[4];
                        $demande->setSip($sip);
                        //internet login
                        $loginInternet = $row[5];
                        $demande->setLoginInternet($loginInternet);
                        //date_installation
                        $dateInstallatio = $row[6];
                        if ($dateInstallatio != "") {
                            $dateInstallation = DateTime::createFromFormat('m/d/Y', $dateInstallatio);
                            $dateInstallation->format('m/d/Y');
                            $demande->setDateInstallation($dateInstallation);
                        }

                        //date_mes
                        $dateMe = $row[7];
                        if ($dateMe != "") {

                            $dateMes = DateTime::createFromFormat('m/d/Y', $dateMe);
                            $dateMes->format('d-m-Y');
                            $demande->setDateMes($dateMes);

                        }

                        //etat
                        $etat = $row[8];
                        $demande->setEtat($etat);
                        //
                        $problemeClient = $row[9];
                        $demande->setProblemeClient($problemeClient);
                        $etatInstallation = $row[10];
                        $demande->setEtatInstallation($etatInstallation);
                        $problemeInstallation = $row[11];
                        $demande->setProblemeInstallation($problemeInstallation);
                        $blocageClient = $row[12];
                        $demande->setBlocageClient($blocageClient);
                        $statutActivite = $row[13];
                        $demande->setStatutActivite($statutActivite);
                        $file = $row[14];
                        $demande->setFile($file);
                        $technologie = $row[15];
                        $demande->setTechnologie($technologie);
                        $typeOffre = $row[16];
                        $demande->setTypeOffre($typeOffre);
                        $kam = $row[17];
                        $demande->setKam($kam);
                        $dateGoInstallatio = $row[18];
                        if ($dateGoInstallatio != "") {

                            $dateGoInstallation = DateTime::createFromFormat('m/d/Y', $dateGoInstallatio);
                            $dateGoInstallation->format('d-m-Y');
                            $demande->setDateGoInstallation($dateGoInstallation);
                        }


                        $dateActivatio = $row[19];
                        if ($dateActivatio != "") {
                            $dateActivation = DateTime::createFromFormat('m/d/Y', $dateActivatio);
                            $dateActivation->format('d-m-Y');
                            $demande->setDateActivation($dateActivation);
                        }

                        $proprietaire = $row[20];
                        $demande->setProprietaire($proprietaire);
                        $offre = $row[21];
                        $demande->setOffre($offre);
                        $modifiePar = $row[22];
                        $demande->setModifiePar($modifiePar);
                        $portabilite = $row[23];
                        $demande->setPortabilite($portabilite);
                        $adressMac = $row[24];
                        $demande->setAdressMac($adressMac);
                        $changementEffectue = $row[25];
                        $demande->setChangementEffectue($changementEffectue);
                        $dateEnvoiFil = $row[26];
                        if ($dateEnvoiFil != "") {

                            $dateEnvoiFile = DateTime::createFromFormat('m/d/Y H:i', $dateEnvoiFil);
                            $dateEnvoiFile->format('d-m-Y H:i');
                            $demande->setDateEnvoiFile($dateEnvoiFile);
                        }

                        $dateMa = $row[27];
                        if ($dateMa != "") {
                            $dateMaj = DateTime::createFromFormat('m/d/Y H:i', $dateMa);
                            $dateMaj->format('d-m-Y H:i');
                            $demande->setDateMaj($dateMaj);
                        }

                        $em = $this->getDoctrine()->getManager();
                        $em->persist($demande);
                        $em->flush();

                    }else{
                        if ($dem_maj != null) {
                            $info = 'table à Jour';
                            // dump($info);
                        }
                        else {

                            $demande = $dem_sip;
                            $projet = $row[0];
                            $demande->setProjet($projet);
                            //sujet
                            $sujet = $row[1];
                            $demande->setSujet($sujet);
                            //intervenant
                            $intervenant = $row[2];
                            $demande->setIntervenant($intervenant);
                            //date_creation
                            $dateCreatio = $row[3];

                            if ($dateCreatio != "") {

                                $dateCreation = DateTime::createFromFormat('m/d/Y  H:i', $dateCreatio);
                                $dateCreation->format('m/d/Y  H:i:s');
                                //$dateCreation = new \DateTime($dateCreatio);

                                $demande->setDateCreation($dateCreation);

                            }
                            //sip
                            $sip = $row[4];
                            $demande->setSip($sip);
                            //internet login
                            $loginInternet = $row[5];
                            $demande->setLoginInternet($loginInternet);
                            //date_installation
                            $dateInstallatio = $row[6];
                            if ($dateInstallatio != "") {
                                $dateInstallation = DateTime::createFromFormat('m/d/Y', $dateInstallatio);
                                $dateInstallation->format('m/d/Y');
                                $demande->setDateInstallation($dateInstallation);
                            }

                            //date_mes
                            $dateMe = $row[7];
                            if ($dateMe != "") {

                                $dateMes = DateTime::createFromFormat('m/d/Y', $dateMe);
                                $dateMes->format('d-m-Y');
                                $demande->setDateMes($dateMes);

                            }

                            //etat
                            $etat = $row[8];
                            $demande->setEtat($etat);
                            //
                            $problemeClient = $row[9];
                            $demande->setProblemeClient($problemeClient);
                            $etatInstallation = $row[10];
                            $demande->setEtatInstallation($etatInstallation);
                            $problemeInstallation = $row[11];
                            $demande->setProblemeInstallation($problemeInstallation);
                            $blocageClient = $row[12];
                            $demande->setBlocageClient($blocageClient);
                            $statutActivite = $row[13];
                            $demande->setStatutActivite($statutActivite);
                            $file = $row[14];
                            $demande->setFile($file);
                            $technologie = $row[15];
                            $demande->setTechnologie($technologie);
                            $typeOffre = $row[16];
                            $demande->setTypeOffre($typeOffre);
                            $kam = $row[17];
                            $demande->setKam($kam);
                            $dateGoInstallatio = $row[18];
                            if ($dateGoInstallatio != "") {

                                $dateGoInstallation = DateTime::createFromFormat('m/d/Y', $dateGoInstallatio);
                                $dateGoInstallation->format('d-m-Y');
                                $demande->setDateGoInstallation($dateGoInstallation);
                            }


                            $dateActivatio = $row[19];
                            if ($dateActivatio != "") {
                                $dateActivation = DateTime::createFromFormat('m/d/Y', $dateActivatio);
                                $dateActivation->format('d-m-Y');
                                $demande->setDateActivation($dateActivation);
                            }

                            $proprietaire = $row[20];
                            $demande->setProprietaire($proprietaire);
                            $offre = $row[21];
                            $demande->setOffre($offre);
                            $modifiePar = $row[22];
                            $demande->setModifiePar($modifiePar);
                            $portabilite = $row[23];
                            $demande->setPortabilite($portabilite);
                            $adressMac = $row[24];
                            $demande->setAdressMac($adressMac);
                            $changementEffectue = $row[25];
                            $demande->setChangementEffectue($changementEffectue);
                            $dateEnvoiFil = $row[26];
                            if ($dateEnvoiFil != "") {

                                $dateEnvoiFile = DateTime::createFromFormat('m/d/Y H:i', $dateEnvoiFil);
                                $dateEnvoiFile->format('d-m-Y H:i');
                                $demande->setDateEnvoiFile($dateEnvoiFile);
                            }

                            $dateMa = $row[27];
                            if ($dateMa != "") {
                                $dateMaj = DateTime::createFromFormat('m/d/Y H:i', $dateMa);
                                $dateMaj->format('d-m-Y H:i');
                                $demande->setDateMaj($dateMaj);
                            }

                            $em = $this->getDoctrine()->getManager();
                            $em->persist($demande);
                            $em->flush();
                        }

                    }



                    //  dump($info);
                }
            }


        }
        //$cellValue = $spreadsheet->getActiveSheet()->getCell('A1')->getValue();
        // dump($cells);


        // ini_set('memory_limit', '512M');
        //  print_r($rows);

        return $this->render('AdminBundle::index.html.twig');
    }
}
