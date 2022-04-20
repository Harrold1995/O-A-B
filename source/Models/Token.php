<?php


namespace Source\Models;


use Source\Core\Model;
use Source\Core\Session;

class Token extends Model
{


    public function __construct()
    {
        parent::__construct('token_login',['id'], ['name']);
    }

    public function loginByToken(string $token)
    {
        $tokenUrl = str_replace("token=",'', $token);

        $tokenUrl = trim($tokenUrl);
        $tokenUrl = strip_tags($tokenUrl);
        $tokenUrl = addslashes($tokenUrl);



        $token = $this->find('name = :n',"n={$tokenUrl}")->fetch(true);

        if ($token){
            (new Session())->set("authUser",'1');
        }



//        var_dump($token);

    }

}