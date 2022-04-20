<?php


namespace Source\Models;


use Source\Core\Model;
use Source\Support\Email;
use Source\Support\PDF;

/**
 * Class Evaluation
 * @package Source\Models
 */
class Evaluation extends Model
{

    /**
     * Evaluation constructor.
     */
    public function __construct()
    {
        parent::__construct('evaluation', ['id'], ['last_name']);
    }

    /**
     * Insert evaluation answer to database
     * @name evaluationSave
     * @param array $data
     * @return Evaluation
     */
    public function evaluationSave(array $data)
    {

        $evaluation = new Evaluation();
        $evaluation->last_name = (isset($data['last_name']) ? ucfirst( $data['last_name']) : '');
        $evaluation->email = (isset($data['email']) ? strtolower($data['email']) : '');
        $evaluation->racgp = (isset($data['racgp']) ? $data['racgp'] : '');

        $evaluation->question1 = (isset($data['question1']) ? $data['question1'] : '');
        $evaluation->question2 = (isset($data['question2']) ? $data['question2'] : '');
        $evaluation->question3 = (isset($data['question3']) ? $data['question3'] : '');
        $evaluation->question4 = (isset($data['question4']) ? $data['question4'] : '');
        $evaluation->question5 = (isset($data['question5']) ? $data['question5'] : '');
        $evaluation->question6 = (isset($data['question6']) ? $data['question6'] : '');
        $evaluation->question7 = (isset($data['question7']) ? $data['question7'] : '');
        $evaluation->question8 = (isset($data['question8']) ? $data['question8'] : '');
        $evaluation->question9 = (isset($data['question9']) ? $data['question9'] : '');

        $evaluation->consent = (isset($data['consent']) ? $data['consent'] : '');

        $evaluation->save();

        return $evaluation;

    }// evaluationSave

    /**
     * Force download certificate
     * @name downloadCertificate
     * @param object $evaluation
     * @return bool
     */
    public function downloadCertificate(object $evaluation)
    {

        if (filter_var($evaluation->email, FILTER_VALIDATE_EMAIL)){
            $mailTemplate = file_get_contents(__DIR__ . '/../../email/mail_template/certificate_template.html');
            $mailTemplate = str_replace("{{last_name}}", $evaluation->last_name, $mailTemplate);
            $mailTemplate = str_replace("{{RACGP}}", $evaluation->racgp, $mailTemplate);
            $mailTemplate = str_replace("{{date}}", date("d/m/Y"), $mailTemplate);

            (new PDF("certificate"))->generate($mailTemplate);

            return true;
        }

        return false;

    }// downloadCertificate

    /**
     * Send email with the certificate attached after the evaluation form is submitted
     * @name sendEmailWithCertificate
     * @param object $evaluation
     * @return bool
     */
    public function sendEmailWithCertificate(object $evaluation)
    {
        if (filter_var($evaluation->email, FILTER_VALIDATE_EMAIL)){
            $cert = file_get_contents(__DIR__ . '/../../email/mail_template/certificate_template.html');
            $cert = str_replace("{{last_name}}", $evaluation->last_name, $cert);
            $cert = str_replace("{{RACGP}}", $evaluation->racgp, $cert);
            $cert = str_replace("{{date}}", date("d/m/Y"), $cert);


            $pdfCreated = (new PDF("certificate"))->outputPDF($cert);


            $mailTemplate = file_get_contents(__DIR__ . '/../../email/mail_template/certificate_ready.html');
            $mailTemplate = str_replace("{{last_name}}", $evaluation->last_name, $mailTemplate);
            $mailTemplate = str_replace("{{RACGP}}", $evaluation->racgp, $mailTemplate);
            $mailTemplate = str_replace("{{date}}", date("d/m/Y"), $mailTemplate);
            $mailTemplate = str_replace("*|MC:SUBJECT|*", 'Congratulations! Your certificate is ready', $mailTemplate);
            $mailTemplate = str_replace("*|MC_PREVIEW_TEXT|*", 'Download your certificate', $mailTemplate);


            (new Email())->bootstrap(
                'Congratulations! Your certificate is ready',
                $mailTemplate,
                $evaluation->email,
                $evaluation->last_name
            )->attachPDF($pdfCreated, 'Certificate.pdf')->send();

            return true;
        }

        return false;
    }//sendEmailWithCertificate

}