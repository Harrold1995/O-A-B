<?php


namespace Source\Models;


use Source\Core\Model;
use Source\Core\Session;

class Auth extends Model
{
    public function __construct()
    {
        parent::__construct('users', ['id'], ['email', 'password']);
    }



    /**
     * @return null|User
     */
    public static function user(): ?User
    {
        $session = new Session();
        if (!$session->has("authUser")) {
            return null;
        }

        return (new User())->findById($session->authUser);
    }

    /**
     * log-out
     */
    public static function logout(): void
    {
        $session = new Session();
        $session->unset("authUser");
    }


    /**
     * @return null|User
     */
    public static function userAdmin(): ?User
    {
        $session = new Session();
        if (!$session->has("authUserAdmin")) {
            return null;
        }

        return (new User())->findById($session->authUser);
    }

    /**
     * log-out
     */
    public static function logoutAdmin(): void
    {
        $session = new Session();
        $session->unset("authUserAdmin");
    }

    /**
     * @param string $email
     * @param string $password
     * @param int $level
     * @return User|null
     */
    public function attempt(string $email, string $password, int $level = 3): ?User
    {
        if (!is_email($email)) {
            $this->result = false;
            $this->error = ["Email invalid",'warning'];

            return null;
        }

        if (!is_passwd($password)) {
            $this->result = false;
            $this->error = ["The password is not valid",'warning'];

            return null;
        }

        $user = (new User())->findByEmail($email);

        if (!$user) {
            $this->result = false;
            $this->error = ["Email not found",WS_ERROR];

            return null;
        }

        if (!passwd_verify($password, $user->password)) {
            $this->result = false;
            $this->error = ["Wrong password",WS_ERROR];

            return null;
        }

//        if ($user->status != 'confirmed'){
//            $this->result = false;
//            $this->error = ["Sorry your account has not been approved yet.",WS_INFOR];
//
//            return null;
//        }


//        if (passwd_rehash($user->password)) {
//            $user->password = $password;
//            $user->save();
//        }

        return $user;
    }


    /**
     * @param string $email
     * @param string $password
     * @param bool $save
     * @param int $level
     * @return bool
     */
    public function login(string $email, string $password, $adminArea = false, bool $save = false, int $level = 3): bool
    {
        $user = $this->attempt($email, $password, $level);
        if (!$user) {
            return false;
        }

        if ($adminArea){
            if ($save) {
                setcookie("authAdmin", $email, time() + 604800, "/");
            } else {
                setcookie("authAdmin", null, time() - 3600, "/");
            }
            //LOGIN
            (new Session())->set("authUserAdmin", $user->id);
        }else{
            if ($save) {
                setcookie("authEmail", $email, time() + 604800, "/");
            } else {
                setcookie("authEmail", null, time() - 3600, "/");
            }
            //LOGIN
            (new Session())->set("authUser", $user->id);
        }

//        var_dump(Auth::user());

        $this->result = true;
        $this->error = ["Welcome $user->title $user->last_name ",WS_ACCEPT];

        return true;
    }
}