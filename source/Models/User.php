<?php


namespace Source\Models;


use Source\Core\Model;
use Source\Support\Email;

/**
 * Class User
 * @package Source\Models
 */
class User extends Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct('users', ['id'], ['email', 'password']);
    }

    /**
     * @param string $email
     * @param string $columns
     * @return null|User
     */
    public function findByEmail(string $email, string $columns = "*"): ?User
    {
        $find = $this->find("email = :email", "email={$email}", $columns);
        return $find->fetch();
    }

    /**
     * @return string
     */
    public function fullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }


    /**
     * Create user from the registration
     * @name createUserFromRegistration
     * @param array $data
     * @return bool
     */
    public function createUserFromRegistration(array $data)
    {

        $user = new User();

        $user->title = $data['title'];
        $user->first_name= $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->position = $data['profession'];
        $user->email = $data['email'];
        $user->password = passwd($data['password']);
        $user->postcode = $data['postcode'];
        $user->ahpra = $data['ahpra_number'];
        $user->status = 'confirmed';
        $user->consent = 'consent';
        $user->level = 3;
        $user->created_at = date("Y-m-d H:i:s");

        $user->save();

    }


    public function resetPassword($email)
    {
        if( is_email($email)){
            $userObj = new User;
            $user = $userObj->findByEmail($email);
//            var_dump($user);
            $user->reset_password = str_encrypt($user->email.date("Y-m-d"));
            $user->save();

//            echo str_encrypt($user->email);
//            echo str_encrypt(date("Y-m-d H:i:s"));

            $link = url('/reset-password/'.str_encrypt($user->email).'/'.str_encrypt(date("Y-m-d H:i:s")));

            $mailTemplate = file_get_contents(__DIR__ . '/../../email/mail_template/ANU-Registration-forgot-password.html');
            $mailTemplate = str_replace("{{title}}", 'ANU Registration', $mailTemplate);
            $mailTemplate = str_replace("*|MC_PREVIEW_TEXT|*", 'ANU Registration', $mailTemplate);
            $mailTemplate = str_replace("[TITLE]", str_output($user->title), $mailTemplate);
            $mailTemplate = str_replace("[SURNAME]", str_output($user->last_name), $mailTemplate);
            $mailTemplate = str_replace("[LINK]", $link, $mailTemplate);
//            echo $mailTemplate;


//            (new Email())->bootstrap(
//                'UCB Australian Neurology - Reset password',
//                 $mailTemplate,
//                 $user->email,
//    $user->title.' '.$user->last_name
//            )->send(
//                'noreply@ucbneurology.com.au',
//                'UCB Neurology website'
//            );

            return true;
        }

        return false;

    }
    

}