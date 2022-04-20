<?php


namespace Source\Support;



use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * FSPHP | Class PDF
 *
 * @author Lucas Tortola <lucas@arterialgroup.com>
 * @package Source\Support
 */
class PDF
{
    /**
     * @var string
     */
    private $fileInitialtName;
    /**
     * @var string
     */
    private $paperType;
    /**
     * @var string
     */
    private $paperOrientation;
    /**
     * @var null
     */
    private $folderPath;


    /**
     * PDF constructor.
     */
    public function __construct($initialname = "certificate",$papertType = "A4", $orientation = "Portrait", $path = NULL)
    {
        $this->fileInitialtName = $initialname;
        $this->paperType = $papertType;
        $this->paperOrientation = $orientation;
        $this->folderPath = $path;
    }


    /**
     * Generate pdf
     * @name generate
     * @param $html
     * @param $name
     */
    public function generate($html)
    {

        ob_start();
        $certificateName = $this->fileInitialtName.".pdf";

        $options = new Options();
        $options->setDebugLayout(false);
        $options->setIsRemoteEnabled(true);

        $dompdf = new Dompdf($options);
        $dompdf->loadhtml($html);
        $dompdf->setPaper($this->paperType, $this->paperOrientation);
        $dompdf->render();
        $dompdf->stream($certificateName);

    }// generate


    /**
     * Method for output the certificate
     * @name outputPDF
     * @param $html
     * @return string|null
     */
    public function outputPDF($html)
    {
        ob_start();
        $certificateName = $this->fileInitialtName.".pdf";

        $options = new Options();
        $options->setDebugLayout(false);
        $options->setIsRemoteEnabled(true);

        $dompdf = new Dompdf($options);
        $dompdf->loadhtml($html);
        $dompdf->setPaper($this->paperType, $this->paperOrientation);
        $dompdf->render();

        return $dompdf->output();

    }// outputPDF






}