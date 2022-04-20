<?php


namespace Source\Models;


use Source\Core\Model;
use Source\Support\Email;

/**
 * Class Registrations
 * @package Source\Models
 */
class Registrations extends Model
{

    /**
     * @var
     */
    private $reg;

    /**
     * Registrations constructor.
     */
    public function __construct()
    {
        parent::__construct("registrations", ["id"], ['email']);
    }





    /**
     * @param $data
     */
    public function createRegistration($data)
    {
        $this->reg = new Registrations();

//        $this->reg->title = (isset($data['title']) ? $data['title'] : '');
        $this->reg->first_name = (isset($data['first_name']) ? ucfirst($data['first_name']) : '');
        $this->reg->last_name = (isset($data['last_name']) ? ucfirst($data['last_name']) : '');
//        $this->reg->profession = (isset($data['profession']) ? $data['profession'] : '');
//        $this->reg->postcode = (isset($data['postcode']) ? $data['postcode'] : '');
//        $this->reg->ahpra = (isset($data['ahpra_number']) ? strtoupper($data['ahpra_number']) : '');
        $this->reg->email = (isset($data['email']) ? strtolower($data['email']) : '');
        $this->reg->consent = (isset($data['consent']) ? $data['consent'] : '');
        $this->reg->registered_at = date("Y-m-d H:i:s");

        return $this->reg->save();
    }


    /**
     *
     */
    public function sendConfirmationEmail()
    {

        $cal = file_get_contents(__DIR__ . '/../../email/calendar/national_vaccine_forum_2021.ics');

        $mailTemplate = file_get_contents(__DIR__ . '/../../email/mail_template/Registration-CONFIRMATION.html');
//        $mailTemplate = str_replace("{{title}}", 'National Vaccine Forum 2021', $mailTemplate);
        $mailTemplate = str_replace("*|MC_PREVIEW_TEXT|*", 'National Vaccine Forum 2021', $mailTemplate);
//        $mailTemplate = str_replace("[TITLE]", str_output($this->reg->title), $mailTemplate);
//        $mailTemplate = str_replace("[FIRST_NAME]", str_output($this->reg->first_name), $mailTemplate);
        $mailTemplate = str_replace("{{first_name}}", str_output($this->reg->first_name), $mailTemplate);





        (new Email())->bootstrap(
            'Registration confirmation for National Vaccine Forum 2021',
            $mailTemplate,
            $this->reg->email,
            $this->reg->last_name
        )->send(
            'noreply@nationalvaccineforum.com.au',
            'National Vaccine Forum',
            $cal,
            'National Vaccine Forum 2021'
        );


    }


        /**
     * Check on the database if the email exists on the register
     * @param $email
     * @return bool
     */
    public function alreadyRegistered($email): bool
    {
        $alreadyExists = $this->find("email = :e", "e={$email}")->fetch();

        if ($alreadyExists) {
            return true;
        }

        return false;

    }




}