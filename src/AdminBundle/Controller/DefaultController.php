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
use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;


class DefaultController extends Controller implements IReadFilter
{
    private $startRow = 0;

    private $endRow = 0;

    /**
     * Set the list of rows that we want to read.
     *
     * @param mixed $startRow
     * @param mixed $chunkSize
     */
    public function setRows($startRow, $chunkSize)
    {
        $this->startRow = $startRow;
        $this->endRow = $startRow + $chunkSize;
    }

    public function readCell($column, $row, $worksheetName = '')
    {
        //  Only read the heading row, and the rows that are configured in $this->_startRow and $this->_endRow
        if (($row == 1) || ($row >= $this->startRow && $row < $this->endRow)) {
            return true;
        }

        return false;
    }
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

        set_time_limit(10000); //
        ini_set('memory_limit', '1024M');



      //  $spreadsheet->getProtection()->setSheet(true);


        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        //$highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
      //  dump($highestRow);

        // var_dump($sheetData);
        dump($sheetData);



    foreach ($sheetData AS $row) {
            if ($row[3] == 'Projet' or $row[4] == 'Sujet') {

            }
            else {

                $em = $this->getDoctrine()->getManager();
                $sipp = $row[7];
                $ssujet = $row[4];
                $date_maj = DateTime::createFromFormat('m/d/Y H:i', $row[30]);
                $date_maj->format('d-m-Y H:i');
                $date_creation = DateTime::createFromFormat('m/d/Y H:i', $row[6]);
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
                    $projet = $row[3];
                    $demande->setProjet($projet);
                    //sujet
                    $sujet = $row[4];
                    $demande->setSujet($sujet);
                    //intervenant
                    $intervenant = $row[5];
                    $demande->setIntervenant($intervenant);
                    //date_creation
                    $dateCreatio = $row[6];

                    if ($dateCreatio != "") {

                        $dateCreation = DateTime::createFromFormat('m/d/Y  H:i', $dateCreatio);
                        $dateCreation->format('m/d/Y  H:i:s');
                        //$dateCreation = new \DateTime($dateCreatio);

                        $demande->setDateCreation($dateCreation);

                    }
                    //sip
                    $sip = $row[7];
                    $demande->setSip($sip);
                    //internet login
                    $loginInternet = $row[8];
                    $demande->setLoginInternet($loginInternet);
                    //date_installation
                    $dateInstallatio = $row[9];
                    if ($dateInstallatio != "") {
                        $dateInstallation = DateTime::createFromFormat('m/d/Y', $dateInstallatio);
                        $dateInstallation->format('m/d/Y');
                        $demande->setDateInstallation($dateInstallation);
                    }

                    //date_mes
                    $dateMe = $row[10];
                    if ($dateMe != "") {

                        $dateMes = DateTime::createFromFormat('m/d/Y', $dateMe);
                        $dateMes->format('d-m-Y');
                        $demande->setDateMes($dateMes);

                    }

                    //etat
                    $etat = $row[11];
                    $demande->setEtat($etat);
                    //
                    $problemeClient = $row[12];
                    $demande->setProblemeClient($problemeClient);
                    $etatInstallation = $row[13];
                    $demande->setEtatInstallation($etatInstallation);
                    $problemeInstallation = $row[14];
                    $demande->setProblemeInstallation($problemeInstallation);
                    $blocageClient = $row[15];
                    $demande->setBlocageClient($blocageClient);
                    $statutActivite = $row[16];
                    $demande->setStatutActivite($statutActivite);
                    $file = $row[17];
                    $demande->setFile($file);
                    $technologie = $row[18];
                    $demande->setTechnologie($technologie);
                    $typeOffre = $row[19];
                    $demande->setTypeOffre($typeOffre);
                    $kam = $row[20];
                    $demande->setKam($kam);
                    $dateGoInstallatio = $row[21];
                    if ($dateGoInstallatio != "") {

                        $dateGoInstallation = DateTime::createFromFormat('m/d/Y', $dateGoInstallatio);
                        $dateGoInstallation->format('d-m-Y');
                        $demande->setDateGoInstallation($dateGoInstallation);
                    }


                    $dateActivatio = $row[22];
                    if ($dateActivatio != "") {
                        $dateActivation = DateTime::createFromFormat('m/d/Y', $dateActivatio);
                        $dateActivation->format('d-m-Y');
                        $demande->setDateActivation($dateActivation);
                    }

                    $proprietaire = $row[23];
                    $demande->setProprietaire($proprietaire);
                    $offre = $row[24];
                    $demande->setOffre($offre);
                    $modifiePar = $row[25];
                    $demande->setModifiePar($modifiePar);
                    $portabilite = $row[26];
                    $demande->setPortabilite($portabilite);
                    $adressMac = $row[27];
                    $demande->setAdressMac($adressMac);
                    $changementEffectue = $row[28];
                    $demande->setChangementEffectue($changementEffectue);
                    $dateEnvoiFil = $row[29];
                    if ($dateEnvoiFil != "") {

                        $dateEnvoiFile = DateTime::createFromFormat('m/d/Y H:i', $dateEnvoiFil);
                        $dateEnvoiFile->format('d-m-Y H:i');
                        $demande->setDateEnvoiFile($dateEnvoiFile);
                    }

                    $dateMa = $row[30];
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
                        $projet = $row[3];
                        $demande->setProjet($projet);
                        //sujet
                        $sujet = $row[4];
                        $demande->setSujet($sujet);
                        //intervenant
                        $intervenant = $row[5];
                        $demande->setIntervenant($intervenant);
                        //date_creation
                        $dateCreatio = $row[6];

                        if ($dateCreatio != "") {

                            $dateCreation = DateTime::createFromFormat('m/d/Y  H:i', $dateCreatio);
                            $dateCreation->format('m/d/Y  H:i:s');
                            //$dateCreation = new \DateTime($dateCreatio);

                            $demande->setDateCreation($dateCreation);

                        }
                        //sip
                        $sip = $row[7];
                        $demande->setSip($sip);
                        //internet login
                        $loginInternet = $row[8];
                        $demande->setLoginInternet($loginInternet);
                        //date_installation
                        $dateInstallatio = $row[9];
                        if ($dateInstallatio != "") {
                            $dateInstallation = DateTime::createFromFormat('m/d/Y', $dateInstallatio);
                            $dateInstallation->format('m/d/Y');
                            $demande->setDateInstallation($dateInstallation);
                        }

                        //date_mes
                        $dateMe = $row[10];
                        if ($dateMe != "") {

                            $dateMes = DateTime::createFromFormat('m/d/Y', $dateMe);
                            $dateMes->format('d-m-Y');
                            $demande->setDateMes($dateMes);

                        }

                        //etat
                        $etat = $row[11];
                        $demande->setEtat($etat);
                        //
                        $problemeClient = $row[12];
                        $demande->setProblemeClient($problemeClient);
                        $etatInstallation = $row[13];
                        $demande->setEtatInstallation($etatInstallation);
                        $problemeInstallation = $row[14];
                        $demande->setProblemeInstallation($problemeInstallation);
                        $blocageClient = $row[15];
                        $demande->setBlocageClient($blocageClient);
                        $statutActivite = $row[16];
                        $demande->setStatutActivite($statutActivite);
                        $file = $row[17];
                        $demande->setFile($file);
                        $technologie = $row[18];
                        $demande->setTechnologie($technologie);
                        $typeOffre = $row[19];
                        $demande->setTypeOffre($typeOffre);
                        $kam = $row[20];
                        $demande->setKam($kam);
                        $dateGoInstallatio = $row[21];
                        if ($dateGoInstallatio != "") {

                            $dateGoInstallation = DateTime::createFromFormat('m/d/Y', $dateGoInstallatio);
                            $dateGoInstallation->format('d-m-Y');
                            $demande->setDateGoInstallation($dateGoInstallation);
                        }


                        $dateActivatio = $row[22];
                        if ($dateActivatio != "") {
                            $dateActivation = DateTime::createFromFormat('m/d/Y', $dateActivatio);
                            $dateActivation->format('d-m-Y');
                            $demande->setDateActivation($dateActivation);
                        }

                        $proprietaire = $row[23];
                        $demande->setProprietaire($proprietaire);
                        $offre = $row[24];
                        $demande->setOffre($offre);
                        $modifiePar = $row[25];
                        $demande->setModifiePar($modifiePar);
                        $portabilite = $row[26];
                        $demande->setPortabilite($portabilite);
                        $adressMac = $row[27];
                        $demande->setAdressMac($adressMac);
                        $changementEffectue = $row[28];
                        $demande->setChangementEffectue($changementEffectue);
                        $dateEnvoiFil = $row[29];
                        if ($dateEnvoiFil != "") {

                            $dateEnvoiFile = DateTime::createFromFormat('m/d/Y H:i', $dateEnvoiFil);
                            $dateEnvoiFile->format('d-m-Y H:i');
                            $demande->setDateEnvoiFile($dateEnvoiFile);
                        }

                        $dateMa = $row[30];
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
                            $projet = $row[3];
                            $demande->setProjet($projet);
                            //sujet
                            $sujet = $row[4];
                            $demande->setSujet($sujet);
                            //intervenant
                            $intervenant = $row[5];
                            $demande->setIntervenant($intervenant);
                            //date_creation
                            $dateCreatio = $row[6];

                            if ($dateCreatio != "") {

                                $dateCreation = DateTime::createFromFormat('m/d/Y  H:i', $dateCreatio);
                                $dateCreation->format('m/d/Y  H:i:s');
                                //$dateCreation = new \DateTime($dateCreatio);

                                $demande->setDateCreation($dateCreation);

                            }
                            //sip
                            $sip = $row[7];
                            $demande->setSip($sip);
                            //internet login
                            $loginInternet = $row[8];
                            $demande->setLoginInternet($loginInternet);
                            //date_installation
                            $dateInstallatio = $row[9];
                            if ($dateInstallatio != "") {
                                $dateInstallation = DateTime::createFromFormat('m/d/Y', $dateInstallatio);
                                $dateInstallation->format('m/d/Y');
                                $demande->setDateInstallation($dateInstallation);
                            }

                            //date_mes
                            $dateMe = $row[10];
                            if ($dateMe != "") {

                                $dateMes = DateTime::createFromFormat('m/d/Y', $dateMe);
                                $dateMes->format('d-m-Y');
                                $demande->setDateMes($dateMes);

                            }

                            //etat
                            $etat = $row[11];
                            $demande->setEtat($etat);
                            //
                            $problemeClient = $row[12];
                            $demande->setProblemeClient($problemeClient);
                            $etatInstallation = $row[13];
                            $demande->setEtatInstallation($etatInstallation);
                            $problemeInstallation = $row[14];
                            $demande->setProblemeInstallation($problemeInstallation);
                            $blocageClient = $row[15];
                            $demande->setBlocageClient($blocageClient);
                            $statutActivite = $row[16];
                            $demande->setStatutActivite($statutActivite);
                            $file = $row[17];
                            $demande->setFile($file);
                            $technologie = $row[18];
                            $demande->setTechnologie($technologie);
                            $typeOffre = $row[19];
                            $demande->setTypeOffre($typeOffre);
                            $kam = $row[20];
                            $demande->setKam($kam);
                            $dateGoInstallatio = $row[21];
                            if ($dateGoInstallatio != "") {

                                $dateGoInstallation = DateTime::createFromFormat('m/d/Y', $dateGoInstallatio);
                                $dateGoInstallation->format('d-m-Y');
                                $demande->setDateGoInstallation($dateGoInstallation);
                            }


                            $dateActivatio = $row[22];
                            if ($dateActivatio != "") {
                                $dateActivation = DateTime::createFromFormat('m/d/Y', $dateActivatio);
                                $dateActivation->format('d-m-Y');
                                $demande->setDateActivation($dateActivation);
                            }

                            $proprietaire = $row[23];
                            $demande->setProprietaire($proprietaire);
                            $offre = $row[24];
                            $demande->setOffre($offre);
                            $modifiePar = $row[25];
                            $demande->setModifiePar($modifiePar);
                            $portabilite = $row[26];
                            $demande->setPortabilite($portabilite);
                            $adressMac = $row[27];
                            $demande->setAdressMac($adressMac);
                            $changementEffectue = $row[28];
                            $demande->setChangementEffectue($changementEffectue);
                            $dateEnvoiFil = $row[29];
                            if ($dateEnvoiFil != "") {

                                $dateEnvoiFile = DateTime::createFromFormat('m/d/Y H:i', $dateEnvoiFil);
                                $dateEnvoiFile->format('d-m-Y H:i');
                                $demande->setDateEnvoiFile($dateEnvoiFile);
                            }

                            $dateMa = $row[30];
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

    /**
     * @Route("/test")
     */
    public function testAction()
    {

        $inputFileName = $this->get('kernel')->getRootDir() . '\..\web\crm.xlsx';
      /*  $inputFileName1 = $this->get('kernel')->getRootDir() . '\..\web\test1.xlsx';
        $spreadsheet = IOFactory::load($inputFileName);
        $spreadsheet1 = IOFactory::load($inputFileName1);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        $sheetData1 = $spreadsheet1->getActiveSheet()->toArray();
        */
        $spreadsheets = IOFactory::load($inputFileName);

        $reader = IOFactory::createReader('Xlsx');
        $highestRow = $spreadsheets->getActiveSheet()->getHighestRow();

        $chunkSize = 100;
        $chunkFilter = new DefaultController();
        $reader->setReadFilter($chunkFilter);
        set_time_limit(10000); //
       ini_set('memory_limit', '1024M');
// Loop to read our worksheet in "chunk size" blocks
        for ($startRow = 2; $startRow <= 200; $startRow += $chunkSize) {
            // Tell the Read Filter, the limits on which rows we want to read this iteration
            $chunkFilter->setRows($startRow, $chunkSize);
            // Load only the rows that match our filter from $inputFileName to a PhpSpreadsheet Object
            $spreadsheet = $reader->load($inputFileName);

            // Do some processing here

            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            dump($sheetData);
             }

        return $this->render('AdminBundle::index.html.twig');

    }

}
